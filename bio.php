<?php
include('private/status/status.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
                                   initial-scale=1.0">
    <title>About Me</title>

    <!-- To link external styling file -->
    <link rel="stylesheet" href="styles/bio.css">
</head>

<body>
    <header>
    </header>
    <main>
        <div id="content">
        <a href="index.php" id="back">←</a>
            <a id="adminlink" href="admin.php">a</a>
            <h2>Ruinedmango</h2>
            <?php
                echo $statusBadge
            ?>
            <p>Gnags</p>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 RuinedNet</p>
    </footer>
</body>

</html>