var express = require('express'),
    app = express(),
    https =  require('http'),
    server = https.createServer(app),
    io = require('socket.io')(server),
    port = 3000,
    ipAddress = '0.0.0.0';

server.listen(port,ipAddress,function () {
    console.log('Chat Server started on port : ' + port);
});


app.get('/', function (req, res) {
    res.sendFile(__dirname + '/package.json');
});

// =============================
// Connections
// =============================

io.on('connection', function(socket) {
    console.log('New Connection');
    socket.on('message', function(data) {
        console.log(data)
        console.log('newMessage'+data.receiver)
        io.emit('newMessage'+data.receiver, data);
    });
});
