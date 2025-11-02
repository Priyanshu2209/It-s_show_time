<html>
    <body>
<?php
    include "../connection.php";

    $id=$_GET['movie'];

    $targetDir = "movie_pic/";
    $fileName = basename($_FILES["pic"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    move_uploaded_file($_FILES["pic"]["tmp_name"], $targetFilePath);
        $insert = $con->query("update movie set m_pic='$fileName' where m_no='$id'");
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
