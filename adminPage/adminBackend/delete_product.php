<?php

    session_start();

    if(!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "admin"){
        header("Location: ../index.php");
        exit();
    }

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $connection = mysqli_connect("localhost","root","","sports_store_sem2");

        if($connection){
            $deleteQuery = "DELETE FROM product WHERE id = $id";
            if(mysqli_query($connection,$deleteQuery)){
                header("Location: ../AdminPage.php");
                exit();
            } else {
            echo "Error deleting product: " . mysqli_error($conn);
            }
        }else {
            echo "Connection failed.";
        }
    } else {
        echo "Invalid request.";
    }
    
?>