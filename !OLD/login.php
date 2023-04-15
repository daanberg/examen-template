<?php
require_once "./backend/class/dbconfig.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./stylesheets/loginstyle.css?v=<?php echo time(); ?>">
  <script src="./js/loginscript.js"></script> 
  <title>Login</title>
</head>
<body>
  <div id="loginform">
    <h2>Login</h2>

        <form method="post">
          <input type="email" name="email" placeholder="email" />
          <input type="password"placeholder="password" name="password" />
          <input type="submit" value="Login" />
      </from>
      
    <div class="warning">Account was not found</div>
  </div>
</body>
</html>
