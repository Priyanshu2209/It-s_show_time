<?php

session_start();

       if(isset($_GET['selector_'])&&isset($_GET['validate_']))
       {
           $check=$_GET['selector_'];
           $validate=$_GET['validate_'];
          
           $date=date("U");
           if($_SESSION['selector_verify']==$check&&$_SESSION['validate_verify']==$validate&&$_SESSION['exp_verify']>=$date)
           {
            
                require("connection.php");
                $email=$_SESSION['email'];
                $query="update customer set mail_status= 1 where c_email='$email'";
                $cmd=mysqli_query($con,$query);
                if($cmd){
                    header("location:log_sign.php?verify=true");
                }
                else
                {
                    echo "<script> alert('mail not found'); </script>";
                }
           }
           else
           {
               echo "time out";
           }
        }
   

// include "connection.php";
// $query2="INSERT INTO customer (cid,cname,c_cont_no,c_email,c_pass) VALUES (null,'$username','$c_phno','$email','$password');";
// $rs= mysqli_query($con,$query2);
// if($rs)
// {
//     header("location:log_sign.php?login=success");
// }
?>