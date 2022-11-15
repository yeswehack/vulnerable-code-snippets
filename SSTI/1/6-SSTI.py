from flask import Flask, render_template_string, render_template, request
from urllib import parse
import html
app = Flask(__name__)

##
# YesWeHack - Vulnerable code snippets
##

def MySQL_Get(table, data):
    return False, ""
def searchResult():
    return False


def NoItemFound(s):
    tpl = ('''
    <html>
    <head>
     <link rel="stylesheet" href="{{ domain }}/styles.css">
    </head>
    <body>
    <script src="{{ domain }}/main.js"></script>
    <h3 id="search">No result for: %s</h3>
     </body>
    </html>
    ''' % s)

    return render_template_string(tpl, domain=request.url_root)

@app.route('/home.html')
def index():

    #Get user input from "search" and HTML escape:
    inpt = html.escape(request.args.get('search'))

    db_status, db_data = MySQL_Get("products", inpt)
    if db_status:
        HTML = searchResult(db_data)

    else:
        HTML = NoItemFound(inpt)

    #Return content to client:    
    return HTML

if __name__=='__main__':
    app.run(debug=True)
