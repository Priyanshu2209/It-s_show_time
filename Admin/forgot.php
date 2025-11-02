<!DOCTYPE html>
<head>
    <title>forgotpass</title>
</head>
<body>

<?php
session_start();
if(isset($_POST['checkmail']))
{
    $selector=bin2hex(random_bytes(8));
    $validate=bin2hex(random_bytes(32));
   
    $url="http://localhost/project/Login1/resetpass.php?selector=".$selector."&validate=".$validate;

    $exp=date("U")+600;
    
    $con=mysqli_connect("localhost","root","","project");

    $email=$_POST['sentmail'];
  
    $query="select * from customer where c_email='$email';";
   
    $cmd=mysqli_query($con,$query);
    $row=mysqli_num_rows($cmd);
    $row1=mysqli_fetch_array($cmd);

    $username=$row1['cname'];
    $_SESSION['cname']=$username;
    
    if($row==0)
    {
        header("location:resetmail.php?mail=incorrect");
    }
    else
    {
        $_SESSION['selector']=$selector;
        $_SESSION['validate']=$validate;
        $_SESSION['exp']=$exp;
        

    $to_email = $email;
    $subject = "Reset password";
    $body = "Hi, $email \nClick on the given link to reset the password.\n\t";
    $headers = "From: ranapriyanshu8080@gmail.com";

     ?>     
    <a href="<?php echo $body.=$url; ?>"></a>

    <?php
    if(mail($to_email, $subject, $body, $headers)) {
        header("location:resetmail.php?mail=send");
    }
    else {
        header("location:resetmail.php?mail=notsend");
    }
}
}
?>

</body>
</html>