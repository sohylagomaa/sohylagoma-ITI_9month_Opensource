import Comment from "../../database/models/comment.model.js";

//create comment
const createComment = async (req, res) => {
  const comment = await Comment.create({
    content: req.body.content,
    post: req.body.post,
    user: req.userId,
  });
  res.status(201).json(comment);
};

//get my comments
const getMyComments = async (req, res) => {
  const comments = await Comment.find({ user: req.userId });
  res.json(comments);
};

//update comment
const updateComment = async (req, res) => {
  const comment = await Comment.findOneAndUpdate(
    { _id: req.params.id, user: req.userId },
    req.body,
    { new: true },
  );

  if (!comment) return res.status(403).json({ message: "Not allowed" });

  res.json(comment);
};

//delete comment
const deleteComment = async (req, res) => {
  const comment = await Comment.findOneAndDelete({
    _id: req.params.id,
    user: req.userId,
  });

  if (!comment) return res.status(403).json({ message: "Not allowed" });

  res.json({ message: "Deleted" });
};

export {
    createComment,
    getMyComments,
    updateComment,
    deleteComment
}
