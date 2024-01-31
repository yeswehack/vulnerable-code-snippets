from flask import Flask, abort
from flask_restful import Api, Resource
import json

##
# YesWeHack - Vulnerable Code Snippet
##

app = Flask(__name__)
api = Api(app)

class UsersDetails(Resource):
    def get(self, id):
        try:
            return {'users':data['accounts'][id]}
        except:
            return 'Invalid id'

data = json.load(open('users.json', 'r'))

def UserAuthorization(s:str):#<-(Ignore)
    #Code...
    pass

@app.route('/')
def index():
    return 'API v1.0'

api.add_resource(UsersDetails, '/users/<string:id>')
@app.route('/users')
def users():
    if UserAuthorization():
        #Code...
        pass
    else: 
        return abort(403, 'You need authorization to access this endpoint.')


#Start the vulnerable server:
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=1337, debug=True)