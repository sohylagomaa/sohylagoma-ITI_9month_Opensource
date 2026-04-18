import mongoose from "mongoose";

const connectDB = async () => {
  await mongoose.connect(process.env.MONGO_URL);
  console.log("connected to DB");
};

export default connectDB;
