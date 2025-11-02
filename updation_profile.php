<html>
    <body>
<?php
    include "connection.php";

    $id=$_POST['cid'];
    $cname=$_POST['cname'];
    $c_cont_no=$_POST['c_cont_no'];
    $c_email=$_POST['c_email'];

    $query="update customer set cname='$cname',c_cont_no='$c_cont_no',c_email='$c_email' where cid='$id'";

    $cmd=mysqli_query($con,$query);

    if($cmd)
    {
        header("location:profile.php?id=$id");
        
    }
    else
    {
        echo "<script> alert('Something Went Wrong'); </script>";
    }
?>
</body>
</html>
