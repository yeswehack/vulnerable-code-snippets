#!/usr/bin/python3
from flask import Flask, json, request
import datetime
app = Flask(__name__)

##
# YesWeHack - Vulnerable code snippets
##
#Run: python3 32-formatinjection.py

@app.route('/items')
def index():

    id = request.args.get('id')
    msg = f"Could not find item for {id}"

    #Extract all items from our JSON file:
    with open('items.json', 'r') as items:
        data = json.load(items)
       
        if id is None:
            return data

        elif (id is not None) and (id in data.keys()):
            return data[id]

        else:
            return json.loads( ('{{ "{0}":"'+msg+'" }}').format(datetime.datetime.now()) )


if __name__=='__main__':
    app.run(debug=True)
