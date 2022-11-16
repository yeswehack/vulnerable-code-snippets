<?php

/*
* YesWeHack - Vulnerable code snippets
*/

//Connect to database:
$db = '__DB__';
$host = 'localhost';
$username = '__USER__';
$password = '__PASS__';

// Create connection
$mysqlDB = new mysqli($host, $username, $password, $db);

// Check connection
if ($mysqlDB->connect_error) {
    die("Connection failed: " . $mysqlDB->connect_error);
} 
echo ":: Connected successfully\n";

?>

