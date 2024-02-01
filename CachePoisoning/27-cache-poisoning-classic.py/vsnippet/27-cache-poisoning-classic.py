#!/usr/bin/python3
from flask import Flask, render_template, request
from flask_caching import Cache
from ignore.design import design
import datetime
app = design.Design(Flask(__name__), __file__, 'Vsnippet #27 - Cache poisoning classic')

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
    
    return render_template('index.html', result=HTMLContent)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=1337, debug=True)