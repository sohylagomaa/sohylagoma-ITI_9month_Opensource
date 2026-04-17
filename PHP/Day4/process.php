<?php
include_once("db.php");

if (isset($_POST['save'])) {
    $errors = [];
    
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];
    $room     = $_POST['room'];
    $ext      = $_POST['ext'];

    //validation
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Email format is invalid (Method 1: filter_var)";
    }
    $emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if(!preg_match($emailPattern, $email)){
        $errors[] = "Email format is invalid (Method 2: Regex)";
    }

    if(strlen($password) !== 8) {
        $errors[] = "Password must be exactly 8 characters.";
    }
    $passPattern = "/^[a-z0-9_]+$/";
    if(!preg_match($passPattern, $password)){
        $errors[] = "Password must be lowercase only and no special characters except underscore.";
    }
    if ($password !== $confirm) {
        $errors[] = "Passwords do not match.";
    }

    $profilePic = $_FILES['profile_pic'];
    $imagePath = "";

    if($profilePic['error'] == 0){
        $uploadDir = "uploads/";
        if(!is_dir($uploadDir)) mkdir($uploadDir);
        
        $imagePath = $uploadDir . time() . "_" . $profilePic['name'];
        move_uploaded_file($profilePic['tmp_name'], $imagePath);
    } else {
        $errors[] = "Please upload a profile picture.";
    }

    if (empty($errors)) {
        try{
            $sql = "insert into users (name, email, password, room, ext, profile_pic) values ('$name','$email', '$password', '$room', '$ext', '$imagePath')";
        
            $pdo->query($sql);
            echo "data saved successfully";
            header("Location: listUsers.php");
        }catch (PDOException $e) {
            echo "Error in save: " . $e->getMessage();
        }
    }else {
        
        echo "<h3>Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li style='color:red;'>$error</li>";
        }
        echo "</ul><a href='addUser.php'>Back to Form</a>";
    }
}
