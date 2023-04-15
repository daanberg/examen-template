<?php
require_once './backend/class/dbconfig.php';
require_once './backend/partial/header.php';

// Uitvoeren van SQL-query
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./backend/partial/headerstyle.css">
    <link rel="stylesheet" type="text/css" href="./css/dashboardcss.css">

    <title>Dashboard</title>
</head>
    <body>

    <div class="container">
        <?php
            session_start();
            if(isset($_SESSION['username'])) {
                echo "<p>Welkom terug, " . $_SESSION['username'] . "! <br> Wat wilt u vandaag doen?</p>";
            } else {
                header("Location: login.php");
                exit();
            }
        ?>
    </div>

<div class="container">
        <?php
            // Weergeven van resultaten
            echo "<table>";
            echo "<tr><th>ID</th><th>Gebruikersnaam</th><th>Email</th><th>Actie</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td><a href='./delete.php?user_id=" . $row["user_id"] . "'>Verwijderen</a> | <a href='./update.php?user_id=" . $row["user_id"] . "'>Bewerken</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>

    <br>

    <div class="container">
            <form action="./logout.php">
                <button type="submit">Uitloggen</button>
            </form>
    </div>
    </body>
</html>
