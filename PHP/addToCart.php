<?php

    session_start();

    $connection = mysqli_connect("localhost","root","","sports_store_sem2");
    $id = $_POST["item_id"];
if($connection && isset($_SESSION["user_id"])){
    $quantity = $_POST["item_quantity"];
    $userid = $_SESSION["user_id"];

    $checkQuery = "SELECT * FROM cart WHERE user_id = $userid AND product_id = $id AND quantity != $quantity";
    $checkResult = mysqli_query($connection, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    
    $row = mysqli_fetch_assoc($checkResult);
    $new_quantity = $row['quantity'] + $quantity;
    $cart_id = $row['id'];

    $updateQuery = "UPDATE cart SET quantity = $new_quantity WHERE id = $cart_id";
    mysqli_query($connection, $updateQuery);

    echo "Quantity updated.";
} else {
   
    $insertQuery = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($userid, $id, $quantity)";
    mysqli_query($connection, $insertQuery);

    header("Location: ../otherPages/productDetailes.php?id=".$id);
    exit();
}
    }else{
        $_SESSION["login_first"] = true;
        header("Location: ../otherPages/productDetailes.php?id=".$id);
        exit();
    }


?>