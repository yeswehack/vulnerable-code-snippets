<?php
//Ignore the design setup below:
include_once('./ignore/design/design.php');
$title = 'Vsnippet #18 - Path Traversal - Regex bypass';
$design = Design(__FILE__, $title);

/*
* YesWeHack - Vulnerable Code Snippet
*/

?>

<?php
function PathFilter($s) {
    /** Filter 'Path Traversal' from the user provided file
     * Return filtered value
    */
    $s = preg_replace("/(:\/\/)|\\\\/", "", $s);
    while ( str_contains($s, "../") ) {
        $s = str_replace("../", "", $s);
    }
    return $s;
}

$content = 'Missing parameter "file", No file given.';

// Check user input for file:
if ( isset($_GET['file']) && $_GET['file'] != "" ) {
    $file =  htmlspecialchars( PathFilter($_GET['file']) );
    $content = file_get_contents( $file );

    if ( strlen($content) <= 0 ) {
        $content = 'Could not find file: ' . htmlentities($file);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
</head>
<body>
<h1><?= $title ?></h1>

<!-- Display the content from the file given by the user param "file" -->
<?= $content ?>

<div>
<?= $design ?>
</div>
<body>
</html>
