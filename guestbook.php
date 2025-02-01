<?php
if(!isset($_SESSION)){
    session_start();
}
include('private/utils/variableAndFunctions.php');
include('private/db/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
                                   initial-scale=1.0">
    <title>Guestbook</title>

    <!-- To link external styling file -->
    <link rel="stylesheet" href="styles/guestbook.css">
</head>

<body>
    <main>
        <div id="bookcontent">
            <a href="index.php">Back</a>
            <h2>Welcome to the guestbook</h2>
            <a id="hide1" href="#hide1" class="hide">+ Open form</a>
            <a id="show1" href="#show1" class="show">- Close form</a>
            <div class="postform">
            <form class="messageform" action="/private/guestbook/letter.php" method="post">
                <p class="inputtitle">Name:</p>
                <p><input type="text" name="name" class="inputbox" maxlength="60" placeholder="Your Name"></p>
                <p class="inputtitle">Your Site:</p>
                <p><input type="text" name="website" class="inputbox" maxlength="60" placeholder="Your Website"></p>
                <p class="inputtitle">Message:</p>
                <p><textarea name="message" class="inputbox" rows="3" maxlength="600" placeholder="Your Message"></textarea></p>
                <p class="inputtitle">Verification:</p>
                <p class="answertext"><?= $randNum1 ?> + <?= $randNum2 ?> is equal to: <input type="text" class="answerbox" name="verification" id="verification" maxlength="3" placeholder="Your Answer"></p>


                <input class="submitbutton" type="submit" value="send" title="Send your message!">
                <input type="hidden" name="action" value="sendmessage">
            </form>
            </div>
            <p id="sessionmsg">
                <?php
                if(isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                }
                ?>
            </p>
            <?php
                $showMessage = "SELECT * FROM `$dbname`.`$tablename` order by id desc";
                $execMessage = mysqli_query($dbconnect,$showMessage);
                while ($result = mysqli_fetch_assoc($execMessage)):
            ?>
            <div id="messages">
                <div id="message">
                    <div>
                        <p class="top"><?= ($result['name']) ?><span class="date"><?= ($result['date']) ?></span></p>
                        <a class="letterlink" target="_blank" href=<?=( "https://" . $result['site']) ?>><?= ($result['site']) ?></a>
                    </div>
                    <p id="message" class="text"><?= ($result['message']) ?></p>
                </div>
            </div>
            <?php
                endwhile;                
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 RuinedNet</p>
    </footer>
</body>

</html>
<?php
// Close the connection
mysqli_close($dbconnect); 
?>