import dotenv from "dotenv";
import express from "express";
import connectDB from "./database/connect.js";
import authRoutes from "./modules/auth/auth.routes.js";
import postRoutes from "./modules/posts/post.routes.js";
import commentRoutes from "./modules/comments/comment.routes.js";

dotenv.config();

const app = express();
app.use(express.json());

connectDB();

app.use(authRoutes);
app.use(postRoutes);
app.use(commentRoutes);

app.listen(3000, () => console.log("Server running"));