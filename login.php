<?php
    session_start();
    include("database/config.php");
    if(isset($_POST['login'])){
        $useremail = $_POST['useremail'];
        $pswd = $_POST['userpassword'];

        // Encrypted password
        $encryptedPswd = sha1($pswd);

        // Add user to database
        $login_query = "SELECT * FROM users WHERE useremail = '$useremail' AND userpassword = '$encryptedPswd' ";
        $login_query_run = mysqli_query($conn, $login_query);

        // Check if user has been registered
        if($userDetails = mysqli_fetch_assoc($login_query_run)){
            $_SESSION['auth'] = '201:loggedIn';
            $_SESSION['authUserName'] = $userDetails['username'];
            $_SESSION['authUseremail'] = $userDetails['useremail'];
            $_SESSION['authUserPhoneNo'] = $userDetails['phone'];

            // echo $userDetails['username'];
            echo "<script> window.location.href='dashboard.php'; </script>";
        }else{
            echo "<script> alert('Wrong user email of password, Try again'); </script>";
            echo "<script> window.location.href='index.php'; </script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Commerce</title>
    <link rel="stylesheet" href="css/login.css">
    </head>

<body>
    <div id="login-container">
        <h1>Login</h1>
        <form action="index.php" method="post">
            <input type="email" name="useremail" placeholder="Email" required>
            <input type="password" name="userpassword" placeholder="Password" required>
            <input type="submit" name="login" value="Login" id="loginButton">
            <a href="signup.php" id="signup-link">Don't have an account? Sign Up</a>
        </form>
    </div>
</body>

</html>
