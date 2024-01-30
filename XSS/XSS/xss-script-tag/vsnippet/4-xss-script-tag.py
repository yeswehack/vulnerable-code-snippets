from flask import Flask, request, render_template
from ignore.design import design
title = 'Vsnippet #4 - Cross Site Scripting (XSS) script tag outbreak'
app = design.Design(Flask(__name__), __file__, title)

##
# YesWeHack - Vulnerable code snippets
##

def renderHTML(str):
    HTML = ('''
    <h2 id="welcome">Welcome: </h2>
    <script>
        name = '%s';
        out = document.getElementById('welcome');
        out.innerHTML += name;
    </script>
    ''' % str)

    return HTML

@app.route('/')
def index():
    try:
        name = request.args.get('name').replace('\'', '', -1)
    except:
        name = 'Guest'

    return render_template('index.html', result=renderHTML(name))


#Start the server:
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=1337, debug=True)
