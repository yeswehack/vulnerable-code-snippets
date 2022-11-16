<?php
/*
* YesWeHack - Vulnerable code snippets
*/

//Note, this should be the path to the "db.php" file that is in the root of the repo + credentials added:
include("../../db/db.php");

$query = $_GET['q'];
$lst_blacklist = array("\"", "`", "'", "\\" );

foreach ( $lst_blacklist as $char ) {
  if ( in_array($char, $lst_blacklist) ) {
    $query = str_replace($char, ("\\".$char), $query);
  }
}

$sql = "SELECT * FROM `products` WHERE category = '$query'";
$result = $mysqlDB->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Id:" . $row["id"] . "\n",
      "Stock: " . $row["stock"] . "\n",
      "Category: " .$row["category"] . "\n",
      "Color: " .$row["color"] . "\n----\n";
    }
} else {
        echo "0 results for $query";
}

$mysqlDB->close();
?> 
