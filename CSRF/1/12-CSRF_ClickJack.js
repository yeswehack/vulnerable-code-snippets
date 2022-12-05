var mysql = require('mysql');
const http = require('http');
const db = require('./../../db/db.js');

/**
* YesWeHack - Vulnerable code snippets
*/

function GetUserData(userSecrets){
  //User with this credentials will be deleted (Defaul is the User: [Mario - "RandSess"])
    const data = {
      'id': 1,
      'csrf': "RandSess",
      'sess': "RandSess",
    }
    return data
}

function Delete(id, session, csrf) {
  return console.log("DELETED"); //Removing this line will delete the user from the database (Run `usersUsers.js` to restore all users)

  con.connect(function(err) {
      if (err) throw err;
      
      //Prepared SQL statement:
      con.query(
        `DELETE FROM users WHERE id = ? AND (csrf = ? AND session = ?)`,
        [id, csrf, session],
        
        function (err, result) {
          if (err) throw err;
          console.log("[LOG]", result);
      });
    });
}

http.createServer((req, res) => {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write(`
    <head>
      <meta http-equiv="X-Frame-Options" content="deny">
    </head>
    <body>
      <a href="./settings">Settings</a>
      <a href="./delete">delete account</a>
    </body>`);

    if (req.url == '/delete' ) {
      //The session, csrf and id gathering secure:
      var user = GetUserData(req.headers['Cookie']);
      
      //Delete the user:
      Delete(user['id'], user['sess'], user['csrf']);
    }

    res.end();
})


.listen(5000, () => {
    console.log("server start at port http://localhost:5000");
  });
