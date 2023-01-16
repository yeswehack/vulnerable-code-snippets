<?php
include_once("../../design/design.php");
Design(__FILE__, "#18 Vsnippet");
//RUN: php -S 127.1:5000 18-LFI.php

/**
* YesWeHack - Vulnerable Code Snippet
*/

function PathFilter($str) {
    /** Filter 'Path Traversal' from the user provided file
     * Return filtered value
    */
    $str = preg_replace("/(:\/\/)|\\\\/", "", $str);
    while ( str_contains($str, "../") ) {
        $str = str_replace("../", "", $str);
    }

    return $str;
}

#Check user input for file:
if ( isset($_GET['file']) && $_GET['file'] != "" ) { 
    $file =  htmlspecialchars( PathFilter($_GET['file']) );

} else {
    $file = "index.html";
}

#Read render file:
$content = file_get_contents( $file );

if ( strlen($content) <= 0 ) {
    echo  "Could not find file: $file";
    die;
}

echo $content;

?> 
