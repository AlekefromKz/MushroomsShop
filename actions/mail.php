<?php

session_start();
require_once "../db/db.php";

if(isset($_POST['order'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $connect->query("INSERT INTO orders(username, email, phone) VALUES ('$username', '$email', '$phone')");

    $lastID = $connect->query("SELECT MAX(id) FROM `orders` WHERE email = '$email'") -> fetch(PDO::FETCH_ASSOC);
    $lastID = $lastID['MAX(id)'];

    $message = "<h2>Hello, your order $lastID is successfully accepted</h2>";
    $message .= "<h2>Your order:</h2>";

    foreach ($_SESSION['cart'] as  $product){
        $message .= "<div>{$product['quantity']} {$product['rus_name']}</div>";
    }

    $message .= "<p>Total price: {$_SESSION['totalPrice']}$</p>";

    $headers[] = 'MIME-Version: 1.0';
    $headers[] .= 'Content-type: text/html; charset=iso-8859-1';

    $subject = "Your order $lastID is successfully accepted";

    //mail($email, $subject, $message, $headers);

    unset($_SESSION['totalPrice']);
    unset($_SESSION['totalQuantity']);
    unset($_SESSION['cart']);

    $_SESSION['order'] = $lastID;
}

header("Location: {$_SERVER[HTTP_REFERER]}");