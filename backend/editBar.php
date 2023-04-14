<?php 
require_once 'partial/header.php';
require_once 'class/Bars.php';

$bar = new Bars();

$b = $bar->getBar($_GET['bar']);

if(isset($_POST['updateBar'])){
    echo $bar->updateBar($_GET['bar'], $_POST['Title'], $_POST['Description']);
}

if(isset($_POST['deleteBar'])){
    echo $bar->deleteBar($_GET['bar']);
}
?>

<div class="container">

    <h1>Wijzig Bar "<?php echo $b->ID ?>"</h1>

    <form method="post">
        <div class="mb-5">
            <label for="title" class="form-label">Title: </label>
            <input type="text" name="Title" class="form-control" value="<?php echo $b->Title; ?>" required>
        </div>
        <div class="mb-5">
            <label for="description" class="form-label">Description: </label>
            <input type="text" name="Description" class="form-control" value="<?php echo $b->Description; ?>" required>
        </div>
            <input type="submit" name="updateBar" value="Update Bar" class="btn-primary border btn">
            <input type="submit" name="deleteBar" value="Delete Bar" class="btn-danger border btn">
    </form>
</div>