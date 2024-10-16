/**
* YesWeHack - Vulnerable code snippets
*/
const express = require('express');
const crypto = require('crypto');
const path = require('path');
const fs = require('fs');
let ejs = require('ejs');
const app = express()
app.locals.SOURCECODE = fs.readFileSync(__filename).toString()

// Set the view engine to EJS
app.set('view engine', 'ejs');

// Set the views directory
app.set('views', path.join(__dirname, 'views'));

app.use(express.raw({ type: '*/*', limit: '10mb' }));

const API_KEY = crypto.randomBytes(32).toString('hex');

class Config {
    constructor(owner, apikey) {
        this.owner = owner
        this.apikey = apikey
        this.public
    }
    // Code...
}

function merge(target, source) {
    for (const attr in source) {
      if (typeof target[attr] === "object" && typeof source[attr] === "object") {
        merge(target[attr], source[attr]);
      } else {
        target[attr] = source[attr];
      }
    }
    return target;
}

app.get('/', (req, res) => {
    return res.render('index', { status: 'No config data given' });
})

// Define a POST route to accept JSON data
app.post('/', (req, res) => {
    data = req.body.toString('UTF-8')

    let configDraft = new Config("guest", undefined)
    merge(configDraft, JSON.parse(data))
    
    const config = new Config("admin", API_KEY)
    if ( config.public === true ) {
        return res.render('index', { status: 'Access granted' });
    }
    // Send a response back to the client
    return res.render('index', { status: 'You do not have access to the system configurations' });
});

//Start the server:
const PORT = 1337
app.listen(PORT, '0.0.0.0', () => {
    console.log(`Server is running on http://0.0.0.0:${PORT}`);
});