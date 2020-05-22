<?php
    require_once "html-parts/header.php";

    if(isset($_GET['product'])){
        $title = $_GET['product'];
        $product = $connect->query("SELECT * FROM products WHERE title = '$title'");
        $product = $product->fetch(PDO::FETCH_ASSOC);
        if(!$product){
            header("Location:index.php");
        }
    }

    require_once "html-parts/header.php";

?>


<div class="product-card">
    <a href="index.php">Вернуться на главную</a>

    <h2><?php echo $product['rus_name'];?> (<?php echo $product['price'];?>)</h2>
    <div class="descr"><?php echo $product['descr'];?></div>
    <img width="300" src="img/<?php echo $product['img'];?>" alt="<?php echo $product['rus_name'];?>">
    <?php require_once "html-parts/add-to-cart.php"?>
</div>
