<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheets/header.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<header>

<!--laptop/ipad nav-->
  <div class="nav">
    <div class="navitems">
      <a href="home.php">Home</a>
    <br><br>
      
      <a href="contact.php">Contact</a>
    <br><br>
      
      <a href="webshop.php">Webshop</a>
    <br><br>
      
      <a href="login.php">Inloggen</a>
    </div>
  </div>

<!--phone nav-->
<div class="mobile-container">

<!-- Top Navigation Menu -->
<div class="topnav">
  <h1 href="#home" class="active">Je haar zit goed</h1>
  <div id="myLinks">
    <a href="home.php">Home</a>
    <a href="contact.php">Contact</a>
    <a href="webshop.php">Webshop</a>
    <a href="login.php">login</a>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<!-- End smartphone / tablet look -->
</div>

<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

</header>

