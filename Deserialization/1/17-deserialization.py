#!/usr/bin/python3
from flask import Flask, Response, request
from datetime import date
import base64 as b64
import pickle

##
# YesWeHack - Vulnerable Code Snippet
##

app = Flask(__name__)


def User_RedirectTo(d):
    ##Handle the user data and redirect
    #Code...
    return "<h2>Redirecting you!</h2>"

class CreateData(object,):
#Create an object to store user data:
    def __init__(self, id, name, date):
        self.id = id
        self.name = name
        self.date = date

    def __str__(self):
        return str(self.__dict__)


@app.route('/', methods = ['GET', 'POST'])
def index():
    resp = Response()
    
    #Get user data from cookie:
    dataCookie = request.cookies.get('userData')

    #Verify & deserialize user data:
    if dataCookie is not None:
        try:
            data = b64.b64decode(bytes(dataCookie, 'UTF-8'))
            data = pickle.loads(data)
            return User_RedirectTo(data)
        
        except:
            return "<h2>Invalid data...</h2>"

    else:
        #Create a new data object and set it as the user's cookie:
        newData = CreateData(None, 'guest', date.today().strftime('%d/%m/%Y'))
        newData = bytes(str(newData), 'UTF-8')
        resp.set_cookie('userData', b64.b64encode(newData))
        
        return resp


if __name__=='__main__':
    app.run(debug=True)
