import User from "../../database/models/user.model.js";
import jwt from "jsonwebtoken";
import bcrypt from "bcryptjs";

const signup = async (req,res) => {
    const {name, email, password} = req.body;

    const hashed = bcrypt.hashSync(password, 8);
    const user = await User.create({name, email, password: hashed});

    res.status(201).json(user);
}

const signin = async(req,res) => {
    const {email, password} = req.body;

    const user = await User.findOne({email});
    if(!user){
        return res.status(401).json({message: "Invalid email"});
    }
    const match = bcrypt.compareSync(password, user.password);
    if(!match) {
        return res.status(401).json({message: "Invalid Password"});
    }

    const token = jwt.sign({id: user._id}, process.env.JWT_SECRET);
    res.json({token});
}

export {
    signup,
    signin
}