const http = require('http');

/*
* YesWeHack - Vulnerable code snippets
*/


function GetCredentials(session) {
    /* Ilustrait a random logged in user (For clear view)
  	*   Real senario would use a database or similary
    *   but the returned value would remain the same.
    */
    const userObj = {
        "id": 1,
        "username": "James007",
        "email": "james@ywh.com",
        "session" : "9b13252f346c2073e0c9ed39aad87ba9e9a59dd925606c6cdb12eec0d7368b5b"
     };

    return userObj;
}

const requestListener = function (req, res) {
    
    //Response status/headers + write
    origin = req.headers["origin"];
    if ( origin == undefined || origin == "" ) {
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
}

//Start HTTP server:
const server = http.createServer(requestListener);
console.log("Vsnippet started at: http://127.0.0.1:5000/");
server.listen(5000);
