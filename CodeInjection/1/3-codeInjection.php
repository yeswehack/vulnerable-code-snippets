<?php

/*
* YesWeHack - Vulnerable code snippets
*/

function IncludeFilter($str) {
    /**Secure the input from path traversal:
    */
    while (True) {
        if ( !str_contains($str, "../") ) {
            break;
        }
        $str = str_replace("../", "", $str);
    }

    return $str;
}

function OSPath($str){
    /**Normalize slash related to OS:
    */
    if ( strtolower(PHP_OS) == "linux" ) {
        $str = str_replace("\\", "/", $str);
        
    } else {
        $str = str_replace("/", "\\", $str);
    }

    return $str;
}

$lang = $_GET['lang'];

include(OSPath("home/" . IncludeFilter($lang)));

if ( $lang != "en" && $lang != "fr" ) {
    file_put_contents("logs/log.txt", $lang, FILE_APPEND);
    echo "<b>Invalid language</b>";

    include "home/en";
}

?>
