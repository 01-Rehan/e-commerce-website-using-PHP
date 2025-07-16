<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "sports_store_sem2");

$user_id = $_POST['user_id'];
$total_amount = $_POST['total_amount'];

// Insert into orders table
mysqli_query($connection, "INSERT INTO orders (user_id, total) VALUES ($user_id, $total_amount)");
$order_id = mysqli_insert_id($connection);

// Move cart items into order_items
$cartItems = mysqli_query($connection, "SELECT * FROM cart WHERE user_id = $user_id");

while ($item = mysqli_fetch_assoc($cartItems)) {
    $product_id = $item['product_id'];
    $quantity = $item['quantity'];
    mysqli_query($connection, "INSERT INTO order_items (order_id, product_id, quantity) VALUES ($order_id, $product_id, $quantity)");
}

// Clear the cart
mysqli_query($connection, "DELETE FROM cart WHERE user_id = $user_id");

echo "Order placed successfully! Order ID: $order_id";
?>
