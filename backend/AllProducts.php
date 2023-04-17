<?php 
require_once 'partial/header.php';
require_once 'class/Shop.php';


$shop = new Shop();


?>
<div class="container">
    <h1>Alle Producten</h1>
    <table class="table">
        <tr>
            <th>ID:</th>
            <th>Titel:</th>
            <th>Beschrijving:</th>
            <th>Edit:</th>
        </tr>
        <?php foreach($shop->getAllProducts() as $s){ ?>
        <tr>
            <td><?php echo $s->ID ?></td>
            <td><?php echo $s->Title ?></td>
            <td><?php echo $s->Description ?></td>
            <td><a href="editProduct.php?product=<?= $s->ID ?>" class="border btn-primary nav-link text-white">Edit</a></td>

        </tr>

        <?php } ?>
    </table>

</div>