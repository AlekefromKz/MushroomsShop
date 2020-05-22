<?php
    require_once "html-parts/header.php";

    if(!isset($_GET['cat'])) {
        $products = $connect->query("SELECT * FROM products") ->fetchAll(PDO::FETCH_ASSOC);;
    }else if($_GET['cat'] != 'edible' && $_GET['cat'] != 'poisonous'){
            echo "No such group";
            header('Location:index.php');
    }else{
        $cat = $_GET['cat'];
        $products = $connect->query("SELECT * FROM products WHERE cat = '$cat'") ->fetchAll(PDO::FETCH_ASSOC);;
    }


?>


<div class="main">
        <?php foreach ($products as $product) { ?>
        <div class="card">
            <a href="product.php?product=<?php echo $product['title'];?>">
               <img src="img/<?php echo $product['img'];?>" alt="<?php echo $product['rus_name'];?>">
            </a>
            <div class="label"><?php echo $product['rus_name'];?> (<?php echo $product['price'];?> рублей)</div>
            <?php require "html-parts/add-to-cart.php"?>
        </div>
        <?php } ?>
    </div>

</body>
</html>

