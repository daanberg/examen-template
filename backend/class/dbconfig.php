<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "template";

// Maak de verbinding
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Controleer of de verbinding werkt
if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

// Functie om gebruiker toe te voegen aan database
function addUserToDatabase($name, $email, $password) {
    global $conn;
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
?>
