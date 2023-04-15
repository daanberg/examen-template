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
?>
