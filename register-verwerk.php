<?php
require_once './backend/class/dbconfig.php';

if (isset($_POST['register'])) {
    // Controleer of de wachtwoorden overeenkomen
    if ($_POST['password'] !== $_POST['confirm_password']) {
        echo "Wachtwoorden komen niet overeen!";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // Controleer of de gebruikersnaam al bestaat
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "Gebruikersnaam bestaat al!";
        } else {
            // Voeg de gebruiker toe aan de database
            $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
            mysqli_query($conn, $query);

            echo "Account succesvol aangemaakt!";
            header('Location: ./login.php');
        }
    }
}
?>