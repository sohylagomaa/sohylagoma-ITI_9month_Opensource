import { Router } from "express";
import { auth } from "../../middleware/auth.middleware.js";

import {
    createComment,
    getMyComments,
    updateComment,
    deleteComment
} from "./comment.controller.js";

const router = Router();

router.use(auth);

router.post("/comments", createComment);
router.get("/comments", getMyComments);
router.put("/comments/:id", updateComment);
router.delete("/comments/:id", deleteComment);

export default router;