<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "delete from users where id = '$id'";
        $pdo->query($sql);
        
        header("Location: listUsers.php");
        exit();

    } catch (PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}
?>