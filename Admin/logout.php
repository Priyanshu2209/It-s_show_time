<?php
    session_start();
    unset($_SESSION['a_user']);
    session_destroy();
    header("location:home.php");
    
?>