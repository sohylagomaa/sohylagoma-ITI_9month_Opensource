<?php
include_once("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->query("select * from users where id = '$id'");
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}


if (isset($_POST['update'])) {
    $id       = $_POST['id'];
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $room     = $_POST['room'];
    $ext      = $_POST['ext'];

    try {
        
        $sql = "update users set 
                name = '$name', 
                email = '$email', 
                room = '$room', 
                ext = '$ext' 
                WHERE id = '$id'";
        
        $pdo->exec($sql);
        header("Location: listUsers.php"); 
        exit();
    } catch (PDOException $e) {
        echo "Error updating: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script></head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow col-md-6 mx-auto">
        <div class="card-header bg-primary text-white"><h3>Edit User</h3></div>
        <div class="card-body">
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Room No:</label>
                    <select name="room" class="form-select">
                        <option value="Application1" <?php if($user['room'] == 'Application1') echo 'selected'; ?>>Application1</option>
                        <option value="Application2" <?php if($user['room'] == 'Application2') echo 'selected'; ?>>Application2</option>
                        <option value="Cloud" <?php if($user['room'] == 'Cloud') echo 'selected'; ?>>Cloud</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ext.:</label>
                    <input type="text" name="ext" class="form-control" value="<?php echo $user['ext']; ?>">
                </div>

                <button type="submit" name="update" class="btn btn-primary w-100">Update Data</button>
                <a href="listUsers.php" class="btn btn-link w-100 mt-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>