<?php

if (isset($_POST['submit'])) {
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $skills = isset($_POST['skills']) ? $_POST['skills'] : [];
    $username = $_POST['username'];
    $dept = $_POST['department'];

    
    $title = ($gender == "Male") ? "Mr." : "Miss.";

    echo "<h1>Thanks $title $fname $lname</h1>";
    echo "<h3>Please Review Your Information:</h3>";
    
    echo "<b>Name:</b> $fname $lname <br>";
    echo "<b>Address:</b> $address <br>";
    echo "<b>Country:</b> $country <br>";
    echo "<b>Your Skills:</b> " . implode(", ", $skills) . "<br>";
    echo "<b>Username:</b> $username <br>";
    echo "<b>Department:</b> $dept <br>";

    
    $skills_str = implode(", ", $skills);
    $data_to_save = "Name: $fname $lname | Address: $address | Country: $country | Gender: $gender | Skills: $skills_str | User: $username | Dept: $dept" ;
    
    $file = fopen("users.txt", "a");
    if ($file) {
        fwrite($file, $data_to_save);
        fclose($file);
    }


}
?>