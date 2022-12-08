from flask import Flask, request
import html
import customLog
# - Host this python Flask server on port 5000 (default=5000)

##
# YesWeHack - Vulnerable code snippet
##


app = Flask(__name__)
app.config["UPLOAD_FOLDER"] = "share/"

def Upload():
    return '''
    <html>
     <body>
      <form action = "http://localhost:5000/" method="POST" 
      enctype="multipart/form-data">
       <input type="file" name="file">
       <input type="submit" value="Upload">
      </form>   
     </body>
    </html>'''

@app.route('/share')
def sharedFiles():
    # Get: Filename -> Log -> Read it
    getFile = request.args.get("filename").replace('/','').replace('\\', '')
    file = open(app.config['UPLOAD_FOLDER'] + getFile, "r")

    return file.read() 

@app.route('/', methods = ['GET', 'POST'])
def index():
    #Just some custom "logging" here:
    customLog.log()

    #Upload your file:
    if request.method == 'POST':
        f = request.files['file']
        f.save(app.config["UPLOAD_FOLDER"] + f.filename)
        
        return ('''<h2>File: succeeded!</h2><br>
        <a href="/">..Back</a><br>
        <a href="./share?filename=%s">See my file</a>''' % html.escape(f.filename))

    return Upload()



if __name__=='__main__':
    app.run(debug=True)
