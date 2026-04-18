import jwt from "jsonwebtoken";

const auth = (req, res, next) =>{
    const token = req.headers.token;

    if(!token){
        return res.status(401).json({message: "No Token"});
    }
    const decoded = jwt.verify(token, process.env.JWT_SECRET);
    req.userId = decoded.id;

    next();
}

export{auth}