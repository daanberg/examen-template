<?php
// Databasegegevens
$host = 'localhost';
$dbname = 'kapsalon';
$username = 'root';
$password = '';

// PDO-verbinding
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Controleer of de databaseverbinding succesvol is

} catch(PDOException $e) {
    echo 'Fout bij het verbinden met de database: ' . $e->getMessage();
}
