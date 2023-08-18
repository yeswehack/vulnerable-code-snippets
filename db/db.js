/*
* YesWeHack - Vulnerable code snippets
*/

var mysql = require('mysql');

con = mysql.createConnection({
  database: '__DB__',
  host: 'localhost',
  user: '$USER',
  password: '$PASSWORD',
});

//con.connect();
