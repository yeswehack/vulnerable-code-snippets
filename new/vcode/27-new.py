from flask import Flask, request
from flask_caching import Cache
import re, datetime
app = Flask(__name__)

##
#   YesWeHack - Vulnerable Code Snippet
##

#Setup cache configurations:
config = {
    "DEBUG": True,
    "CACHE_TYPE": "SimpleCache",
}
app.config.from_mapping(config)
cache = Cache(app)

@app.route("/")
@cache.cached(timeout=10)
def index():

    HTMLContent = '''
    <div id="cache_info">
      <p> The page was cached at: [%s] </p>
      <p> The user was redirected from: [%s] </p>
    </div>
    ''' %  (str(datetime.datetime.now()), str(request.headers.get("Referer")))
    
    return HTMLContent

if __name__=='__main__':
    app.run(debug=True)
