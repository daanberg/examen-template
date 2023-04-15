<?php
require_once './backend/class/dbconfig.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Er is iets fout gegaan bij het ophalen van de gebruiker.";
            exit();
        }
    } else {
        echo "Er is iets fout gegaan bij het uitvoeren van de query.";
        exit();
    }
} else {
    header("Location: ./dashboard.php");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $query = "UPDATE users SET username = '$username', email = '$email' WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ./dashboard.php");
        exit();
    } else {
        echo "Er is iets fout gegaan bij het bijwerken van de gebruiker.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker bijwerken</title>
</head>
<body>
    <h1>Gebruiker bijwerken</h1>
    <form action="" method="POST">
        <label for="username">Gebruikersnaam:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
        <input type="submit" name="submit" value="Bijwerken">
    </form>
</body>
</html>
