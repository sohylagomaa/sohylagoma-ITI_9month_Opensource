import Post from "../../database/models/post.model.js";
//create post
const createPost = async (req, res) => {
  const post = await Post.create({
    title: req.body.title,
    content: req.body.content,
    user: req.userId,
  });
  res.status(201).json(post);
};

//get my posts
const getMyPosts = async (req, res) => {
  const posts = await Post.find({ user: req.userId });
  res.json(posts);
};

//update post
const updatePost = async (req, res) => {
  const post = await Post.findOneAndUpdate(
    { _id: req.params.id, user: req.userId },
    req.body,
    { new: true }
  );
  if (!post) return res.status(403).json({ message: "Not allowed" });

  res.json(post);
}
//delete post
const deletePost = async (req, res) => {
  const post = await Post.findOneAndDelete({
    _id: req.params.id,
    user: req.userId
  });

  if (!post) return res.status(403).json({ message: "Not allowed" });

  res.json({ message: "Deleted" });
};

export {
    createPost,
    getMyPosts,
    updatePost,
    deletePost
}