<?php 
require_once 'partial/header.php';
require_once 'class/Shop.php';

$shop = new Shop();

$s = $shop->getProduct($_GET['product']);

if(isset($_POST['updateProduct'])){
    echo $shop->updateProduct($_GET['product'], $_POST['Title'], $_POST['Description'], $_POST['Price'], $_POST['Img_URL']);
}

if(isset($_POST['deleteProduct'])){
    echo $shop->deleteProduct($_GET['product']);
}

?>

<div class="container">

    <h1>Wijzig Product "<?php echo $s->ID ?>"</h1>

    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Titel: </label>
            <input type="text" name="Title" class="form-control" value="<?php echo $s->Title; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description: </label>
            <input type="text" name="Description" class="form-control" value="<?php echo $s->Description; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Prijs: </label>
            <input type="number" name="Price" class="form-control" value="<?php echo $s->Price; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Bestandsnaam: </label>
            <input type="text" name="Img_URL" class="form-control" value="<?php echo $s->Img_URL; ?>" required>
        </div>
            <input type="submit" name="updateProduct" value="Update Bar" class="btn-primary border btn">
            <input type="submit" name="deleteBar" value="Delete Bar" class="btn-danger border btn">
    </form>
</div>