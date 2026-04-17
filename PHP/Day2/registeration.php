<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="done.php" method="POST">
        First Name: <input type="text" name="fname" required><br><br>
        Last Name: <input type="text" name="lname" required><br><br>
        
        Address: <textarea name="address" required></textarea><br><br>
        
        Country: 
        <select name="country">
            <option value="Egypt">Egypt</option>
            <option value="USA">USA</option>
            <option value="Germany">Germany</option>
        </select><br><br>

        Gender: 
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female"> Female<br><br>
        
        Skills: <br>
        <input type="checkbox" name="skills[]" value="PHP"> PHP
        <input type="checkbox" name="skills[]" value="MySQL"> MySQL
        <input type="checkbox" name="skills[]" value="J2SE"> J2SE
        <input type="checkbox" name="skills[]" value="PostgreSQL"> PostgreSQL<br><br>
        
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        
        Department: <input type="text" name="department" value="OpenSource" readonly><br><br>
        
        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>