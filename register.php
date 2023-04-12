<?php
require_once 'partial/header.php';
require_once 'backend/class/User.php';

$user = new User();

if(isset($_POST['register'])){
	echo $user->create($_POST);
}

?>

    <div class="container mt-5">
        <div>
            <h1>Registreer uw makker</h1>
        </div>


<form method="post"> 
        <div class="mb-1">
            <label for="" class="form-label">Email address</label>
            <input type="email" name="Email" class="form-control" id="exampleFormControlInput1" placeholder="Ik spit die bars, want die snicker was over de datum">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" name="Password" class="form-control" id="exampleFormControlInput1" placeholder="Ze zegt ik heb brains, ik ben smartie">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Confirm your password</label>
            <input type="password" name="conf-password" class="form-control" id="exampleFormControlInput1" placeholder="ik koop geen tony's, want ik let op mn moneys">
        </div>
        <input type="submit" name="register" value="Registreer uw barz" class="btn btn-primary">
    </div>
</form>

<?php
require_once 'partial/footer.php';
?>