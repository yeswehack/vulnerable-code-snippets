from flask import Flask, request
app = Flask(__name__)

##
# YesWeHack - Vulnerable code snippets
##

def renderHTML(str):
    HTML = ('''
    <html>
     <body>
     <h2 id="welcome">Welcome:</h2>
      <script>
        name = '%s';
        out = document.getElementById('welcome');
        out.innerHTML += name;
        
      </script>
     </body>
    </html>
    ''' % str)

    return HTML

@app.route('/profile')
def index():

    name = request.args.get('name')
    name = name.replace('\'', '', -1)

    HTML = renderHTML(name)

    return HTML


//Start the server:
if __name__=='__main__':
    app.run(debug=True)
