<?php
    require_once './backend/class/dbconfig.php';
    require_once './backend/partial/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./backend/partial/headerstyle.css">

    <title>Document</title>
</head>
<body>

<?php
session_start();
if(isset($_SESSION['username'])) {
    echo "<p>Welkom terug, " . $_SESSION['username'] . "! <br> Wat wilt u vandaag doen?</p>";
} else {
    header("Location: login.php");
    exit();
}
?>

    <form action="./logout.php">
        <button type="submit">Uitloggen</button>
    </form>

</body>
</html>