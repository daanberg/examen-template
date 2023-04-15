<?php
    require_once "./backend/class/dbconfig.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/index.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
    <?php
        require_once './backend/partail/header.php';
        /*require_once './partail/footer.php'; */
    ?>

<body>
    <section class="flex-container">
        <div>
            <h1>Template</h1>
        </div>

        <div>
            <h2>LORUM</h2>
        </div>
        <div>
        <p>
            Lorem ipsum
        </p>
        </div>
    </section>

    <section class="flex-container">    
        <div>
            <p>
                <h2>LORUM</h2>
                    Lorem ipsum
        
            <p>
                <h2>LORUM</h2>
                Lorem ipsum
        </div>
    </section>


</body>
</html>