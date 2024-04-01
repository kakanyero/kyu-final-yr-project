<?php
    session_start();
    session_destroy();
    if(isset($_SESSION['auth'])){
        header("location:index.php");
        exit;
    }
?>