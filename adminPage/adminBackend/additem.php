<?php

    $connection = mysqli_connect("localhost", "root", "", "sports_store_sem2");

    if($connection && $_SERVER["REQUEST_METHOD"] == "POST"){

        $itemName = $_POST["name"];
        $itemPrice = $_POST["price"]; 
        $description = $_POST["description"]; 
        $category = $_POST["category"]; 
        $image = $_POST["image"]; 

        $escapedDescription = mysqli_real_escape_string($connection, $description);

        $query = "INSERT INTO `product`(`id`, `name`, `price`, `description`, `image`, `category`) VALUES (NULL,'$itemName',$itemPrice,'$escapedDescription','$image','$category')";
        $result = mysqli_query($connection,$query);

        if($result){
            header("Location: ../AdminPage.php");
        }else{
            echo "error";
        }
    }
?>