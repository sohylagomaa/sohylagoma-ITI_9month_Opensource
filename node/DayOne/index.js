const http = require("http");
const fs = require("fs");
const filePath = "posts.json";

// let posts = [
//   { id: 1, title: "first post", content: "Hello one" },
//   { id: 2, title: "second post", content: "Hello Two" },
//   { id: 3, title: "third post", content: "Hello Three" },
//   { id: 4, title: "fourth post", content: "Hello Four" },
// ];
function readPosts() {
  const data = fs.readFileSync(filePath, "utf-8");
  return JSON.parse(data);
}
function writePosts(posts) {
  fs.writeFileSync(filePath, JSON.stringify(posts));
}

let posts = readPosts();

const server = http.createServer((req, res) => {
  if (req.method === "GET" && req.url === "/posts") {
    res.writeHead(200, { "Content-Type": "application/json" });
    res.end(JSON.stringify(posts));
  } else if (req.method === "POST" && req.url === "/posts") {
    req.on("data", (chunck) => {
      const newPost = JSON.parse(chunck);
      const isFounded = posts.find((post) => post.id == newPost.id);
      if (isFounded) {
        res.statusCode = 409;
        res.end("post already exist");
      } else {
        posts.push(newPost);
        writePosts(posts);
        res.statusCode = 201;
        res.end("post created");
      }
    });
  } else if (req.method === "PUT" && req.url === "/posts") {
    req.on("data", (chunck) => {
      const updatedPost = JSON.parse(chunck);
      const isFounded = posts.find((post) => post.id == updatedPost.id);
      if (isFounded) {
        isFounded.title = updatedPost.title;
        isFounded.content = updatedPost.content;
        writePosts(posts);
        res.statusCode = 200;
        res.end("post updated");
      } else {
        res.statusCode = 404;
        res.end("post not found");
      }
    });
  } else if (req.method === "DELETE" && req.url === "/posts") {
    req.on("data", (chunck) => {
      const deletedPost = JSON.parse(chunck);
      posts = posts.filter((post) => post.id != deletedPost.id);
      writePosts(posts);
      res.statusCode = 200;
      res.end("post deleted");
    });
  } else if (req.method === "GET" && req.url.startsWith("/posts/")) {
    const postID = parseInt(req.url.split("/")[2]);
    const founded = posts.find((post) => post.id === postID);
    if (!founded) {
      res.statusCode = 404;
      res.end("post not found");
    } else {
      res.writeHead(200, { "content-type": "application/json" });
      res.end(JSON.stringify(founded));
    }
  }
});

server.listen(3000, () => {
  console.log("Server running on http://localhost:3000");
});
