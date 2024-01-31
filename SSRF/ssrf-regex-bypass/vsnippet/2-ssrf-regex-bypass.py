#!/usr/bin/python3
from flask import Flask, render_template, request
from ignore.design import design
import re, base64, requests
app = design.Design(Flask(__name__), __file__, 'Vsnippet #32 - Format injection classic')

##
# YesWeHack - Vulnerable code snippets
##

def RequestImage(url:str|None):
    if url is None:
        return b""

    #White/Black - lists
    lst_proto = ['http', 'https']
    lst_local = ['localhost', '127.0.0.1']
    
    #Check protocol and requested URL:
    protocol = re.search(r'^(.*?)://', url).group(1)
    URLCheck = re.search(r'^.*://(.*?)(:|/)', url).group(1)

    if (URLCheck in lst_local) and (protocol in lst_proto):
        return b""
        
    res = requests.get(url)

    return res.content

@app.route('/')
def index():
    #Handle image URL - user input
    imageURL = RequestImage(request.args.get('image'))

    imageB64 = base64.b64encode(imageURL).decode('utf-8')
    image = ('''
    <h1>Here is your image!!</h1>
    <img src="data:image/jpg;base64,%s">''' % imageB64)

    return render_template('index.html', result=image)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=1337, debug=True)
