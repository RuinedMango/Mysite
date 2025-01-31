<?php
if(!isset($_SESSION)){
    session_start();
}

function sanatizeLink($url){
    if(str_contains($url,"https://")){
        $url = str_replace("https://", "", $url);
    }elseif(str_contains($url,"http://")){
        $url = str_replace("http://", "", $url);
    }
    return $url;
}

function escape ($field){
    global $dbconnect;
    return mysqli_escape_string($dbconnect,$field);
}

function redirect($url){
    header('location:'.$url);
}

function randomNumber(){
    return rand(1, 100);
}

$randNum1 = randomNumber();
$randNum2 = randomNumber();

$sumRandNum = $randNum1 + $randNum2;

// Check if the session variable "sumRandNum" exists
if (isset($_SESSION['sumRandNum'])) {
    // If it does, assign the previous value of sumRandNum to a new variable $previousSunRandNum
    $previousSumRandNum = $_SESSION['sumRandNum'];
} else {
    // If it doesn't exist, set $previousSunRandNum to null
    $previousSumRandNum = null;
}

// Update the value of sunRandNum in the session variable
$_SESSION['sumRandNum'] = $sumRandNum;