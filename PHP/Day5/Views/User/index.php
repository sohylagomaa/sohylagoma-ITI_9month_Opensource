<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>users</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f9; padding: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: center; border-bottom: 1px solid #ddd; }
        th { background-color: #4CAF50; color: white; }
        tr:hover { background-color: #f1f1f1; }
    </style>
</head>
<body>

    <h2>system users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>firstName</th>
                <th>lastName</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['first_name'] ?></td>
                <td><?= $user['last_name'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>