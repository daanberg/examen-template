<?php 
    require_once 'partial/header.php';
    require_once 'class/Shop.php';


    $shop = new Shop();
    
    $shop->search($_POST['Title'])


?>

<div class="container">

    <form method="post"> 
        <div class="mb-3">Titel</label>
            <input type="text" name="Title" class="form-control" placeholder="Zoek op een titel">
        </div>

        <input type="submit" name="Zoek" value="Zoek het product" class="btn btn-primary">
    </form>


    
</div>