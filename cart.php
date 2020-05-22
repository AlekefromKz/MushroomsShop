<?php
require_once "html-parts/header.php";

if (isset($_SESSION['order'])){ ?>
    <h2 class="cart-title">Your order  #<?php echo $_SESSION['order'];?> is successfully accepted</h2>
    <a href="index.php" class="back">Перейти на главную</a>
<?php }

else if(count($_SESSION['cart']) == 0){ ?>

    <h2 class="cart-title">Ваша корзина пуста</h2>
    <a href="index.php" class="back">Перейти на главную</a>

<?php } else{

    foreach ($_SESSION['cart'] as $key => $product){
?>
        <div class="cart">
            <a href="product.php?product=<?php echo $product['title'];?>"><img src="img/<?php echo $product['img']; ?>" alt="<?php echo $product['rus_name']; ?>>"></a>
            <div class="cart-descr">
                <?php echo $product['rus_name']; ?> в количестве <?php echo $product['quantity']; ?> шт на сумму <?php echo $product['quantity'] * $product['price'];; ?> рублей
            </div>
            <form action="actions/delete.php" method="post">
                <input type="hidden" name="delete" value="<?php echo $key;?>">
                <input type="submit" value="Удалить">
            </form>
        </div>



    <?php } ?>
    <hr>
    <form action="actions/mail.php" method="post" class="order">
        <input type="text" name="username" required placeholder="Ваше имя">
        <input type="text" name="phone" required placeholder="Ваш телефон">
        <input type="text" name="email" required placeholder="Ваш Email">
        <input type="submit" name="order" value="Отправить заказ">
    </form>
    <?php } ?>

</body>
</html>

