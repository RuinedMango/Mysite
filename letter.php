<?php
include("variableAndFunctions.php");

if (isset($_POST['action']) and $_POST['action'] == 'sendmessage') {
    $sanatizedsite = sanatizeLink($_POST['website']);
    $name = htmlspecialchars(escape($_POST['name']));
    $site = htmlspecialchars(escape($sanatizedsite));
    $message = htmlspecialchars(escape($_POST['message']));
    $verification = ($_POST['verification']);
    $timedate = escape(date("Y-m-d H:i:s"));

    if (empty($name)) {
        $_SESSION['msg'] = "Input fields cannot be empty!";
        redirect('/guestbook.php');
    } elseif (empty($message)) {
        $_SESSION['msg'] = "Input fields cannot be empty!";
        redirect('/guestbook.php');
    } elseif (empty($verification)) {
        $_SESSION['msg'] = "Input fields cannot be empty!";
        redirect('/guestbook.php');
    } else {
        if ($previousSumRandNum == $verification) {
            $name=mysqli_real_escape_string($dbconnect, htmlspecialchars($name));
            $site=mysqli_real_escape_string($dbconnect, htmlspecialchars($site));
            $message=mysqli_real_escape_string($dbconnect, htmlspecialchars($message));
            $messageQuery = "INSERT INTO `$dbname`.`$tablename` (`id`, `name`, `site`, `message`, `date`) VALUES (NULL, '$name', '$site', '$message', '$timedate');";
            $sendMessage = mysqli_query($dbconnect, $messageQuery);
            if ($sendMessage) {
                $_SESSION['msg'] = "Message Added!";
                unset($_SESSION['sumRandNum']);
                redirect('/guestbook.php');
            } else {
                $_SESSION['msg'] = "Failed adding your message!";
                unset($_SESSION['sumRandNum']);
                redirect('/guestbook.php');
                exit;
            }
        } else {
            $_SESSION['msg'] = "Verification failed!";
            unset($_SESSION['sumRandNum']);
            redirect('/guestbook.php');
            exit;
        }
    }
} else {
    unset($_SESSION['sumRandNum']);
    redirect('/guestbook.php');
}
?>