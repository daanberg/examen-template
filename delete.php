<?php
require_once './backend/class/dbconfig.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $query = "DELETE FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ./dashboard.php");
        exit();
    } else {
        echo "Er is iets fout gegaan bij het verwijderen van de gebruiker.";
    }
} else {
    header("Location: ./dashboard.php");
    exit();
}
?>
