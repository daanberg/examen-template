<?php
    require_once 'dbconfig.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM blogs WHERE id = :id";
        $stmt = $db_conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $blog = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$blog) {
            exit("Blog not found.");
        }
    } else {
        exit("Blog ID not specified.");
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $sql = "UPDATE blogs SET title = :title, content = :content, updated_at = NOW() WHERE id = :id";
        $stmt = $db_conn->prepare($sql);
        $stmt->execute([':title' => $title, ':content' => $content, ':id' => $id]);

        header("Location: index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Blog</title>
</head>
<body>
    <h1>Edit Blog</h1>
    <form method="POST">
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $blog['title'] ?>" required>
        <br><br>
        <label>Content:</label>
        <textarea name="content" required><?php echo $blog['content'] ?></textarea>
        <br><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
