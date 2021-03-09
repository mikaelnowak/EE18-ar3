// Load HTTP module
const http = require("http");

const hostname = "127.0.0.1";
const port = 5000;

// Create HTTP server
const server = http.createServer((req, res) => {

   // Set the response HTTP header with HTTP status and Content type
   res.writeHead(200, {'Content-Type': 'text/plain'});

   // Send the response body "Hello World"
   res.end('Hello World\n');
});

// Prints a log once the server starts listening
server.listen(port, hostname, () => {
   console.log(`Server running at http://${hostname}:${port}/`);
})

//docker run --restart unless-stopped -d -p 8080:80 -p 10000:10000 -p 5000:5000 -v D:\Github\EE18-ar3:/var/www -v mysql-data:/var/lib/mysql --name lamp karye/lampw:latest