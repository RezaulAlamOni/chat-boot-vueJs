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
    socket.on('logoutId', function(data) {
        console.log(data)
        io.emit('logoutId',data);
    });
    socket.on('loginId', function(data) {
        console.log(data)
        io.emit('loginId',data);
    });
    socket.on('removeMessage', function(data) {
        console.log(data)
        io.emit('removeMessageId',data.messageId);
    });
    socket.on('updateMessage', function(data) {
        console.log(data)
        io.emit('updateMessageId',data);
    });
});
