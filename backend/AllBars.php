<?php 
require_once 'partial/header.php';
require_once 'class/Bars.php';
require_once 'class/User.php';

$bar = new Bars();
$user = new User();

?>
<div class="container">
    <h1>Alle Bars</h1>
    <table class="table">
        <tr>
            <th>ID:</th>
            <th>Title:</th>
            <th>Made By:</th>
            <th>Edit:</th>
        </tr>
        <?php foreach($bar->getAllBars() as $b){ ?>
        <tr>
            <td><?php echo $b->ID ?></td>
            <td><?php echo $b->Title ?></td>
            <td><?php echo $b->user_id ?></td>
            <td><a href="editBar.php?bar=<?= $b->ID ?>" class="border btn-primary nav-link text-white">Edit</a></td>

        </tr>

        <?php } ?>
    </table>

</div>