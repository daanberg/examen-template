<?php
require_once 'dbconfig.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    $sql = "INSERT INTO blogs (title, content, author, created_at, updated_at) VALUES (:title, :content, :author, NOW(), NOW())";
    $stmt = $db_conn->prepare($sql);
    $stmt->execute([':title' => $title, ':content' => $content, ':author' => $author]);

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Blog</title>
</head>
<body>
<h1>Create Blog</h1>
<form method="POST">
    <label>Title:</label>
    <input type="text" name="title" required>
    <br><br>
    <label>Content:</label>
    <textarea name="content" required></textarea>
    <br><br>
    <label>Author:</label>
    <input type="text" name="author" required>
    <br><br>
    <button type="submit">Create</button>
</form>
</body>
</html>
