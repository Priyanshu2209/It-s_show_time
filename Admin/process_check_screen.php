<?php
    session_start();
    include('connection.php');
//    $name= $_POST['name'];
  //  $dim= $_POST['dim'];
   // $lang= $_POST['lang'];
   // $time= $_POST['time'];

    if(isset($_POST['check'])){
        $screen=$_POST['screen'];
        echo $screen;
    }

    
?>