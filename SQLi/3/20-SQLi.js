var mysql = require('mysql');
const express = require('express');
const bodyParser = require('body-parser');
const path = require('path');
const crypto = require('crypto')
const db = require('./../../db/db.js');

const app = express()
app.use(bodyParser.urlencoded({ extended: true }));

/**
* YesWeHack - Vulnerable code snippets
*/
//Run: node 20-SQLi.js

app.get('/', function (req,res) {
    res.sendFile(path.join(__dirname+'/20-index.html'));
});

app.post('/', function (req, res) {
    //User input:
    const username = req.body.username.replace('"', '');
    const password = crypto.createHash('sha1').update(req.body.password).digest('hex');

    if ( username.length > 0 && password.length > 0 ) {
        con.query(`SELECT * FROM users WHERE (username="${username}") AND (password = "${password}")`,
        function(err, result) {
            if (err) {
                console.error(err);
                
            } else if ( result.length > 0 ) {
                console.log('->', result)
                res.send('Success!');
                //Code...
            } else {
                res.sendFile(path.join(__dirname+'/20-index.html'));
            }
        })
    }
})

//Start web app:
app.listen(3000, function () {
    console.log('server start at port http://localhost:3000');
})
