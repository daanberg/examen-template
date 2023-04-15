<?php
require_once 'dbconfig.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM blogs WHERE id = :id";
    $stmt = $db_conn->prepare($sql);
    $stmt->execute([':id' => $id]);

    header("Location: index.php");
    exit();
} else {
    exit("Blog
