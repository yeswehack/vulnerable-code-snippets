<?php

/*
* YesWeHack - Vulnerable code snippets
*/

//Connect to database:
$db = "__DB__";
$host = "localhost";
$username = "__USER__";//<-ALWAYS DELETE AFTER USAGE
$password = "__PASS__";//<-ALWAYS DELETE AFTER USAGE

// Create connection
$mysqlDB = new mysqli($host, $username, $password, $db);

// Check connection
if ($mysqlDB->connect_error) {
    die("Connection failed: " . $mysqlDB->connect_error);
} 
echo ":: Connected successfully\n";

?>

