<?php
include('../status/config.php');
include('../utils/variableAndFunctions.php');

$mes = $_POST['status'];
file_put_contents('../../' . $statusfile, "");
$open = fopen('../../' . $statusfile,"w");

fwrite($open, date("Y/m/d") . "\n");
fwrite($open, $mes);
redirect('/admin.php');

