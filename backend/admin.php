<?php 
require_once 'partial/header.php';


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
    <div class="container">
        <div class="row justify-content-around text-center">
            <div class="col-lg-3 border bg-light "><a href='AllBars.php' class="nav-link">Bekijk alle Barz </a></div>
            <div class="col-lg-3 border bg-light" ><a href='allProducts.php' class="nav-link">Bekijk alle Producten</a></div>
            <div class="col-lg-3 border bg-light">Bekijk ...</div>
        </div>
        <div class="row justify-content-around text-center mt-3">
            <div class="col-lg-3 border bg-light"><a href="AddBars.php" class="nav-link">Voeg Barz toe </a></div>
            <div class="col-lg-3 border bg-light"><a href="AddProducts.php" class="nav-link"> Voeg Producten toe</a></div>
            <div class="col-lg-3 border bg-light">Voeg ... toe</div>
        </div>
    </div>
</body>
</html>