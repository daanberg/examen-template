<?php
    require_once 'partial/header.php';
    require_once 'class/User.php';

    $user = new User();

    $s = $user->getUser($_GET['user']);

    if(isset($_POST['updateUser'])){
        var_dump($_POST);
    }
?>

<div class="container">
    
    <h1>Wijzig User "<?php echo $s->ID ?>"</h1>

    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Voornaam: </label>
            <input type="text" name="First_Name" class="form-control" value="<?php echo $s->First_Name; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Achternaam: </label>
            <input type="text" name="Last_Name" class="form-control" value="<?php echo $s->Last_Name; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Email: </label>
            <input type="email" name="Email" class="form-control" value="<?php echo $s->Email; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Username: </label>
            <input type="text" name="username" class="form-control" value="<?php echo $s->username; ?>" required>
        </div>
            <input type="submit" name="updateUser" value="Update User" class="btn-primary border btn">
            <input type="submit" name="deleteProduct" value="Delete Product" class="btn-danger border btn">
    </form>
</div>

