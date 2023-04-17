<?php 

require_once 'partial/header.php';
require_once 'class/Shop.php';

$shop = new Shop();

if(isset($_POST['Add'])){
	echo $shop->create($_POST);
}


?>

<div class="container mt-5">
        <div>
            <h1>Voeg een product toe</h1>
        </div>


<form method="post"> 
        <div class="mb-3">Title</label>
            <input type="text" name="Title" class="form-control" placeholder="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Beschrijving</label>
            <input type="text" name="Description" class="form-control"  placeholder="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Prijs</label>
            <input type="number" name="Price" class="form-control"  placeholder="€">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Bestandsnaam</label>
            <input type="text" name="Img_URL" class="form-control"  placeholder="">
        </div>
        <input type="submit" name="Add" value="Registreer uw bar" class="btn btn-primary">
    </div>
</form>