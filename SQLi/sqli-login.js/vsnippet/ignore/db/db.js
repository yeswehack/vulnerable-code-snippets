/*
* YesWeHack - Vulnerable code snippets
*/

const mysql = require('mysql2');
const pool = mysql.createPool({
  host: 'db-mysql',
  database: 'ywhvsnippet',
  user: 'vsnippet',
  password: 'vsnippet',
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0
});

// Connect to MySQL
// Export the pool to be used elsewhere
module.exports = pool.promise();