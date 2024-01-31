#!/usr/bin/python3
from flask import Flask, render_template, request
from ignore.design import design
import base64, json
app = design.Design(Flask(__name__), __file__, 'Vsnippet 41 - Basic Insecure direct object references (IDOR)')

##
# YesWeHack - Vulnerable code snippets
##

@app.route('/')
def index():
    userData = {}
    userDataBase64 =  request.cookies.get('userdata')

    if ( userDataBase64 is not None ):
        try:
            # Make the JSON data into a dictonary:
            userDataJSON = base64.b64decode(userDataBase64)
            userData = json.loads(userDataJSON)
        except:
            return render_template('index.html', result='Invalid user data')

    if userData['role'] is not None and userData['role'] == 'admin':
        #Code ...
        return render_template('index.html', result=f'Admin dashboard')

    return render_template('index.html', result=f'Not authorized to access this resource')


#Start the vulnerable server:
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=1337, debug=True)

