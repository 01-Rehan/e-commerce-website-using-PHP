<?php

session_start();

$email = $_POST["email"];
$name = $_POST["name"];
$password = $_POST["password"];

$connection = mysqli_connect("localhost", "root", "", "sports_store_sem2");

if ($connection) {

    $check_query = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["already_registerd"] = true;
        header("Location: ../navigational_bar_options/Registerhtml.php");
        exit();
    } else if($name != NULL && $email != NULL && $password != NULL){
        $query = "INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES (NULL, '$name', '$email', '$password', 'user') ";
        $result = mysqli_query($connection, $query);
        if($result){
            $_SESSION["user_id"] = mysqli_insert_id($connection);
            $_SESSION["user_name"] = $name;
            $_SESSION["user_email"] = $email;
            header("Location: ../index.php");
            exit();
        } else {
            echo "Registeration failed";
        }
    }else{
        echo "Fill the Details First";
    }
} else {
    echo "connection Failed";
}


?>