<?php
include_once("../../db/db.php");
include_once("../../design/design.php");
Design(__FILE__, " #24 - Vulnerable code snippet");
//RUN: php -S 127.1:5000

/**
* YesWeHack - Vulnerable Code Snippet
*/
?>

<!DOCTYPE html>
<html>
<body>
<div class="Swag">
    <img style="width:350px;" src="./ywhSwag.png">
    <p>Currently only sizes (S)mall and (M)edium are available.</p>
</div>
<form method=GET>
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

//User input:
$size = addslashes($_GET['size']);
$column = addslashes($_GET['view']);
if ( strlen($size) < 0 ) {
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
//Code...

?>
</body>
</html>
