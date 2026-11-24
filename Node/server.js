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
  console.log("User connected");
  socket.on("chat message", (message) => {
    console.log(message);
    io.emit("chat message", message);
  });
});
