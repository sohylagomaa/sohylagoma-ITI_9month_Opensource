import mongoose from "mongoose";
import Post from "./post.model.js";

//get all posts
const getAllPosts = async(req,res) =>{
    const posts = await Post.find();
    res.status(200).json(posts);
}
//get post by id
const getPostById = async(req,res) => {
    const id = req.params.id;
    if(!mongoose.Types.ObjectId.isValid(id)){
        return res.status(400).json({message: "invalid post id"});
    }

    const post = await Post.findById(id);
    if(!post){
        return res.status(404).json({message: "post not found"});
    }
    res.status(200).json(post);
}
//create post
const createPost = async(req,res) => {
    const post = await Post.insertMany(req.body);
    res.status(201).json(post);
}
//update post
const updatePost = async(req,res) => {
    const id = req.params.id;
    if(!mongoose.Types.ObjectId.isValid(id)){
        return res.status(400).json({message: "invalid post id"});
    }

    const post = await Post.findByIdAndUpdate(id,req.body,{new: true});
    if(!post){
        return res.status(404).json({message: "post not found"});
    }
    res.status(200).json(post);
}
//delete post
const deletePost = async(req,res) => {
    const id = req.params.id;
    if(!mongoose.Types.ObjectId.isValid(id)){
        return res.status(400).json({message: "invalid post id"});
    }
    const post = await Post.findByIdAndDelete(id);
    if(!post){
        return res.status(404).json({message: "post not found"});
    }
    res.status(200).json({message: "post deleted successfully"});
}

export{
    getAllPosts,
    getPostById,
    createPost,
    updatePost,
    deletePost
}