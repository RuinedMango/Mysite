<?php
function lastEdit($file){
    $timestamp = filemtime($file);
    $date = date('Y/m/d', $timestamp);
    $output = <<<EOT
        <link rel="stylesheet" href="styles/lastedit.css">
        <div id="lastedit">
            <p>Last edited</p>
            <p>$date</p>
        </div>
    EOT;
    return $output;
}