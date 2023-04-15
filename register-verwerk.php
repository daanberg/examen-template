<?php
// Controleer of het registratieformulier is ingediend
if (isset($_POST['register'])) {

    // Gebruikersinvoer ontvangen en filteren
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Controleer of het wachtwoord en de bevestiging overeenkomen
    if ($password !== $confirm_password) {
        echo "Wachtwoord komt niet overeen";
        exit();
    }

    // Controleer of de gebruikersnaam al bestaat in de database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Gebruikersnaam is al in gebruik";
        exit();
    }

    // Voeg de nieuwe gebruiker toe aan de database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Wachtwoord hashen
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')";
    mysqli_query($conn, $sql);

    // Stuur de gebruiker door naar dashboard.php
    header("Location: ./dashboard.php");
    exit();
}
?>
