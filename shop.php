<?php
    include("database/config.php");

    // Featured products
    $productsQuery = "SELECT * FROM products";
    $productsQuery_run = mysqli_query($conn, $productsQuery);
?>

<!DOCTYPE html>
<html lang="en">
<!-- =================================================================================== -->
<!--        Home Page   -->
<!-- =================================================================================== -->

<head>
  <script src="https://kit.fontawesome.com/bcb2c05d90.js" crossorigin="anonymous"></script>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fine spinners Uganda Limitted</title>
  <!-- Font Awesome Library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <!-- <link rel="stylesheet" href="css/all.min.css" /> -->
  <!-- Css -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- bootstrap icons -->
  <link rel="stylesheet" href="css/bootstrap-icons/bootstrap-icons.css">
</head>

<body>
  <header>
    <a href="index.html" class="logo"><img src="img/logo.svg" alt="" class="logo" /></a>
    <nav>
      <ul id="navbar">
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="shop.php" class="active">Shop</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li id="lg-bag">
          <a href="cart.php"><i class="bi bi-cart-fill"></i></a>
        </li>
        <a href="#" id="close"><i class="bi bi-x-circle"></i></a>
      </ul>
    </nav>
    <div id="mobile">
      <a href="cart.php"><i class="bi bi-cart-fill"></i></a>
      <i id="bar" class="bi bi-x-circle"></i>
    </div>
  </header>

  <!-- ===================== -->
  <!--    P-Header Section   -->
  <!-- ===================== -->

  <section id="page-header">
    <h2>Shop From Home</h2>

    <p>Save more with coupons & up to 70% off!</p>
  </section>

  <!-- ===================== -->
  <!--    Products Section   -->
  <!-- ===================== -->
  <section id="product1" class="section-p1">
    <div class="pro-container">
      <?php while($products = mysqli_fetch_assoc($productsQuery_run)){ ?>
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
  <!--    Paginition Section   -->
  <!-- ===================== -->
  <section id="paginition" class="section-p1">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="bi bi-arrow-right"></i></a>
  </section>
  <!-- ===================== -->
  <!--   Newsletter    -->
  <!-- ===================== -->
  <section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
      <h4>Sign Up For Newsletters</h4>
      <p>
        Get E-mail updates about our latest shop and
        <span>special offers.</span>
      </p>
    </div>
    <div class="form">
      <input type="text" placeholder="Your email adress" />
      <button class="normal">Sign Up</button>
    </div>
  </section>

  <!-- ===================== -->
  <!-----       Footer -------->
  <!-- ===================== -->
  <footer class="section-p1">
    <div class="col">
      <img src="img/logo.svg" alt="" class="logo" />
      <h4>Contact</h4>
      <p><strong>Adress:</strong> Ismailia,Egypt</p>
      <p><strong>Phone:</strong> 0101010101010</p>
      <p><strong>Hours:</strong> 10:00am -11:00pm, Sat -Thu</p>
      <div class="icon follow">
        <h4>Follow US</h4>
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-pinterest-p"></i>
        <i class="fab fa-youtube"></i>
      </div>
    </div>
    <div class="col">
      <h4>About</h4>
      <a href="#">About Us</a>
      <a href="#">Delivery Information</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Terms & Conditions</a>
      <a href="#">Contact Us</a>
    </div>
    <div class="col">
      <h4>My Account</h4>
      <a href="#">Sign In</a>
      <a href="#">View Cart</a>
      <a href="#">My Wishlist</a>
      <a href="#">Track My Order</a>
      <a href="#">Help</a>
    </div>
    <div class="col install">
      <h4>Install App</h4>
      <p>From App Store or Google Play</p>
      <div class="row">
        <img src="img/pay/app.jpg" alt="" />
        <img src="img/pay/play.jpg" alt="" />
      </div>
      <p>Secured Payment Gateways</p>
      <img src="img/pay/pay.png" alt="" />
    </div>
    <div class="copyright">
      <p>&copy; 2024, Fine spinners Uganda Limitted</p>
    </div>
  </footer>
  <!-- ============================================================================================================ -->
  <!-- <script src="script.js"></script> -->
</body>

</html>