<?php
include_once('./ignore/design/design.php');
$title = 'Vsnippet #31 - Local File Inclusion (LFI)';
$design = Design(__FILE__, $title);

/**
 * YesWeHack - Vulnerable Code Snippet
 */
?>

<?php

// Secure the input from path traversal
function IncludeFilter($str) {
    while (True) {
        if ( strpos($str, "../") == false ) {
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

// Log the given value to a the log file
function Logging($value) {
    file_put_contents("logs/log.txt", (date("[Y-m-d]") . "$value\n"), FILE_APPEND);
}

$lang = ( isset($_GET['lang']) ) ? $_GET['lang'] : "en";

Logging($lang);
include(OSPath("home/" . IncludeFilter($lang)));

?>

<html>
<head>
<title><?= $title ?></title>
</head>
<body>
<div>
<?= $design ?>
</div>
<body>
</html>
