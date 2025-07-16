<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "sports_store_sem2");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSU Sports Equipment store </title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Martel+Sans:wght@200;300;400;600;700;800;900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="custom-navbar">
        <a href="./index.php" class="logo-con">
            <div class="logo">
            </div>
        </a>

        <div class="nav-options">
            <div class="nav-opt">
                <div class="opt"><a id="opt-f" href="./navigational_bar_options/about_us.php">About
                        Us</a></div>
                <div class="opt" id="dropdown"><a href="#" style="padding: 0px 5px;">Categories</a></div>

                <div class="cate-con">
                    <div class="categories">
                        <div class="cat-col">
                            <p class="custom-col col-head">CLOTHS</p>
                            <p class="custom-col">Tracksuit</p>
                            <p class="custom-col">T-shirts</p>
                            <p class="custom-col">Shorts</p>
                            <p class="custom-col">Sweatshirts</p>
                            <p class="custom-col">Jacket</p>
                            <p class="custom-col">Compression Clothing</p>
                            <p class="custom-col">Track Pants</p>
                        </div>
                        <div class="cat-col">
                            <p class="custom-col col-head">FITNESS</p>
                            <p class="custom-col">Cardio & Gym</p>
                            <p class="custom-col">GYM accessories</p>
                            <p class="custom-col">Strenght training</p>
                            <p class="custom-col">Aerobics & Agility</p>
                            <p class="custom-col">Abs & Core</p>
                            <p class="custom-col">Swimming</p>
                        </div>
                        <div class="cat-col">
                            <p class="custom-col col-head">RACKET SPORTS</p>
                            <p class="custom-col">Badminton</p>
                            <p class="custom-col">Tennis</p>
                            <p class="custom-col">Table tennis</p>
                            <p class="custom-col">Squash</p>
                        </div>
                        <div class="cat-col ">
                            <p class="custom-col col-head">TEAM SPORTS</p>
                            <p class="custom-col">Cricket</p>
                            <p class="custom-col">Football</p>
                            <p class="custom-col">Basketball</p>
                            <p class="custom-col">Kits</p>
                        </div>
                        <div class="cat-col ">
                            <p class="custom-col col-head">SHOES</p>
                            <p class="custom-col" style="font-weight: 700;">MEN
                                <a href="#">
                                    <ul>
                                        <li class="custom-col">Explore More..</li>
                                    </ul>
                                </a>
                            </p>
                            <p class="custom-col" style="font-weight: 700;">WOMEN
                                <a href="#">
                                    <ul>
                                        <li class="custom-col">Explore More..</li>
                                    </ul>
                                </a>
                            </p>
                            <p class="custom-col" style="font-weight: 700;">other
                                <a href="#">
                                    <ul>
                                        <li class="custom-col">Explore More..</li>
                                    </ul>
                                </a>
                            </p>

                        </div>

                    </div>
                </div>


                <div class="opt contact-us"><a href="#">Contact US</a></div>
                <div class="con-us-con">
                    <div class="con-us">
                        <div class="contact-dropdown-content">
                            <p><strong>Address:</strong> 123 College Sports Ave, City, State</p>
                            <p><strong>Phone:</strong> +123-456-7890</p>
                            <p><strong>Email:</strong> support@sportsstore.com</p>
                        </div>
                        <div class="footer-section contact-us-social">
                            <h3>Follow Us</h3>
                            <a href="https://www.instagram.com/01x_rehan/?__pwa=1"><img src="./pictures/other sec picures/footer_facebook.png" alt="Facebook"></a>
                            <a href="https://www.instagram.com/01x_rehan/?__pwa=1"><img src="./pictures/other sec picures/footer_insta.png" alt="Instagram"></a>
                            <a href="https://www.instagram.com/01x_rehan/?__pwa=1"><img src="./pictures/other sec picures/footer_x.png" alt="Twitter"></a>
                        </div>
                    </div>
                </div>

                <form action="./PHP/searchItem.php" method="post">
                    <div class="search-icon-con">
                        <div class="search-icon">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <input type="text" class="search-bar" placeholder="search" name="search-keyword">
                    </div>
                </form>

                <div class="icon-con">
                    <div class="opt-icon cart-icon mobile-opt">
                        <a href="#" class="opt-icon-a ">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                    <div class="cart-con">
                        <div class="cart">
                            <h1>Cart</h1>
                            <div class="cart-items-outer-con">
                                <?php
                                if(isset($_SESSION["user_id"])){
                                    $userID = $_SESSION["user_id"];
                                    $Cartquery = "SELECT * FROM cart WHERE user_id = $userID ";
                                    $cartResult = mysqli_query($conn,$Cartquery);
                                        if(mysqli_num_rows($cartResult) > 0){
                                            while($cartrow = mysqli_fetch_assoc($cartResult)){
                                                $cartListItemId = $cartrow["product_id"];
                                                $fetchingItemNameviaIDQuery = "SELECT * FROM product WHERE id = $cartListItemId";
                                                $cartItemresult = mysqli_query($conn,$fetchingItemNameviaIDQuery);
                                                while($CartItem = mysqli_fetch_assoc($cartItemresult)){
                                                    echo '
                                                            <div class="cart-items-con">
                                                                    <div class="cart-items">
                                                                    <div class="cart-item-img">
                                                                    <img src="./pictures/shoping_sec/'.$CartItem["image"].'" width="100%" height="100%"  alt="">
                                                                    </div>
                                                                    <div class="cart-item-heading">
                                                                        <p>'.$CartItem["name"].'</p>
                                                                        <p>₹'.$CartItem["price"].' X '.$cartrow["quantity"].'</p>
                                                                    </div>
                                                                                                        
                                                                    </div>
                                                                </div>
                                                        ';
                                                }
                                            }

                                    } 
                                    if(mysqli_num_rows($cartResult) > 0){
                                     echo '                                   
                                     <div class="reset-cart" onclick="resetCart();">
                                         <button style="background:transparent;border:none;" class="reset-btn" >Reset Cart</button>
                                     </div>
                                     <form action="./PHP/Chechkout.php" method="post">
                                         <div class="reset-cart checkout" >
                                             <button class="reset-btn" class="add-to-cart-text" style="background:transparent;border:none;">Check Out</button>
                                         </div>
                                     </form>';
                                    }
                                }else{
                                    echo "Register / Login First";
                                }
                             ?>
                            </div>
                        </div>
                    </div>

                    <div class="opt-icon user-icon mobile-opt">
                        <a href="./navigational_bar_options/Registerhtml.php" class="opt-icon-a">
                            <i class="fa-solid fa-circle-user"></i>
                        </a>
                    </div>
                </div>
                <div class="user">
                    <?php
                        error_reporting(0);
                        
                        if (isset($_SESSION["user_id"])) {
                            echo "Hello, ". $_SESSION["user_name"];
                            if (!empty($_SESSION["show_welcome"])) {
                                 echo "<script>alert('Welcome back ".$_SESSION["user_name"].".');</script>";
                                unset($_SESSION["show_welcome"]);
                            }
                        }else{
                            echo "<span style=\"width:max-content;\">Register pls</span>";
                        }
                        
                    ?>
                </div>
            </div>
        </div>
    </div>


    <div class="hero-sec">
        <div class="hero-heading">
            <h1>Your Game, Your Gear, Your Store.</h1>
        </div>
        <img src="./pictures/pngwing.com.png" alt="">
        <div class="hero-sub-head">
            <p>Get game-day ready with the best college sports gear! From jerseys to accessories, show your school
                spirit in style. Shop now and represent your team with pride!</p>
        </div>
    </div>


    <div class="sub-hero-con">
        <div class="sub-hero">
            <div class="sub-hero-box">
                <a href="#" class="sub-hero-img">
                    <img src="./pictures/Small_Banner_1_320_220.png" alt="">
                    <span class="hero-text-con">
                        <div class="sub-hero-box-head">
                            <span class="sub-hero-head">Hoops in Action</span>
                        </div>
                        <div class="sub-hero-box-head-in">
                            <span class="sub-hero-head-in">basketball</span>
                        </div>
                    </span>
                </a>
            </div>
            <div class="sub-hero-box">
                <a href="#" class="sub-hero-img">
                    <img src="./pictures/Small_Banner_2_320_220.png" alt="">
                    <span class="hero-text-con">
                        <div class="sub-hero-box-head">
                            <span class="sub-hero-head">Spin to </span>
                        </div>
                        <div class="sub-hero-box-head">
                            <span class="sub-hero-head">Win the game</span>
                        </div>
                        <div class="sub-hero-box-head-in">
                            <span class="sub-hero-head-in">Table tennis</span>
                        </div>
                    </span>
                </a>
            </div>
            <div class="sub-hero-box">
                <a href="#" class="sub-hero-img">
                    <img src="./pictures/small_banner_5_320_220.png" alt="">
                    <span class="hero-text-con">
                        <div class="sub-hero-box-head">
                            <span class="sub-hero-head">Bat </span>
                        </div>
                        <div class="sub-hero-box-head">
                            <span class="sub-hero-head">Bowl </span>
                        </div>
                        <div class="sub-hero-box-head">
                            <span class="sub-hero-head">Conquer</span>
                        </div>
                        <div class="sub-hero-box-head-in">
                            <span class="sub-hero-head-in">Cricket</span>
                        </div>
                    </span>
                </a>
            </div>
            <div class="sub-hero-box">
                <a href="#" class="sub-hero-img">
                    <img src="./pictures/Small_Banner_4_320_220.png" alt="">
                    <span class="hero-text-con">
                        <div class="sub-hero-box-head">
                            <span class="sub-hero-head">In All fashion</span>
                        </div>
                        <div class="sub-hero-box-head-in">
                            <span class="sub-hero-head-in">Cloths</span>
                        </div>
                    </span>
                </a>
            </div>
            <div class="sub-hero-box">
                <a href="#" class="sub-hero-img">
                    <img src="./pictures/Small_Banner3_320_220.png" alt="">
                    <span class="hero-text-con">
                        <div class="sub-hero-box-head">
                            <span class="sub-hero-head">Master the Game </span>
                        </div>
                        <div class="sub-hero-box-head-in">
                            <span class="sub-hero-head-in">with Precision & Power!</span>
                        </div>
                    </span>
                </a>
            </div>
        </div>
    </div>


    <div class="shop-sec-heading">
        Featured Products
    </div>

    <div class="shop-sec">
        <?php
