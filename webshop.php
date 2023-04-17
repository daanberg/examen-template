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

       

        <div class="row mt-5">
        <?php foreach($shop->getAllProducts() as $s) { ?>
            <div class="col-sm-3">
                <div class="card">
                <div style="350px"><img class="card-img-top"  src="<?php echo $s->Img_URL ?>" alt="Card image cap" ></div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $s->Title ?></h5>
                    <p class="card-text"><?php echo $s->Description ?> </p>
                    <a class="btn btn-primary text-white text-decoration-none w-50" href="productPage.php?product=<?= $s->ID ?>"><img src="img/cart.svg" class="text-white mr-5"  alt="">Buy Now</a>
                </div>
                </div>
            </div>
            <?php } ?>
        </div>

     
    </div>
</body>
</html>