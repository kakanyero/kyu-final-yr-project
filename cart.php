<?php
        session_start();
        // Making sure that a user to add to cart, they have logged in
        if($_SESSION['auth'] != '201:loggedIn'){
            echo "<script> alert('Please first login to your account to add items to cart'); </script>";
            echo "<script>window.location.href='index.php'; </script>";
        }

        include('database/config.php');
        // Get cart items
        $cartQuery = "SELECT * FROM cart";
        $cartQuery_run = mysqli_query($conn, $cartQuery);
?>

<!DOCTYPE html>
<html lang="en">
<!-- =================================================================================== -->
<!--        about Page   -->
<!-- =================================================================================== -->

<head>
    <script src="https://kit.fontawesome.com/bcb2c05d90.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
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
                <li><a href="shop.php">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a  href="contact.html">Contact</a></li>
                <li id="lg-bag">
                    <a class="active" href="cart.php">Cart<i class="bi bi-cart-fill"></i></a>
                </li>
                <a href="#" id="close"><i class="bi bi-x-circle"></i></a>
            </ul>
        </nav>
        <div id="mobile">
            <a href="cart.php"><i class="bi bi-cart-fill"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </header>

    <!-- ===================== -->
    <!--    P-Header Section   -->
    <!-- ===================== -->
    <section id="page-header" class="about-header">
        <i style="color: white; font-size: 10rem" class="bi bi-cart"></i>
        <h2>Shopping is just fun</h2>
    </section>

    <!-- ===================== -->
    <!---     cart details    --->
    <!-- ===================== --> 
    <section id="cart" class="section-p1">
        <table width="100%" border>
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    
                    if(mysqli_num_rows($cartQuery_run) > 0){ 
                        $cartTotal = 0;
                        $numOfItems = 0;
                        while($cartItem = mysqli_fetch_assoc($cartQuery_run)){ 
                            $cartTotal = $cartTotal + $cartItem['totalCost'];
                            $numOfItems = $numOfItems + $cartItem['numberOfItems'];
                            
                            // Get image
                            $currentItemProductId = $cartItem['productId'];
                            // echo $currentItemProductId;
                            $stmt = "SELECT img FROM products WHERE productId = '$currentItemProductId' ";
                            $stmt_run = mysqli_query($conn, $stmt);
                            $productImage = mysqli_fetch_assoc($stmt_run)['img'];
                            // echo $productImage;
                                
                            ?>
                        
                        <tr>
                            <td>
                                
                            <a href="actions.php?dCartItemId=<?php echo $cartItem['cartItemId']; ?>" onclick="return confirm('Are you sure, you want to remove the item from cart?')"><i style="font-size: 2rem; color: red;" class="bi bi-x-circle"></i></a>
                            
                            
                            </td>


                            <td><span>
                                <img src="img/products/<?=$productImage; ?>">
                            </span></td>
                            <td><?=$cartItem['productName']; ?> </td>
                            <td>Ugx <?=$cartItem['productPrice']; ?></td>
                            <td>
                                <input type="number" id="currentItemCount" value="<?=$cartItem['numberOfItems']; ?>" style="font-size: 25px; margin: 0 10px;  border: 1px"></input> 
                            </td>
                            <td>Ugx <?=$cartItem['totalCost']; ?></td>
                        </tr>

                        
                <?php } }else{ echo "Your cart is empty"; } ?>
                <tr>
                    <td colspan=5 style="padding: 30px 10px; text-align:left"><span style="font-size: 20px; color: teal;"><b>Sub Total</b></span></td>
                    
                    <td><span style="font-size: 20px; color: teal;"><b>Ugx <?php echo $cartTotal; ?></b></span></td>
                </tr>
            </tbody>
        </table>
    </section>

    <!-- ===================== -->
    <!--     cart add details    -->
    <!-- ===================== -->
    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <!-- <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter Your Coupon">
                <button class="normal">Apply</button>
            </div> -->
        </div>
        <div id="subtotal">
            <h3>Summary</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>Ugx <?php echo $cartTotal; ?></td>
                </tr>
                <tr>
                    <td>Number of Items</td>
                    <td><?= $numOfItems; ?> items</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>Ugx <?=$cartTotal; ?></strong></td>
                </tr>
            </table>
            <form action="checkout/checkout.php" method="post">
                <input type="hidden" name="grandTotal" value="<?=$cartTotal; ?>">
                <!-- <input type="hidden" name="orderId" value=""> -->

                <button  id="checkout" type="submit" name="checkout" class="normal" onclick="window.location.href='checkout.html'" >Proceed to checkout</button>
            </form>
        </div>
    </section>

    <!-- ===================== -->
    <!-----    Footer    -------->
    <!-- ===================== -->
    <footer class="section-p1">
        <div class="col">
            <img src="img/logo.svg" alt="" class="logo" />
            <h4>Contact</h4>
            <p><strong>Adress:</strong> kampala, Uganda</p>
            <p><strong>Phone:</strong> +256 787188583</p>
            <p><strong>Hours:</strong> 8:00am -5:00pm, Mon-Fri</p>
            <div class="icon follow">
                <h4>Follow US</h4>
                <i class="bi bi-facebook"></i>
                <i class="bi bi-twitter"></i>
                <i class="bi bi-instagram"></i>
                <i class="bi bi-pinterest-p"></i>
                <i class="bi bi-youtube"></i>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="about.html">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="contact.html">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="sign up.html">Sign In</a>
            <a href="cart.php">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="cart.php">Track My Order</a>
            <a href="contact.html">Help</a>
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

<script src="cart.js"></script>
</body>

</html>