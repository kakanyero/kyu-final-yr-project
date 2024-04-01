<?php
        require('database/config.php');
        // ~~~~~~~~~~~~~~~Remove item from cart~~~~~~~~~~~~~~~

        if(isset(($_GET['dCartItemId']))){
            $cartItemToRemoveId = $_GET['dCartItemId'];
            // echo 'Deleted Requestid is: '. $cartItemToDeleteId;
    
            $remove_query = "DELETE FROM cart WHERE cartItemId = '$cartItemToRemoveId' ";
            $remove_query_run = mysqli_query($conn, $remove_query);

            if($remove_query_run){
                echo "<script>alert('Item removed Successfully')</script>";
                echo "<script>window.location.href = 'cart.php'</script>";
            }
        }
?>