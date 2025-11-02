<!DOCTYPE html>
<body>
<?php
session_start();
if(isset($_POST['pwd_reset']))
{
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $repass=$_POST['pass_again'];
    echo $username;
    $con=mysqli_connect("localhost","root","","project");
    
    $query="select *from customer where cname='$username';";

    $cmd=mysqli_query($con,$query);
    
    $row=mysqli_fetch_row($cmd);
   
    if($row==0)
    {
        
    }
    else
    { 
        if($pass==$repass)
        {
            $query="update customer set c_pass='$pass' where cname='$username';";
            $cmd=mysqli_query($con,$query);
            session_destroy();
            header("location:index.php?forgot=done");
        }
        else
        {
            header("location:resetpass.php?selector=".$_SESSION['selector']."&validate=".$_SESSION['validate']."&pass=notsame");
        }
    }
}


?>
</body>
</html>