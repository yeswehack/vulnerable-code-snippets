<?php

/*
* YesWeHack - Vulnerable code snippets
*/

// Secure the input from path traversal
function IncludeFilter($str) {
    while (True) {
        if ( !str_contains($str, "../") ) {
            break;
        }
        $str = str_replace("../", "", $str);
    }
    return $str;
}

// Normalize slash related to OS
function OSPath($str){
    if ( strtolower(PHP_OS) == "linux" ) {
        $str = str_replace("\\", "/", $str);
        
    } else {
        $str = str_replace("/", "\\", $str);
    }
    return $str;
}

$lang = $_GET['lang'];

include(OSPath("home/" . IncludeFilter($lang)));

if ( $lang != "en" || $lang != "fr" ) {
    file_put_contents("logs/log.txt", $lang, FILE_APPEND);
    echo "<b>Invalid language</b>";

    include "home/en";
}

?>
