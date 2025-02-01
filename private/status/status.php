<?php
include('private/bio/config.php');
include('private/utils/variableAndFunctions.php');

$status = parseStatus($statusfile);
$statusBadge= <<<EOT
    <link rel="stylesheet" href="status/status.css">
    <div id="status">
        <p class="date">$status->date</p>
        <p>Status:</p>
        <p>$status->message</p>
    </div>
EOT;
?>