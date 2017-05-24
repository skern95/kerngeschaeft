<?php 
    require("config.php"); 
    unset($_SESSION['user']);
    header("Location: test.html"); 
    die("Redirecting to: test.html");
?>