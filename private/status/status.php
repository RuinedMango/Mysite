<?php
include('../bio/config.php');
include('../utils/variableAndFunctions.php');

$status = parseStatus($statusfile);
$statusBadge= <<<EOT
    <h>Gang</h>
EOT;
?>