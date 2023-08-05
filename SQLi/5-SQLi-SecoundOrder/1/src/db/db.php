<?php

//Connect to database:
//Note : This is for the docker only, feel free to change to whatever you like:
$db_host = 'vsnippet-mysql-db';
$db_database = 'ywhvsnippet';
$db_username = 'vsnippet';
$db_password = 'vsnippet';

// Create connection
$mysqlDB = new mysqli($db_host, $db_username, $db_password, $db_database);

// Check connection
if ($mysqlDB->connect_error) {
    die("Connection failed: " . $mysqlDB->connect_error);
}

?>

