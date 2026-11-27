const express = require("express");
const http = require("http");
const { Server } = require("socket.io");

const app = express();
const server = http.createServer(app);
const io = new Server(server);
const PORT = 3000;
const path = require("path");

server.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});

app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "test.html"));
});

io.on("connection", (socket) => {
  socket.on("join channel", (channelId) => {
    if (socket.roomName != null) {
      socket.leave(socket.roomName);
    }
    const roomName = `Channel_${channelId}`;
    socket.roomName = roomName;
    socket.join(roomName);
  });
  console.log("User connected");
  socket.on("chat message", (message) => {
    console.log(message);
    io.to(socket.roomName).emit("chat message", message);
  });
});
