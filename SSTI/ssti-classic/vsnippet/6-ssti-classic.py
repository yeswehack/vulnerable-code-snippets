from flask import Flask, render_template_string, render_template, request
import html
from ignore.design import design
app = design.Design(Flask(__name__), __file__, 'Vsnippet 6 - Server Side Template Injection (SSTI)')

##
# YesWeHack - Vulnerable code snippets
##


def MySQL_Get(table, data):#<-Dummy function
    return False, ""
def searchResult():#<-Dummy function
    return ""


def NoItemFound(s):
    tpl = ('''
    <script src="{{ domain }}/main.js"></script>
    <h3 id="search">No result for: %s</h3>
    ''' % s)
    return render_template_string(tpl, domain=request.url_root)

@app.route('/')
def index():
    try:
        #Get the user search value:
        search = html.escape(request.args.get('search'))
    except:
        return render_template('index.html', result="No search provided")


    db_status, db_data = MySQL_Get("products", search)
    if db_status:
        data = searchResult(db_data)

    else:
        data = NoItemFound(search)

    #Return content to client:
    return render_template('index.html', result=data)


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=1337, debug=True)
