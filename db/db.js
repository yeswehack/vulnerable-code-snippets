/*
* YesWeHack - Vulnerable code snippets
*/

var mysql = require('mysql');

con = mysql.createConnection({
  database: '__DB__',
  host: 'localhost',
  user: process.env.USER,
  password: process.env.PASSWORD,
});

//con.connect();
