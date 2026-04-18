<?php
    include_once("db.php");
    try {
        $sql = "select * from users";
        $result = $pdo->query($sql);
        $users = $result->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        die("Error fectching data: " . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users List</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script></head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Registered Users</h2>
        <a href="addUser.php" class="btn btn-success">Add New User</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        
                        <th>Name</th>
                        <th>Email</th>
                        <th>Room</th>
                        <th>Ext.</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr class="align-middle">
                        
                        <td><strong><?php echo $user['name']; ?></strong></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><span class="badge bg-info text-dark"><?php echo $user['room']; ?></span></td>
                        <td><?php echo $user['ext']; ?></td>
                        <td>
                            <img src="<?php echo $user['profile_pic']; ?>" class="rounded-circle border" width="45" height="45" alt="profile">
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="delete.php?id=<?php echo $user['id']; ?>" 
                               class="btn btn-sm btn-outline-danger" 
                               >Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>