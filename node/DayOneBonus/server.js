const http = require("http");
const {
  getAllPosts,
  getPostById,
  createPost,
  updatePost,
  deletePost,
} = require("./controllers");

const server = http.createServer((req, res) => {
  if (req.method === "GET" && req.url === "/posts") {
    getAllPosts(req, res);
  } else if (req.method === "GET" && req.url.startsWith("/posts/")) {
    getPostById(req, res);
  } else if (req.method === "POST" && req.url === "/posts") {
    createPost(req, res);
  } else if (req.method === "PUT" && req.url === "/posts") {
    updatePost(req, res);
  } else if (req.method === "DELETE" && req.url === "/posts") {
    deletePost(req, res);
  } else {
    res.writeHead(404);
    res.end(JSON.stringify({ error: "Route not found" }));
  }
});

server.listen(3000, () => {
  console.log("Server running on http://localhost:3000");
});