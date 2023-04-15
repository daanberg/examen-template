<?php
    require_once './backend/class/dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <!-- Login Form -->
        <form method="post" action="login.php">
            <input type="text" name="username" placeholder="Gebruikersnaam">
            <input type="password" name="password" placeholder="Wachtwoord">
            <button type="submit" name="login">Inloggen</button>
        </form>

        <!-- Registratie-link -->
        <p>Heb je nog geen account? <a href="register.php">Registreer hier</a></p>

        <?php
        session_start();
        require_once('./backend/class/dbconfig.php');

        if (isset($_POST['login'])) {
            if (empty($_POST['username']) || empty($_POST['password'])) {
                echo "Vul alstublieft alle velden in!";
            } else {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['username'] = $username;
                    header('Location: ./dashboard.php');
                } else {
                    echo "Gebruikersnaam of wachtwoord is onjuist!";
                }
            }
        }
        ?>

    </body>
</html>

