<?php
session_start(); 
     
   if(isset($_POST['register']))
   {
        require("connection.php");
        if (mysqli_connect_errno())
        {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        else
        {
        $selector=bin2hex(random_bytes(8));
        $validate=bin2hex(random_bytes(32));
       
        $url="https://itsshowtime08.000webhostapp.com/insert_cust.php?selector_=".$selector."&validate_=".$validate;
        $exp=date("U")+600;
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_phno=$_POST['c_phone_no']; 
        
        $query1="select *from customer where cname='$username';";
        $query2="select *from customer where c_email='$email';";
        $cmd1=mysqli_query($con,$query1);
        $cmd2=mysqli_query($con,$query2);
        if(($row=mysqli_num_rows($cmd1))>0)
        {
            header("location:log_sign.php?signup=sameuser");
        }
        else if(($row=mysqli_num_rows($cmd2))>0)
        {
            header("location:log_sign.php?signup=samemail");
        }
        else
        {

            $_SESSION['selector_verify']=$selector;
            $_SESSION['validate_verify']=$validate;
            $_SESSION['exp_verify']=$exp; 
            $_SESSION['email']=$email; 

        $to_email = $email;
        $subject = "Verify Email";
        $body = "Hi, $email \nClick on the given link to verify email address.\n\t";
        $headers = "From: ranapriyanshu8080@gmail.com";
        
        
     ?>     
     <a href="<?php echo $body.=$url; ?>"></a>
 
     <?php 
    //  echo "hello";
        $query2="INSERT INTO customer (cid,cname,c_cont_no,c_email,c_pass) VALUES (null,'$username','$c_phno','$email','$password');";
        $rs= mysqli_query($con,$query2);
         if($rs)
         {         
            // echo "hey";
            if(mail($to_email, $subject, $body, $headers)) {
                header("location:log_sign.php?signup=sent");
            }
            else {
                header("location:log_sign.php?signup=notsent");
            }
        }
        }
    }
    
    }

?>
<!-- 
     
     echo "hey1";
     if(isset($_GET['verify']))
     {
         echo "hey2";
         echo $username;
         include "connection.php";
         $query2="INSERT INTO customer (cid,cname,c_cont_no,c_email,c_pass,mail_status) VALUES (null,'$username','$c_phno','$email','$password');";
         $rs= mysqli_query($con,$query2);
         if($rs)
         {
             echo "hey";
             // header("location:log_sign.php?login=success");
         }
 
     } -->