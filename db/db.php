<?php

/*
* YesWeHack - Vulnerable code snippets
*/

//Connect to database:
$db = "<DATABASE>";
$host = "<HOST>";
$username = "<USERNAME>";
$password = "<PASSWORD>";

// Create connection
$mysqlDB = new mysqli($host, $username, $password, $db);

// Check connection
if ($mysqlDB->connect_error) {
    die("Connection failed: " . $mysqlDB->connect_error);
} 
echo ":: Connected successfully\n";

?>
