<?php
    include("database/config.php");
    if(isset($_POST['signup'])){
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $phoneNumber = $_POST['telNumber'];
        $city = $_POST['city'];
        $pswd = $_POST['pswd'];

        // Encrypting the password
        $newPassword = sha1($pswd);

        // Add user to database
        $userQuery = "INSERT INTO users (username, useremail, city, phone, userpassword)
        VALUE('$username', '$useremail', '$city', '$phoneNumber', '$newPassword')";

        $userQuery_run = mysqli_query($conn, $userQuery);

        // Check if user has been registered
        if($userQuery_run){
            echo "<script> confirm('Account created successfully, proceed to login page'); </script>";
            echo "<script> window.location.href='index.php'; </script>";
        }else{
            echo "<script> alert('Account not registered'); </script>";
            echo "<script> window.location.href='signup.php'; </script>";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up - E-Commerce</title>
        <link rel="stylesheet" href="css/signup.css">
    </head>

<body>
    <div id="signup-container">
        <h1>Sign Up</h1>
        <form action="signup.php" method="POST">
            <input type="text" name="username" id="username" placeholder="Username" required>
            <input type="email" name="useremail" id="email" placeholder="Email" required>
            <input type="tel" name="telNumber" id="phone" placeholder="Telephone Number" required>
            <input type="text" name="city" id="city" placeholder="City" required>
            <input type="password" name="pswd" id="password" placeholder="Password" required>
            <input type="submit" name="signup" value="Sign Up" id="signupButton">
            <a href="index.php" id="login-link">Already have an account? Login</a>
        </form>
    </div>
</body>
</html>
