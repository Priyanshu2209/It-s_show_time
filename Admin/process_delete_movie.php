<?php
    session_start();
    include('../connection.php');
    $id=$_GET['movie'];
    
      $admin=$_SESSION['a_user'];
        
        $query = "DELETE FROM `movie` WHERE `m_no` = '$id'";
        $cmd=mysqli_query($con,$query);
        if($cmd){
          
            header("location:home.php?admin=$admin");
        }
    
    else{
        
    $_SESSION['success']="Failed";
    header("location:home.php?admin=$admin");
    }
   // mysqli_query($con,"insert into  movie values(NULL,'$name','$dim','$lang','$time','$fileName')");
    //move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
   // move_uploaded_file($_FILES["m_pic"]["tmp_name"], $target_file);
    
?>