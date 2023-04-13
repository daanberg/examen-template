<?php
require_once 'partial/header.php';
require_once 'backend/class/User.php';

$user = new User();

if(isset($_POST['login'])){
	echo $user->login($_POST);
}



var_dump($_POST);
?>

    <div class="container mt-5">
        <div>
            <h1>Login</h1>
        </div>



        <main>
    	<section class="form">
	    	<form method="post">
                <div class="mb-1">
                    <label for="username" id="username">Gebruikersnaam: </label>
                    <input type="text" name="username" required><!-- admin -->
                </div>
                <div class="mb-1">
                    <label for="password">Wachtwoord: </label>
                    <input type="password" name="password" required>
                </div>
	    		<input type="submit" name="login" value="Login">
	    	</form>
	    	<a href="registratie.php">Registreren</a>
    	</section>
    </main>
<!-- <form method="post"> 
        <div class="mb-1">
            <label for="" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Wachtwoord</label>
            <input type="password" name="Password" class="form-control">
        </div>
    
        <input type="submit" name="login" value="Login " class="btn btn-primary">
    </div>
</form> -->

<?php
require_once 'partial/footer.php';
?>