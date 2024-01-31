#!/usr/bin/python3
from flask import Flask, json, render_template, request
import datetime
from ignore.design import design
app = design.Design(Flask(__name__), __file__, 'Vsnippet #32 - Format injection classic')


##
# YesWeHack - Vulnerable code snippets
##

@app.route('/')
def index():

    id = request.args.get('id')
    msg = f"Could not find item for {id}"

    #Extract all items from our JSON file:
    with open('items.json', 'r') as items:
        data = json.load(items)

        if id is None:
            return render_template('index.html', result="Error")

        elif (id is not None) and (id in data.keys()):
            return render_template('index.html', result=str(data[id]))

        else:
            return render_template('index.html', result=json.loads( ('{{ "{0}":"'+msg+'" }}').format(datetime.datetime.now()) ))


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=1337, debug=True)
