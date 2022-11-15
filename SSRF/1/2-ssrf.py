from flask import Flask, request
import base64, requests
import re as regex

##
# YesWeHack - Vulnerable code snippets
##

app = Flask(__name__)

def RequestImage(url):
    #White/Black - lists
    lst_proto = ['http', 'https']
    lst_local = ['localhost', '127.0.0.1']
    
    #Check protocol and requested URL:
    protocol = regex.search(r'^(.*?)://', url).group(1)
    URLCheck = regex.search(r'^.*://(.*?)(:|/)', url).group(1)

    if (URLCheck in lst_local) and (protocol in lst_proto):
        return b""
        
    res = requests.get(url)

    return res.content

@app.route('/')
def index():
    #Handle image URL - user input
    imgURL = request.args.get('image')
    img = RequestImage(imgURL)

    imageB64 = base64.b64encode(img).decode("utf-8")

    HTML = ('''
    <h1>Here is your image!!</h1>
    <img src="data:image/jpg;base64,%s">''' % imageB64)

    return HTML


@app.route('/private')
def privateFiles():
    #Code for private file storage...

    return "<html..."

if __name__=='__main__':
    app.run(debug=True)
