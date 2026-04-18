const fs = require("fs");
const filePath = "posts.json";

function readPosts() {
    try {
        const data  = fs.readFileSync(filePath,"utf-8");
        return JSON.parse(data);
    }catch(err){
        return [];
    }
}
function writePosts(posts) {
  fs.writeFileSync(filePath, JSON.stringify(posts,null,2));
}

module.exports = { readPosts, writePosts };