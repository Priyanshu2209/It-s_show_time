<html>
    <body>
<?php
    include "../connection.php";

    $id=$_POST['id'];
    $m_name=$_POST['m_name'];
    $m_dim=$_POST['m_dim'];
    $m_lang=$_POST['m_lang'];
    $m_hr=$_POST['m_hr'];
    $m_min=$_POST['m_min'];


        $insert = $con->query("update movie set m_name='$m_name',m_dimension='$m_dim',m_language='$m_lang',m_hr='$m_hr',m_min='$m_min' where m_no='$id'");
        if($insert){
            echo "<script> alert('Updated'); </script>";
            header("Location: movie_profile.php?movie=$id");
        }
    else
    {
        echo "<script> alert('Something Went Wrong'); </script>";
    }
?>
</body>
</html>
