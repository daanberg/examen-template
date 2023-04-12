<?php
require_once 'partial/header.php';
require_once 'backend/class/User.php';

$user = new User();

if(isset($_POST['login'])){
	echo $user->login($_POST);
}

session_start();
if(isset($_SESSION['ingelogd']) && $_SESSION['ingelogd']){
	header("Location: ./backend/admin.php");
}

var_dump($_POST);
?>

    <div class="container mt-5">
        <div>
            <h1>Login mijn makker</h1>
        </div>


<form method="post"> 
        <div class="mb-1">
            <label for="email" id="email" class="form-label">Email address</label>
            <input type="email" name="Email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="Password" class="form-control" id="exampleFormControlInput1" placeholder="Ze zegt ik heb brains, ik ben smartie">
        </div>
    
        <input type="submit" name="login" value="Login " class="btn btn-primary">
    </div>
</form>

<?php
require_once 'partial/footer.php';
?>