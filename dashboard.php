<?php
    session_start();
    include("database/config.php");

    // Featured products
    $query = "SELECT* FROM products LIMIT 8";
    $query_run = mysqli_query($conn, $query);

    // New Arrivals
    $arrival_time_query = "SELECT* FROM products WHERE arrival_time = 'New' LIMIT 4";
    $arrival_time_query_run = mysqli_query($conn, $arrival_time_query);
?>

<!DOCTYPE html>
<html lang="en">
<!-- =================================================================================== -->
<!--        Home Page   -->
<!-- =================================================================================== -->

<head>
    <script src="https://kit.fontawesome.com/bcb2c05d90.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fine spinners Uganda Limitted</title>
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/all.min.css" /> -->
    <!-- Css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom_styles.css">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="css/bootstrap-icons/bootstrap-icons.css">
    
</head>

<body>
    <header>
        <a href="index.html" class="logo"><img src="img/logo.svg" alt="" class="logo"></a>
        <nav>
            <ul id="navbar">
                <li><a href="dashboard.php" class="active">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li id="lg-bag"><a href="cart.php">Cart<i class="bi bi-cart-fill"></i></a></li>
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            </ul>
        </nav>
        <div id="mobile">
            <a href="cart.php"><i class="fa fa-bag-shopping"></i></a>
            <i id="bar" class="fas fa-outdent"></i>

        </div>
    </header>

    <!-- ===================== -->
    <!--    Hero Section   -->
    <!-- ===================== -->

    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button onclick="window.location.href='shop.php'">Shop Now</button>
    </section>
    <!-- ===================== -->
    <!--    Features Section   -->
    <!-- ===================== -->
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>xHappy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>F24/7 Support</h6>
        </div>
    </section>
    <!-- ===================== -->
    <!--    Products Section Start   -->
    <!-- ===================== -->
    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p class="heading">Summer Collection New Modern Design</p>
        <div class="pro-container">

            <!-- Fetching all products from database -->
            <?php while($products = mysqli_fetch_assoc($query_run)){ ?>
            <div class="pro" onclick="window.location.href='sproduct.php?productId=<?=$products['productId']; ?> ';">
                <img src=" img/products/<?=$products['img']; ?>" alt="">
                <div class="des">
                    <span> <?=$products['productLabel']; ?> </span>
                    <h5 id="productName"><?=$products['productName']; ?></h5>
                    <div class="star">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <h4>$ <?=$products['productPrice']; ?></h4>
                    <a href="#"><i class="fa-solid bi bi-cart-fill cart"></i></a>
                </div>
            </div>
            <?php } ?>


        </div>
    </section>
    <!-- ===================== -->
    <!--    Products Section End -->
    <!-- ===================== -->
    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% off</span> - All T-shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>
    <!-- ===================== -->
    <!--    New Arrivals   -->
    <!-- ===================== -->
    <section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p class="heading">Summer Collection New Modern Design</p>
        <div class="pro-container">
            
                <!-- Fetching new arrivals from database -->
            <?php while($newProducts = mysqli_fetch_assoc($arrival_time_query_run)){ ?>
            <div class="pro" onclick="window.location.href='sproduct.html';">
                <img src=" img/products/<?=$newProducts['img']; ?>" alt="">
                <div class="des">
                    <span> <?=$newProducts['productLabel']; ?> </span>
                    <h5 id="productName"><?=$newProducts['productName']; ?></h5>
                    <div class="star">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <h4>$ <?=$newProducts['productPrice']; ?></h4>
                    <a href="#"><i class="fa-solid bi bi-cart-fill cart"></i></a>
                </div>
            </div>
            <?php } ?>


        </div>
    </section>
    <!-- ===================== -->
    <!--    Banner 2   -->
    <!-- ===================== -->
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <div class="overlay"></div>
            <div class="banner-content content">
                <h4>Crazy Deals</h4>
                <h2>Buy 1 Get 1 Free</h2>
                <span>The best classic dress is on sale at cara</span>
                <button class="white">Learn More</button>
            </div>
        </div>
        <div class="banner-box">
            <div class="overlay"></div>
            <div class="banner-content content">
                <h4>Spring/Summer </h4>
                <h2>Upcoming Season</h2>
                <span>The best classic dress is on sale at cara</span>
                <button class="white">Collection</button>
            </div>
        </div>
    </section>
    <section id="banner3" class="section-p1">
        <div class="banner-box">
            <div class="overlay"></div>
            <div class="content">
                <h2> Seasonal Sale</h2>
                <h3>Winter Collection 50% Off</h3>
            </div>

        </div>
        <div class="banner-box">
            <div class="overlay"></div>
            <div class="content">
                <h2> Elegant Collection</h2>
                <h3>Elegant collection with special prices</h3>
            </div>
        </div>
        <div class="banner-box">
            <div class="overlay"></div>
            <div class="content">
                <h2>New Women Collection</h2>
                <h3>New Summer Collection For Women </h3>
            </div>
        </div>
    </section>
    <!-- ===================== -->
    <!--   Newsletter    -->
    <!-- ===================== -->
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email adress">
            <button class="normal">Sign Up</button>
        </div>
    </section>
    <!-- ===================== -->
    <!-----       Footer -------->
    <!-- ===================== -->
    <footer class="section-p1">
        <div class="col">
            <img src="img/logo.svg" alt="" class="logo">
            <h4>Contact</h4>
            <p><Strong>Adress:</Strong> Kampala, Uganda </p>
            <p><Strong>Phone:</Strong> +256 787188583 </p>
            <p><Strong>Hours:</Strong> 8:00am -5:00pm, mon -Fri </p>
            <div class="icon follow">
                <h4>Follow US</h4>
                <i class="fab fa-facebook-f" href=""></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="about.html">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="mailto:kakanyer142@gmail.com">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="login.html">Sign In</a>
            <a href="cart.html">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="img/pay/pay.png" alt="">
        </div>
        <div class="copyright">
            <p>&copy; 2024, Fine spinners Uganda Limitted </p>
        </div>
    </footer>
    <!-- ============================================================================================================ -->
    <script src="script.js"></script>
    <script src="edits.js"></script>
</body>

</html>