<?php
    include('../connection.php');
    $id=$_GET['show'];
    $m_id=$_GET['movie'];
        $query="DELETE FROM `show` WHERE `s_id` = \"$id\";";
        $query2="DELETE FROM `showseat` WHERE `showseat`.`s_id` = \"$id\";";
        $cmd2=mysqli_query($con,$query2);
        $cmd=mysqli_query($con,$query);
        if($cmd && $cmd2){?>
            <script>
            let text = "Deleted Successfully"
            if (confirm(text) == true) {
            location.replace("movie_shows.php?movie=<?php echo $m_id; ;?>&date=<?php echo date("y-m-d");?>");
                }
                </script>
                <?php
        }
    
    else{
        ?>
            <script>
            let text = "Failed To Delete!!"
            if (confirm(text) == true) {
            location.replace("movie_shows.php?movie=<?php echo $m_id; ;?>&date=<?php echo date("y-m-d");?>");
                }
                </script>
    <?php } ?>