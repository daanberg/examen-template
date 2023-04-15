<?php
    require_once './backend/class/dbconfig.php';
    require_once './register-verwerk.php';
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
        <!-- Registratieformulier -->
        <form action="register.php" method="POST">
            <label>Gebruikersnaam:</label>
            <input type="text" name="username" required>
            <br>
            <label>Wachtwoord:</label>
            <input type="password" name="password" required>
            <br>
            <label>Bevestig wachtwoord:</label>
            <input type="password" name="confirm_password" required>
            <br>
            <label>Email:</label>
            <input type="email" name="email" required>
            <br>
            <button type="submit" name="register">Registreren</button>
        </form>
    </body>
</html>