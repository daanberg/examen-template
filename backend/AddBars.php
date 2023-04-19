<?php
    require_once './partial/header.php';
    require_once './class/Bars.php';

$bar = new Bars();

if(isset($_POST['Add'])){
	echo $bar->create($_POST);
}
?>

<div class="container mt-5">
        <div>
            <h1>Registreer uw Bar</h1>
        </div>


<form method="post"> 
        <div class="mb-3">
            <label for="" class="form-label">De Bar</label>
            <input type="text" name="Title" class="form-control" placeholder="Ik spit die bars, want die snicker was over de datum">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Korte Uitleg</label>
            <input type="text" name="Description" class="form-control"  placeholder="Ze zegt ik heb brains, ik ben smartie">
        </div>
        
       
        <input type="submit" name="Add" value="Registreer uw bar" class="btn btn-primary">
    </div>
</form>