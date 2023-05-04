from flask import Flask, abort
from flask_restful import Api, Resource
import json

##
# YesWeHack - Vulnerable Code Snippet
##

#Setup : pip install -r requirements.txt
#Run : python3 29-idor.py

app = Flask(__name__)
api = Api(app)

class UsersDetails(Resource):
    def get(self, id):
        try:
            return {'users':data['accounts'][id]}
        except:
            return 'Invalid id'

data = json.load(open('users.json', 'r'))
api.add_resource(UsersDetails, '/users/<string:id>')

session=''#<-(Ignore)
def UserAuthorization(s:str):#<-(Ignore)
    #Code...
    pass

@app.route('/')
def index():
    return 'API v1.0'

@app.route('/users')
def users():
    if UserAuthorization(session):
        #Code...
        pass
    else: 
        return abort(403, 'You need authorization to access this endpoint.')


if __name__=='__main__':
    app.run(debug=True)