$query = "SELECT * FROM product LIMIT 12";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result) ) {
  echo '
  
        <div class="box">
            <div class="box-content">
                <a href="./otherPages/productDetailes.php?id='.$row['id'] . '">
                    <div class="shop-sec-box-head">
                        <span class="shop-sec-box-text">'. $row["name"] .'</span>
                    </div>
                    <div class="box-img">
                        <img src="./pictures/shoping_sec/'. $row["image"] .'">
                        <div class="item-price-name-con">
                            <div class="item-det-price">
                            ₹'. $row["price"] .'
                            <br>
                            '. $row["name"] .'
                            </div>
                        </div>
                    </div>
                    <div class="shop-sec-box-head-2" >
                        <span class=" shop-sec-box-text-2">Know More..</span>
                    </div>
                </a>
            </div>
        </div>
  ';
}
?>

    </div>

    <div class="all-product">
        <a href="./otherPages/all_product.php">View All Products list</a>
    </div>


    <div class="footer-logo">
        <div class="footer-logo-box">
            <img src="./pictures/LOGO.jpg" style="scale: 1.3; margin-left: 20px; " alt="">
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>Your one-stop shop for all sports merchandise. Quality gear at the best prices!</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: support@sportsstore.com</p>
                <p>Phone: +1 234 567 890</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <a href="#"><img src="./pictures/other sec picures/footer_facebook.png" alt="Facebook"></a>
                <a href="#"><img src="./pictures/other sec picures/footer_x.png" alt="Twitter"></a>
                <a href="#"><img src="./pictures/other sec picures/footer_insta.png" alt="Instagram"></a>
            </div>
        </div>
        <p class="footer-bottom">&copy; 2025 DSU Sports Store. <br> All Rights Reserved.</p>
    </footer>
    <script>
function resetCart() {
    fetch('PHP/resetCart.php', {
            method: 'POST'
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "success") {
                document.querySelector('.cart-items-outer-con').innerHTML = '';
                alert('Cart reset!');
            } else {
                alert('Please log in to reset your cart.');
            }
        });
}
</script>

</body>
</html>