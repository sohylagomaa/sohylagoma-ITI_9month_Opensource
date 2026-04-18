import mongoose from "mongoose";

const commentSchema = new mongoose.Schema(
  {
    content: String,
    user: { type: mongoose.Schema.Types.ObjectId, ref: "User" },
    post: { type: mongoose.Schema.Types.ObjectId, ref: "Post" },
  },
  { timestamps: true, versionKey: false },
);

export default mongoose.model("Comment",commentSchema);
