<!DOCTYPE html>
<html>
<head>
    <title>Add User Form</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: inline-block; width: 120px; }
    </style>
</head>
<body>
    <h2>Add User</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" required>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label>Confirm Password:</label>
            <input type="password" name="confirm_password" required>
        </div>
        <div class="form-group">
            <label>Room No:</label>
            <select name="room">
                <option value="Application1">Application1</option>
                <option value="Application2">Application2</option>
                <option value="Cloud">Cloud</option>
            </select>
        </div>

        <div class="form-group">
            <label>Ext.:</label>
            <input type="text" name="ext">
        </div>

        <div class="form-group">
            <label>Profile picture:</label>
            <input type="file" name="profile_pic" accept="image/*">
        </div>

        <button type="submit" name="save">Save</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>