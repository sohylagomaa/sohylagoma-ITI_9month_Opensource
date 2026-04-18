import express from "express";
import path from "path";
import { fileURLToPath } from "url";

const app = express();
app.use(express.json());

app.get("/home", (req, res) => {
  const myFile = fileURLToPath(import.meta.url);
  const dir = path.dirname(myFile);
  const myPage = path.join(dir, "index.html");
  res.sendFile(myPage);
});

let comments = [
  {
    id: 1,
    author: "Sohyla",
    body: "Hello world",
  },
  {
    id: 2,
    author: "Batol",
    body: "Hi",
  },
];
//retrieve all comments
app.get("/comments", (req, res) => {
  res.json(comments);
});
//get comment by ID
app.get("/comments/:id", (req, res) => {
  const commentID = Number(req.params.id);
  let found = comments.find((comment) => comment.id === commentID);
  if (found) {
    res.status(200).json({ message: "comment founded", data: found });
  } else {
    res.status(404).json({ message: "comment not found" });
  }
});
//create new comment
app.post("/comments", (req, res) => {
  req.body.id = comments.length + 1;

  const { author, body } = req.body;
  if (!author || !body) {
    return res.status(400).json({ message: "author and body are required" });
  }
  comments.push(req.body);
  res.status(201).json({ message: "comment added" });
});
//update comment
app.put("/comments/:id", (req, res) => {
  const id = Number(req.params.id);
  let founded = comments.find((c) => c.id === id);
  if (!founded) {
    res.status(404).send("comment not found");
  } else {
    founded.author = req.body.author;
    founded.body = req.body.body;
    res.status(200).json({ message: "comment updated", data: founded });
  }
});
//delete comment
app.delete("/comments/:id", (req, res) => {
  const id = Number(req.params.id);
  const index = comments.findIndex((c) => c.id === id);
  if (index === -1) {
    res.status(404).json({ message: "comment not found" });
  } else {
    const deleted = comments.splice(index, 1);
    res.status(200).json({ message: "comment deleted",data : deleted[0] });
  }
});

app.listen(8000, () => {
  console.log("server is running");
});
