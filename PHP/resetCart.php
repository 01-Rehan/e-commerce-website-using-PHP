<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "sports_store_sem2");

if(isset($_SESSION["user_id"])){
    $userID = $_SESSION["user_id"];
    $query = "DELETE FROM cart WHERE user_id = $userID";
    if(mysqli_query($conn, $query)){
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "not_logged_in";
}
?>