<html>
    <body>
<?php
    include "../connection.php";

    $id=$_POST['id'];
    $aname=$_POST['aname'];
    $a_cont_no=$_POST['a_cont_no'];
    $a_email=$_POST['a_email'];

    $query="update admin set aname='$aname',a_cont_no='$a_cont_no',a_email='$a_email' where aid='$id'";

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
