import mongoose, { Schema, model } from "mongoose";

const postSchema = new Schema(
  {
    title: {
      type: String,
      required: true,
      minlength: 3,
      trim: true
    },
    content: {
      type: String,
      required: true,
      minlength: 5
    },
  },
  {
    timestamps: true,
    versionKey: false,
  },
);

const Post = mongoose.model("Post",postSchema);

export default Post;
