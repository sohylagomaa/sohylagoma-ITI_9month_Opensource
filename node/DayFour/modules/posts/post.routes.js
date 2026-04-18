import { Router } from "express";
import { auth } from "../../middleware/auth.middleware.js";

import {
  createPost,
  getMyPosts,
  updatePost,
  deletePost,
} from "./post.controller.js";

const router = Router();

router.use(auth);

router.post("/posts", createPost);
router.get("/posts", getMyPosts);
router.put("/posts/:id", updatePost);
router.delete("/posts/:id", deletePost);

export default router;
