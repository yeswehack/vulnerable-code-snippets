/*
* YesWeHack - Vulnerable code snippets
*/

var mysql = require('mysql');

con = mysql.createConnection({
  database: '__DB__',
  host: 'localhost',
  user: '__USER__',
  password: '__PASS__',
});

//con.connect();
