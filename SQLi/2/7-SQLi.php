<?php

/*
* YesWeHack - Vulnerable code snippets
*/

//Note, this should be the path to the "db.php" file that is in the root of the repo + credentials added:
include("../../db/db.php");

//Take GET params:
$id = intval($_GET["id"]);
$stock = intval($_GET["stock"]);
$color = $_GET["color"];

//Forward GET params to array & filter escape them:
$lst = array(
    $id => $id, 
    $stock => $stock, 
    $color => $mysqlDB->real_escape_string($color)
);

$sql = "SELECT * FROM `products` WHERE color = '$color'
AND (id > $id AND stock > $stock)";

$result = mysqli_query($mysqlDB, $sql);

$mysqlDB->close();

?>
