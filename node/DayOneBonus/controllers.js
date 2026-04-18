const { readPosts, writePosts } = require("./data");

function isValidatePost(post) {
  return post.id && post.title && post.content;
}

function getAllPosts(req, res) {
  const posts = readPosts();

  res.writeHead(200, { "Content-Type": "application/json" });
  res.end(JSON.stringify(posts));
}

function getPostById(req, res) {
  const posts = readPosts();
  const postID = parseInt(req.url.split("/")[2]);
  const found = posts.find((p) => p.id === postID);

  if (!found) {
    res.writeHead(404);
    res.end("Post not found");
    return;
  }

  res.writeHead(200, { "Content-Type": "application/json" });
  res.end(JSON.stringify(found));
}

function createPost(req, res) {
  req.on("data", (chunck) => {
    try {
      const newPost = JSON.parse(chunck);
      if (!isValidatePost(newPost)) {
        res.writeHead(400);
        res.end("Invalid post data");
        return;
      }
      const posts = readPosts();
      const exists = posts.find((p) => p.id === newPost.id);
      if (exists) {
        res.writeHead(409);
        res.end("Post already exists");
        return;
      }

      const timestamp = new Date().toISOString();
      newPost.createdAt = timestamp;
      newPost.updatedAt = timestamp;

      posts.push(newPost);
      writePosts(posts);

      res.writeHead(201);
      res.end("post created");
    } catch {
      res.writeHead(400);
      res.end("invalid post");
    }
  });
}

function updatePost(req, res) {
  req.on("data", (chunck) => {
    try {
      const updatedPost = JSON.parse(chunck);
      if (!isValidatePost(updatedPost)) {
        res.writeHead(400);
        res.end("Invalid post data");
        return;
      }
      const posts = readPosts();
      const found = posts.find((p) => p.id === updatedPost.id);

      if (!found) {
        res.writeHead(404);
        res.end("Post not found");
        return;
      }
      found.title = updatedPost.title;
      found.content = updatedPost.content;
      found.updatedAt = new Date().toISOString();

      writePosts(posts);
      res.writeHead(200);
      res.end("post updated");
    } catch {
      res.writeHead(400);
      res.end("Invalid JSON");
    }
  });
}

function deletePost(req, res) {
  req.on("data", (chunck) => {
    try {
      const { id } = JSON.parse(chunck);
      const posts = readPosts();
      const filtered = posts.filter((p) => p.id !== id);

      if (posts.length === filtered.length) {
        res.writeHead(404);
        res.end("Post not found");
        return;
      }

      writePosts(filtered);
      res.writeHead(200);
      res.end("Post deleted");
    } catch {
      res.writeHead(400);
      res.end("Invalid JSON");
    }
  });
}

module.exports = {
  getAllPosts,
  getPostById,
  createPost,
  updatePost,
  deletePost,
};
