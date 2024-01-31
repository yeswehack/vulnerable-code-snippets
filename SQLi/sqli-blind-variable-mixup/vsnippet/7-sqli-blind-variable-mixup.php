<?php
include_once('./ignore/design/design.php');
include("./ignore/db/db.php");
$title = 'Vsnippet #7 - SQL injection - Mix-up of variables';
$design = Design(__FILE__);

/*
* YesWeHack - Vulnerable code snippets
*/
?>

<?php

$verbose = '...';

// Look for user input from the GET params and make sure all are set before continue:
if ( isset($_GET["id"]) && isset($_GET["stock"]) && isset($_GET["color"]) ) {
    $id = intval($_GET["id"]);
    $stock = intval($_GET["stock"]);
    $color = $_GET["color"];

    // Forward GET params to array and filter escape them:
    $lst = array(
        $id => $id,
        $stock => $stock,
        $color => $mysqlDB->real_escape_string($color)
    );

    $result = mysqli_query($mysqlDB, "SELECT * FROM `products` WHERE color = '$color' AND (id > $id AND stock > $stock)");

    if ( $result->num_rows > 0) {
        $verbose = htmlentities($result->num_rows . ' exist with color: ' . $color);
    } else {
        $verbose = 'OUT OF STOCK';
    }
}

$mysqlDB->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
</head>
<body>
<h1><?= $title ?></h1>

<form action="/" method="GET">
<label>Pick your color:</label>
<select name="color">
    <option value="white">White</option>
    <option value="red">Red</option>
    <option value="blue">Blue</option>
    <option value="black">Black</option>
    <option value="yellow">Yellow</option>
    <option value="orange">Orange</option>
</select>
<input type="hidden" name="id" value="0">
<input type="hidden" name="stock" value="0">
<input type="submit" value="Search by color">
</form>

<p>Search result: <?= $verbose ?></p>

<div>
<?= $design ?>
</div>
<body>
</html>
