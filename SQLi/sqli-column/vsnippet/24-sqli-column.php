<?php
include_once('./ignore/design/design.php');
include("./ignore/db/db.php");
$title = 'Vsnippet #24 - SQL injection | column injection';
$design = Design(__FILE__, $title);

/*
* YesWeHack - Vulnerable Code Snippet
*/

?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
</head>
<body>
<h1><?= $title ?></h1>
<div class="Swag">
    <img style="width:350px;" src="./assets/ywhSwag.png">
    <p>Currently only sizes (S)mall and (M)edium are available.</p>
</div>
<form method="GET">
    <label>View:</label>
    <select name="view">
        <option value="category">Category</option>
        <option value="country">Country</option>
    </select>
    <label>Size:</label>
    <select name="size">
        <option value="S">S (Small)</option>
        <option value="M">M (Medium)</option>
    </select>
<input type="submit" value="Add to cart">
</form>

<?php

//Get user parameter input:
$size = ( isset($_GET['size']) ) ? addslashes($_GET['size']): '';
$column = ( isset($_GET['view']) ) ? addslashes($_GET['view']): '';

if ( strlen($size) == 0 ) {
    echo "<b>Invalid size selected</b>";
    die();
}

$SQL = "SELECT `$column` FROM `products` WHERE stock > 0 AND size = '$size'";
$result = mysqli_query($mysqlDB, $SQL);
echo "<h4>Available:<h4>";
while($row = $result->fetch_assoc()) {
    foreach($row as $key => $field) {
        echo "-> " . htmlspecialchars($field) . '<br>';
    }
}

$mysqlDB->close();
?>

<div>
<?= $design ?>
</div>
<body>
</html>
