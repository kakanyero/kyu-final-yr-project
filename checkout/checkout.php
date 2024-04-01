<?php

    session_start();
    include('../database/config.php');

    // if(!isset($_SESSION['auth'])){
    //     echo "<script>alert('Please first login for security reasons');</script>";
    //     echo "<script>window.location.href='../login.php';</script>";
    // }

    if(isset($_POST['checkout'])){
        $currTotal = $_POST['grandTotal'];

        // Generate the orderId for each order
        function generateOrderId($timeZone)
        {
            // Set the timezone to "Africa/Nairobi"
            date_default_timezone_set($timeZone);

            // Get the current date and time in the specified timezone
            $yr = date('y');
            $currentMonthDateTime = date('mdHis');

            /**
             * order id in format "#ODR + Year + currentMonth, Date, time(hour, minute and second)"
             * Eg. #ODR_231212083555
             */

            $applicant_reg_no = "#ODR"."_".$yr.$currentMonthDateTime;
            // echo  $orderId;
            return $applicant_reg_no;
        }

        $orderId = generateOrderId('Africa/Nairobi');       // Order id
        $tax = 9.3/100 * $currTotal;                        // Tax
        $shippingFee = 5.80;                                // Shipping
        $grandTotal = $currTotal + $tax + $shippingFee;     // Get grand total
        $dateOfOrder = date('d/m/Y');                       // Date of order

        // Get logged in user details
        // $userQuery = "SELECT * FROM users WHERE userId = '$userId' ";
        // $userQuery_run = mysqli_query($conn, $userQuery);
        // $user = mysqli_fetch_assoc($userQuery_run);

        // $customerName = $user['username'];
        // $userEmail = $user['useremail'];
        $customerName = "SKY7";
        $userEmail = "akanyijuka1danson@gmail.com";
        
        
    }else{
        header("location:../cart.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Bootstrap -->
    <?php include('header.php');?>
    <script src="https://checkout.flutterwave.com/v3.js"></script>
</head>
<body>
    <div class="wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-12 ms-5">
                        <!-- Main content -->
                        <div class="invoice mb-3">
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <b>Order ID:</b> <?=$orderId; ?><br>
                                    <b>Payment Due:</b> 2/22/2014<br>
                                    <b>Account:</b> 968-34567
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 ms-5">
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-4">
                                <p class="lead">Payment Methods:</p>
                                <img class="rounded" height=60  src="../img/pay/mtnMM.png" alt="Mobile Money">
                                <!-- <img class="rounded" height=60  src="../img/pay/visa.png" alt="Visa">
                                <img class="rounded" height=60  src="../img/pay/paypal.png" alt="Paypal"> -->

                                <!-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                                    plugg
                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                </p> -->

                                <div class="row mt-4">
                                    <div class="col-4">
                                        <label><b>Mobile Number</b></label>
                                    </div>
                                    <div class="col-8">
                                        <input type="tel" name="mobileNumber" value="" placeholder="+2567.......">
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="d-flex align-items-center justify-content-between px-3 py-4">
                                        <div>
                                            <!-- <form action="checkout.php" metho="POST"> -->
                                                <input style="background-color: teal" type="submit" class="btn text-light" name="checkout" onclick="return(makePayment())" value="Order">
                                            <!-- </form> -->
                                        </div>

                                        <div>
                                            <a href="../cart.php" type="button" class="btn cancel bg-danger text-light">Cancel</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead"> <b>Order ID:</b> <?=$orderId; ?> <b class="ms-5">Order Date:</b><?= $dateOfOrder; ?></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Total</th>
                                            <td>$ <?=$currTotal; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tax (9.3%)</th>
                                            <td>$ <?=$tax; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>$ <?=$shippingFee; ?></td>
                                        </tr>
                                        <tr>
                                            <th><h4 style="color: teal">Grand Total:</h4></th>
                                            <td><h5 style="color: teal">$ <?=$grandTotal; ?> </h5></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function makePayment() {

            var amnt = "<?php echo $grandTotal; ?>";
            var order_id = "<?php echo $orderId; ?>";
            var customerName = "<?php echo $customerName; ?>";
            var reason = "Payment for ordered items";
            var date_of_payment = "<?php echo $dateOfOrder; ?>";
            var email = "<?php echo $userEmail; ?>";

            FlutterwaveCheckout({
            public_key: "FLWPUBK-9da1cf88546e3d1e30f50b850d670277-X",
            tx_ref: "E-SHOP@PAYMENTS",
            amount: amnt,
            currency: "UGX",
            payment_options: "card, banktransfer, ussd",
            redirect_url: "success.html",
            meta: {
                consumer_id: customerName,
                consumer_mac: "92a3-912ba-1192a",
                date_of_payment: date_of_payment,
                reason: reason,
            },
            customer: {
                email: email,
                phone_number: "0779264619",
                name: customerName,
            },
            customizations: {
                title: "E~SHOP UG",
                description: "Payment for ordered items",
                logo: "../img/logo.svg",
            },
            });
        }
    </script>

    <?php include('footer.php');?>

</body>
</html>