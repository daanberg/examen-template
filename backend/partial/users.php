<?php
require_once './class/dbconfig.php';

function getUserById($id) {
    global $conn; // de databaseverbinding wordt hier gebruikt
    
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    
    return mysqli_fetch_assoc($result);
}
?>
