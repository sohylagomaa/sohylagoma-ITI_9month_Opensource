import dotenv from "dotenv";
import express from "express";
import mongoose from 'mongoose';

import connectDB from "./Database/db.connect.js";
import postRoutes from "./modules/posts/post.routes.js";

dotenv.config();

connectDB();

const app = express();
app.use(express.json());


app.use(postRoutes);

app.listen(process.env.PORT, () => {
  console.log("server is running");

});
