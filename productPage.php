<?php 
require_once 'partial/header.php';
require_once 'backend/class/Shop.php';

$shop = new Shop();

$s = $shop->getProduct($_GET['product']);

?>

<div class="container mt-5">

 <!-- Product section-->
 <section class="py-5">
    
            <div class="container px-4 px-lg-5 my-3">
            <button class="btn btn-outline-dark flex-shrink-0 mb-2"><a href="webshop.php" class="text-decoration-none nav-link"> Go back</a> </button>
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo $s->Img_URL ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"> <?php echo $s->Title ?></h1>
                        <div class="fs-5 mb-5">
                            <span>€ <?php echo $s->Price ?></span>
                        </div>
                        <p class="lead"><?php echo $s->Description ?></p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <img src="img/cart.svg" alt="">
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <h1></h1>
</div>