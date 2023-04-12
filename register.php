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



        <div class="mb-1">
            <label for="" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ik spit die bars, want die snicker was over de datum">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Ze zegt ik heb brains, ik ben smartie">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Confirm your password</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="ik koop geen tony's, want ik let op mn moneys">
        </div>
        <button type="submit" class="btn btn-primary" name="register">Registreer uw bars</button>
    </div>


<?php
require_once 'partial/footer.php';
?>