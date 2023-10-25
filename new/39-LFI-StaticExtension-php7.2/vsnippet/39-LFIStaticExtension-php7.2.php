<?php
//Ignore the design setup below:
include_once('./ignore/design/design.php');
$design = Design(__FILE__);

/*
* YesWeHack - Vulnerable Code Snippet
*/

?>

<?php
/*
* - [ GOAL ] -
* Use the Local File Inclusion (LFI) vulnerability to archive a remote code execution (RCE)
*/

#Load a page (view) provided by the application:
if ( isset($_GET['page']) ) {
    include($_SERVER['DOCUMENT_ROOT'] . '/views/' . $_GET['page'] . '.php');
} else {
    echo '<h1>I want a page!</h1>';
}
?>

<html>
<head>
    <title>Vsnippet #39 - PHP - Local file inclusion (LFI) to remote code execution (RCE)</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
<!-- Navigation Bar -->
<ul class="navbar">
    <a href="./?page=home">Home</a>
    <a href="./?page=about">About</a>
    <a href="./?page=contact">Contact</a>
</ul>
<div>
<?= $design ?>
</div>
<body>
</html>
