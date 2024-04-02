require 'webrick'
$TITLE = "Server-side template injection (SSTI) - Ruby ERB"
$SOURCE_CODE = File.read(__FILE__)


class SimpleServlet < WEBrick::HTTPServlet::AbstractServlet
  def do_GET(request, response)
    response.status = 200
    response.content_type = 'text/html'    
    
    if request.query.key?('email')
      @email = request.query['email']
      @message = ERB.new('An email with a reset link has been sent to: ' + @email).result(binding)
    else
      @message = ""
    end

    # Render the template file and return it to the client
    response.body = ERB.new(File.read('views/index.html')).result(binding)
  end
end

# Create a WEBrick server with the SimpleServlet
server = WEBrick::HTTPServer.new(Port: 1337, BindAddress: '0.0.0.0')
server.mount('/assets', WEBrick::HTTPServlet::FileHandler, './assets')
server.mount('/', SimpleServlet)

# Shut down the server gracefully when terminated
trap('INT') { server.shutdown }

# Start the server
server.start