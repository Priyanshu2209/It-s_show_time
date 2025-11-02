
<?php
    session_start();
    include('../connection.php');
    if (isset($_POST['add'])){
        $screen_no= $_GET['screen'];
        
        $date_s=$_GET['s_date'];
        $price= $_POST['price'];
        $m_no=$_GET['movie'];
        $date_field = date('Y-m-d',strtotime($date_s)); 
        $time = $_POST['time'];
        $yourtime =  date('h:i a', strtotime($time));
        preg_match("/([0-9]{1,2}):([0-9]{1,2}) ([a-zA-Z]+)/", $yourtime, $match);
        $hour = $match[1];
        $min = $match[2];
        $ampm = $match[3];
        if($screen_no==1){
            $type= "Standard";
        }
        else if($screen_no==2){
            $type= "Sofa";
        }
        else if($screen_no==1){
            $type= "Recliner Bed";
        }
        $query="SELECT s_id FROM `show`";
        $cmd=mysqli_query($con,$query);
        $x=0;
       while($row=mysqli_fetch_array($cmd))
       {   
           
            $jodd=$row['s_id'];
            $id[$x]= trim($jodd, "s");
            $x++;
       }
       $id_s=max($id)+1;

       $insert = $con->query("INSERT INTO `show` (`s_id`, `s_no`, `screen_no`, `type_of_seat`, `price`, `s_hr`, `s_min`, `am_pm`, `s_date`, `m_no`) VALUES ('s$id_s', '00', '$screen_no', '$type', '$price', '$hour', '$min', '$ampm', '$date_field', '$m_no');");
        if($insert){
            if($screen_no==1)
            {
                    $type= "Standard";
                    for($i=1;$i<10;$i++)
                    {
                    $query="INSERT INTO `showseat` values (null,\"s$id_s\",\"S0$i\",\"available\")";
                   $cmd=mysqli_query($con,$query);
                }
                for($i=10;$i<=50;$i++)
               {
               $query="INSERT INTO `showseat` values (null,\"s$id_s\",\"S$i\",\"available\")";
                   $cmd=mysqli_query($con,$query);
               }
           }

            
            else if($screen_no==2)
            {
                $type= "Sofa";
                for($i=51;$i<91;$i++)
                {
                    $query="INSERT INTO `showseat` values (null,\"s$id_s\",\"S$i\",\"available\")";
                    $cmd=mysqli_query($con,$query);
                }
            }
            else if($screen_no==3)
            {
                    $type= "Recliner Bed";
                 
                for($i=91;$i<=120;$i++)
                {
                   $query="INSERT INTO `showseat` values (null,\"s$id_s\",\"S$i\",\"available\")";
                   $cmd=mysqli_query($con,$query);
                }
            }
            ?>
            <script>
            let text = "Added Sucessfully"
            if (confirm(text) == true) {
            location.replace("movie_shows.php?movie=<?php echo $m_no;?>&date=<?php echo date("y-m-d");?>");
            }
            </script><?php
        }
    
    elseif($insert && $query){?>
        <script>
        let text = "Please Try Again"
        if (confirm(text) == true) {
        location.replace("movie_shows.php?movie=<?php echo $m_no;?>&date=<?php echo date("y-m-d");?>");
            }
            </script>
            <?php
    }
}
elseif(isset($_POST['min_time'])){
    $screen=$_POST['screen'];
    $date=$_GET['date'];
    $m_no=$_GET['movie'];
    $date_s=$_POST['date_s'];
    header("location:movie_shows.php?movie=".$m_no."&date=". $date ."&s_date=".$date_s."&screen=".$screen);
}
?>