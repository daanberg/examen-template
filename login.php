<?php
require_once 'partial/header.php';
require_once 'backend/class/User.php';

$user = new User();

if(isset($_POST['login'])){
	echo $user->login($_POST); //stuurt data naar de login functie
}


session_start();
if(isset($_SESSION['ingelogd']) && $_SESSION['ingelogd']){
	header("Location: ./backend/admin.php"); //als je ingelogt ben wordt je geredirect naar dashboard ipv opnieuw inloggen
}

?>

    <div class="container mt-5">
        <div>
            <h1>Login</h1>
        </div>



        <main>
    	<section class="form">
	    	<form method="post">
                <div class="mb-1">
                    <label for="email" id="email" class="form-label">Gebruikersnaam: </label> <!-- Text -->
                    <input type="email" name="Email" class="form-control" required ><!-- Invoerveld -->
                </div>
                <div class="mb-1">
                    <label for="password" class="form-label">Wachtwoord: </label>
                    <input type="password" name="password" class="form-control" required>
                </div>
	    		<input type="submit" name="login"  value="Login" class="btn btn-primary">
	    	</form>
	    	<a href="registratie.php">Registreren</a>
    	</section>
    </main>


<?php
require_once 'partial/footer.php';
?>