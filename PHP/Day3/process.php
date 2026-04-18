<?php
if (isset($_POST['save'])) {
    $errors = [];
    
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];
    $room     = $_POST['room'];

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
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    if($profilePic['error'] == 0){
        if(!in_array($profilePic['type'], $allowedTypes)){
            $errors[] = "File must be an image (JPG, PNG).";
        }
    }else {
        $errors[] = "Please upload a profile picture.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<li style='color:red;'>$error</li>";
        }
        exit();
    }

//save and upload picture
    $uploadDir = "uploads/";
    if(!is_dir($uploadDir)){
        mkdir($uploadDir);
    }
    $imagePath = $uploadDir . time() . "_" . $profilePic['name'];
    move_uploaded_file($profilePic['tmp_name'], $imagePath);

    $userRecord = "Name:$name, Email:$email, Room:$room, Photo:$imagePath";

    file_put_contents("userInfo.txt", $userRecord, FILE_APPEND);

    echo "<h1>User Registered Successfully!</h1>";
    echo "<h3>All Users Info:</h3>";

    $allData = file_get_contents("userInfo.txt");

    echo "<div style='background: #f3fcff; padding: 15px;  solid #ccc;'>";
    echo nl2br($allData);
    echo "</div>";
}
?>