<?php
include('config.php');
include('private/utils/variableAndFunctions.php');

$status = parseStatus($statusfile);
$statusBadge= <<<EOT
    <link rel="stylesheet" href="status/status.css">
    <div id="status">
        <p class="header">Status:</p>
        <p class="date">$status->date</p>
        
        <p>$status->message</p>
    </div>
EOT;
?>