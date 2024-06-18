<?php
    include('database/config.php');
    if(isset($_POST['submit'])){
        $productId = $_POST['productId'];
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $numberOfItems = $_POST['numberOfItem'];
        $totalCost = $productPrice * $numberOfItems;
        $selectedSize = $_POST['selectedSize'];
        $dateAdded = date('Y/m/d');
        // $location = $_POST['location'];

        // Checking if all values are captured
        // echo "ProductId:-> ".$productId;
        // echo "<br>";
        // echo "NumberOfItems:-> ".$numberOfItems;
        // echo "<br>";
        // echo "ProductName:-> ".$productName;
        // echo "<br>";
        // echo "Price:-> ".$productPrice;
        // echo "<br>";
        // echo "Added On:-> ". $dateAdded;
        // echo "<br>";
        // echo "Selected Size:-> ". $selectedSize;
        // echo "<br>";

        // Add the item to cart
        
        $addToCartQuery = "INSERT INTO cart(productName, productPrice, numberOfItems, totalCost, sizeSelected, dateAdded, productId)VALUES('$productName', '$productPrice' , '$numberOfItems', '$totalCost', '$selectedSize', '$dateAdded', '$productId')";

        $addToCartQuery_run = mysqli_query($conn, $addToCartQuery);
        if ($addToCartQuery_run) {
            header('location:cart.php');
        }else{
            echo "<script> alert('Item was not Added to cart'); </script>";
        }
    }
?>