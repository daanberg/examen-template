<?php
// Databasegegevens
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kapsalon";

// Maak de verbinding
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Controleer of de verbinding werkt
if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

// Geef een succesmelding
echo "Verbinding succesvol!";