<?php
    session_start();
    include("../connection.php");
    $name= $_POST['name'];
    $dim= $_POST['dim'];
    $lang= $_POST['lang'];
    $hr= $_POST['hr'];
    $min= $_POST['min'];
    $targetDir = "movie_pic/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    //$target_dir = "D_project/movie_pic";
    //$target_file = $target_dir . basename($_FILES['m_pic']["name"]);
    
    //$flname="D_project/movie_pic/".basename($_FILES["m_pic"]["name"]);
    $query="SELECT m_no FROM `movie`";
    $cmd=mysqli_query($con,$query);
   while($row=mysqli_fetch_array($cmd))
   {   
        $jodd=$row['m_no'];
        $id=trim($jodd, "m");
   }
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
        // Insert image file name into database
        $id=$id+1;
        $insert = $con->query("INSERT INTO `movie` (`m_no`, `m_name`, `m_dimension`, `m_language`, `m_hr`, `m_min`, `m_pic`) VALUES ('m$id', '$name', '$dim', '$lang', '$hr', '$min', '$fileName');");
        if($insert){
           $admin=$_SESSION['a_user'];
            header("location:home.php?admin='$admin'");
        }
    }
    else{
        
    $_SESSION['success']="Failed";
    header('location:home.php?=failed');
    }
   // mysqli_query($con,"insert into  movie values(NULL,'$name','$dim','$lang','$time','$fileName')");
    //move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
   // move_uploaded_file($_FILES["m_pic"]["tmp_name"], $target_file);
    
?>