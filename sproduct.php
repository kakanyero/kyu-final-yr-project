<?php 
  session_start();
  // Including connection to the database file
  include("database/config.php");
  // Get product Id from the browser
  $selectedProductId = $_GET['productId'];

  // Test if the id is captured when an item is selected

  // if(empty($selectedProductId)){
  //   echo "Empty Id";
  // }else{
  //   echo "selected Id is: ". $selectedProductId;
  // }

  // Get selected item details
  $selected_item_query = "SELECT * FROM products WHERE productId = '$selectedProductId' limit 1 ";
  $selected_item_query_run = mysqli_query($conn, $selected_item_query);
  $selected_product = mysqli_fetch_array($selected_item_query_run);

  // Featured products
  $ft_query = "SELECT* FROM products LIMIT 4";
  $ft_query_run = mysqli_query($conn, $ft_query);

?>



<!DOCTYPE html>
<html lang="en">
<!-- =================================================================================== -->
<!--        Home Page   -->
<!-- =================================================================================== -->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-Commerce</title>
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
          <a href="cart.php"><i class="bi bi-cart"></i></a>
        </li>
        <a href="#" id="close"><i class="bi bi-x-circle-fill"></i></a>
      </ul>
    </nav>
    <div id="mobile">
      <a href="cart.html"><i class="fa fa-bag-shopping"></i></a>
      <i id="bar" class="fas fa-outdent"></i>
    </div>
  </header>

  <!-- ===================== -->
  <!--   Prodetails Section    -->
  <!-- ===================== -->
  <section id="prodetails" class="section-p1">
    <div class="single-pro-image">
      <img src="img/products/<?=$selected_product['img']; ?> " width="100%" id="MainImg" alt="" />

      <div class="small-img-group">
        <div class="small-img-col">
          <img src="img/products/<?=$selected_product['img']; ?>" width="100%" class="small-img" alt="" />
        </div>
        <div class="small-img-col">
          <img src="img/products/look1-<?=$selected_product['img']; ?>" width="100%" class="small-img" alt="" />
        </div>
        <div class="small-img-col">
          <img src="img/products/f3.jpg" width="100%" class="small-img" alt="" />
        </div>
        <div class="small-img-col">
          <img src="img/products/f4.jpg" width="100%" class="small-img" alt="" />
        </div>
      </div>
    </div>

    <div class="single-pro-details">
      <h6>Home / Shirt</h6>
      <h4><?=$selected_product['productName']; ?> </h4>
      <h2>$ <?=$selected_product['productPrice']; ?> </h2>
      <form action="addToCart.php" method="POST">

        <!-- Hidden inputs for other item details -->
        <input type="hidden" name="productId" value="<?=$selected_product['productId']; ?>">
        <input type="hidden" name="productName" value="<?=$selected_product['productName']; ?>">
        <input type="hidden" name="productPrice" value="<?=$selected_product['productPrice']; ?>">
        
        <select name="selectedSize" required>
          <option value="">Select Size</option>
          <option value="Small">Small</option>
          <option value="Medium">Medium</option>
          <option value="Large">Large</option>
          <option value="XL">XL</option>
          <option value="XXL">XXL</option>
        </select>
        <input type="number" value="1" name="numberOfItem" />
        <button  type="submit" name="submit" class="normal"><i class="bi bi-cart" style="margin-right: 10px"></i>Add To cart</button>
      </form>
      <h4>Product Details</h4>
      <span><?=$selected_product['productDetails']; ?></span>
    </div>
  </section>

  <section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p class="heading">Summer Collection New Modern Design</p>
    <div class="pro-container">


          <?php while($product = mysqli_fetch_assoc($ft_query_run)){ ?>
            <div class="pro" onclick="window.location.href='sproduct.php?productId=<?=$product['productId']; ?> ';">
                <img src=" img/products/<?=$product['img']; ?>" alt="">
                <div class="des">
                    <span> <?=$product['productLabel']; ?> </span>
                    <h5 id="productName"><?=$product['productName']; ?></h5>
                    <div class="star">
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star-half"></i>
                    </div>
                    <h4>$ <?=$product['productPrice']; ?></h4>
                    <a href="#"><i class="bi bi-cart"></i></a>
                </div>
            </div>
          <?php } ?>


    </div>
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
      <p>&copy; 2022, Web Development Project - Group18</p>
    </div>
  </footer>

  <!-- ===================== -->
  <!-----     Replacing images  -------->
  <!-- ===================== -->

  <script>
    var MainImg = document.getElementById("MainImg");
    var smallimg = document.getElementsByClassName("small-img");

    smallimg[0].onclick = function () {
      MainImg.src = smallimg[0].src;
    };
    smallimg[1].onclick = function () {
      MainImg.src = smallimg[1].src;
    };

    smallimg[2].onclick = function () {
      MainImg.src = smallimg[2].src;
    };

    smallimg[3].onclick = function () {
      MainImg.src = smallimg[3].src;
    };
  </script>
  <!-- ============================================================================================================ -->
  <script src="script.js"></script>
</body>

</html>