<?php
  require_once 'partial/header.php';
  require_once 'backend/class/Shop.php';

  $shop = new Shop();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1>101 Chocolate Barz Merchandise</h1>

        <?php foreach($shop->getAllProducts() as $s) { ?>

        <div class="row mt-5">
            <div class="col-sm-3">
                <div class="card">
                <img class="card-img-top" src="<?php echo $s->Img_URL ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $s->Title ?></h5>
                    <p class="card-text"><?php echo $s->Description ?> </p>
                    <a class="btn btn-primary text-white text-decoration-none w-50"><img src="img/cart.svg" class="text-white mr-5"  alt="">Buy Now</a>
                </div>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>
</body>
</html>