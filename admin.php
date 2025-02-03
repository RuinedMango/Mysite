<?php
if(!isset($_SESSION)){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
                                   initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- To link external styling file -->
    <link rel="stylesheet" href="styles/admin.css">
</head>

<body>
    <header>
    </header>
    <main>
        <div id="content">
            <a href="bio.php" id="back">←</a>
            <h2>Ruinedmango</h2>
            <?php if(!isset($_SESSION['isadmin'])): ?>
            <p>
                <form action="/private/admin/login.php" method="post">
                    <p>Username: <input name="username" type="text"></p>
                    <p>Password: <input name="password" type="text"></p>
                    <input class="submitbutton" type="submit" value="Login" title="Login!">
                </form>
            </p>
            <?php endif ?>
            <?php if(isset($_SESSION['isadmin'])): 
                unset ($_SESSION['isadmin']); ?>
            <p>
                <form action="/private/status/edit.php" method="post">
                    <p>Status Message: <input name="status" type="text"></p>
                    <input class="submitbutton" type="submit" value="Set Status" title="Send your message!">
                </form>
            </p>
            <?php endif ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 RuinedNet</p>
    </footer>
</body>

</html>