<?php
include('config.php');
include('../utils/variableAndFunctions.php');

$user = $_POST['username'];
$pass = $_POST['password'];
if($user == $username && $pass == $password) {
    $_SESSION['isadmin'] = 'balls';
    redirect('/admin.php');
}