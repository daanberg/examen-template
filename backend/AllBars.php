<?php 
require_once 'partial/header.php';
require_once 'class/Bars.php';
require_once 'class/User.php';

$bar = new Bars();
$user = new User();
?>

<div class="container">
    <table class="table">
        <tr>
            <th>ID:</th>
            <th>Title:</th>
            <th>Made By:</th>
            <th>Edit:</th>
            <th>Delete:</th>
        </tr>
        <?php foreach($bar->getAllBars() as $b){ ?>
        <tr>
            <td><?php echo $b->ID ?></td>
            <td><?php echo $b->Title ?></td>
            <td><?php echo $user->getAuthorNameById($b->user_id)->name; ?></td>
            <td><a>Hoi</a></td>
            <td><a>Hoi</a></td>
        </tr>

        <?php } ?>
    </table>

</div>