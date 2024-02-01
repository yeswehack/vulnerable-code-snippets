/**
* YesWeHack - Vulnerable code snippets
*/
const express = require('express');
const app = express()

function GetCredentials(session) {
    /**
    * Ilustrait a random logged in user (For clear view)
  	*   Real senario would use a database or similary
    *   but the returned value would remain the same.
    */
    return {
        "id": 1,
        "username": "James007",
        "email": "james@ywh.com",
        "session" : "9b13252f346c2073e0c9ed39aad87ba9e9a59dd925606c6cdb12eec0d7368b5b"
     };
}

app.get('/', function (req,res) {
    //Response status/headers + write
    origin = req.headers["origin"];
    if ( origin == undefined || origin == "" ) {
        console.log("Origin set to wildcard")
        origin = "*";
    }

    const headers = {
        "Access-Control-Allow-Origin": origin,
        "Access-Control-Allow-Credentials": "true",
        "Content-Type": "application/json",
    };
    res.writeHead(200, headers);

    //Log to see user requested referer and to what host:
    console.log(`[${Date()}][LOG]`, req.headers["referer"], "=>", req.headers["host"]);

    //Gather credentials for user related to his/her session: 
    sess = GetCredentials(req.session)

    //Prepair user data to be included:
    userCred = {
        "id": sess.id,
        "username": sess.username,
        "email": sess.email,
        "session": sess.session,
    };

    //Output credentials to requested user
    res.end(JSON.stringify(userCred));
});


//Start web app:
PORT = 1337
app.listen(PORT, '0.0.0.0', () => {
    console.log(`Server is running on http://0.0.0.0:${PORT}`);
  });
  
