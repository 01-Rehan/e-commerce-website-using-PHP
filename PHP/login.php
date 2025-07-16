
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    body {
        display: flex;
        background: url("D:/its my/img1.png") no-repeat;
        background-position: 100px;
        background-size: auto;

        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f4f4f4;
        background-image: url(../pictures/Sport.jpeg);
        background-size: cover;
        background-position: center;
    }

    .container {
        width: 400px;
        padding: 40px;
        background-color: green;
        border-radius: 8px;
        color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur 10 px;
    }

    h1 {
        text-align: center;
        text-transform: uppercase;
        font-size: 2em;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 1.1em;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        font-size: 1.2em;
        border-radius: 4px;
        border: 1px solid #ddd;
        background-color: transparent;
        color: white;
    }

    .form-group input[type="checkbox"] {
        width: auto;
        margin-right: 10px;
    }

    .form-group a {
        color: #fff;
        text-decoration: none;
    }

    .form-group a:hover {
        text-decoration: underline;
    }

    .button-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .button-container input {
        padding: 10px 20px;
        font-size: 1.2em;
        background-color: white;
        color: green;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .button-container input:hover {
        background-color: #ddd;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Enter your email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Enter your password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <a href="#">Forgot password...?</a>
            </div>
            <div class="form-group">
                <span>Don't Have an account?</span><br>
                <a href="../navigational_bar_options/Registerhtml.php" style="color:grey;">Click Here to Login</a>
            </div>
            
            <div class="button-container">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>
</html>
<?php
    session_start();

    $connection = mysqli_connect("localhost", "root", "", "sports_store_sem2");
    if($connection && $_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT id, name, password, role FROM users WHERE email = '$email'";
        $result = mysqli_query($connection,$query);

        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if($password == $row['password']){
                $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["name"];
            $_SESSION["user_email"] = $email;
            $_SESSION["user_role"] = $row["role"];
            if($_SESSION["user_role"] == "admin"){
                header("Location: ../adminPage/AdminPage.php");
                exit();
            }else if($_SESSION["user_role"] == "user"){
                $_SESSION["show_welcome"] = true;
                header("Location: ../index.php");
                exit();
            }
            }else{
                echo "<script> alert('Incorrect Password.'); </script>";
            }
        }else{
            echo "<script> alert('User Not Found.'); </script>";            
        }

    }


?>