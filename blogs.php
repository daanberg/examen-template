<?php
require_once './backend/class/dbconfig.php';

// Query to select all blog posts
$stmt = $pdo->prepare('SELECT * FROM blogs ORDER BY created_at DESC');
$stmt->execute();
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
</head>
<body>
<h1>My Blog</h1>
<a href="create_blog.php">Create new blog post</a>
<hr>
<?php foreach ($blogs as $blog) : ?>
    <h2><?php echo $blog['title']; ?></h2>
    <p>By <?php echo $blog['author']; ?> on <?php echo date('F j, Y', strtotime($blog['created_at'])); ?></p>
    <p><?php echo $blog['content']; ?></p>
    <a href="edit_blog.php?id=<?php echo $blog['id']; ?>">Edit</a>
    <a href="delete_blog.php?id=<?php echo $blog['id']; ?>">Delete</a>
    <hr>
<?php endforeach; ?>
</body>
</html>
