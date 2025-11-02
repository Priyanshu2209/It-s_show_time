<html>
<head>
       <title>Movie Profile</title>
       <link rel="stylesheet" href="css/show_info.css">
       
        <link rel="stylesheet" href="css/scroll_bar.css">

   </head>
   <?php
  require("../connection.php");

       $id=$_GET['show'];
       $query3=mysqli_query($con,"SELECT * FROM `show` WHERE s_id=\"$id\";");

       while($row=mysqli_fetch_array($query3))
      {
      ?>
     <body>    
       
<?php
require('_header.php');
?>
   <div class="container">
       <div class="profile-box">
       <div class="edit-icon"><a href="delete_show.php?show=<?php echo $id; ?>&movie=<?php echo $row['m_no']; ?>" ><img src="images/delete.png" >
       <div class="home_back">
       <a href="movie_shows.php?movie=<?php echo $row['m_no']; ?>&date=<?php echo date("y-m-d");?>">&#8249; Back</a></div>
           
           <div class="form-group">
            <label></label>
          </div>
          <br><br>
          <div class="form-group">
              <?php
            $ok=$row['m_no'];
          $query4=mysqli_query($con, "select * from movie where m_no=\"$ok\"" );
       
       while($row2=mysqli_fetch_array($query4))
      {
          ?>
          <br><img src="movie_pic/<?php echo $row2['m_pic']; ?>" class="profile-pic">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <label>Movie Name:-  </label>
            <?php echo $row2['m_name']; ?>
          </div>
          <?php } ?>  
          <div class="form-group">
            <label>Show Time:- </label>
            <?php  echo '<span style="color: blue; text-align: center">'.$row['s_hr'].":".$row['s_min']." ".$row['am_pm'].'</span>' ?>
          </div> 
           
          <div class="form-group">
            <label>Show Date:- </label>
            <?php  echo '<span style="color: blue; text-align: center">'.$row['s_date'].'</span>' ?>
          </div> 


          <div class="form-group">
            <label>Total Seats Booked:- </label>
            <?php 
              $query_det=mysqli_query($con, "SELECT * FROM `showseat` WHERE s_id=\"$id\" AND status=\"booked\"" );
              $rowcount=mysqli_num_rows($query_det);
            
            echo '<span style="color: blue; text-align: center">'.$rowcount.'</span>' ?>
          </div>
          <div class="form-group">
            <label>Total Seats Available:- </label>
            <?php 
              $query_det=mysqli_query($con, "SELECT * FROM `showseat` WHERE s_id=\"$id\" AND status=\"available\"" );
              $rowcount=mysqli_num_rows($query_det);
            
            echo '<span style="color: blue; text-align: center">'.$rowcount.'</span>' ?>
          </div>
          <div class="form-group">
            <label>Amount of seats sold:- </label>
            <?php 
            $query_show=mysqli_query($con, "SELECT * FROM `show` WHERE s_id=\"$id\"");
            while($row_show=mysqli_fetch_array($query_show)){
              $s_price=$row_show['price'];
            }
              
              $query_det=mysqli_query($con, "SELECT * FROM `showseat` WHERE s_id=\"$id\" AND status=\"booked\"" );
              $rowcount=mysqli_num_rows($query_det);
              $tot_amo=$s_price*$rowcount;
            
            echo '<span style="color: blue; text-align: center">'."₹".$tot_amo.'</span>' ?>
          </div>

          <div class="form-group">
            <label>Amount of seats Left:- </label>
            <?php 
            $query_show=mysqli_query($con, "SELECT * FROM `show` WHERE s_id=\"$id\"");
            while($row_show=mysqli_fetch_array($query_show)){
              $s_price=$row_show['price'];
            }
              
              $query_det=mysqli_query($con, "SELECT * FROM `showseat` WHERE s_id=\"$id\" AND status=\"available\"" );
              $rowcount=mysqli_num_rows($query_det);
              $tot_amo=$s_price*$rowcount;
            
            echo '<span style="color: blue; text-align: center">'."₹".$tot_amo.'</span>' ?>
          </div>
       </div>
   </div>
          <div class="form-group">
          <div class="cont2">
          <div class="form-group1">
            <?php
           
                $query5=mysqli_query($con, "SELECT * FROM `bill` WHERE s_id='$id'" );
              
              while($row5=mysqli_fetch_array($query5)){
                
                echo"<br>";
                 $c_id=$row5['cid'];
                 $tot=$row5['total_price'];
                 $b_no=$row5['b_no'];
                
                 $query6=mysqli_query($con, "SELECT * FROM `customer` WHERE cid='$c_id'" );
               while($row6=mysqli_fetch_array($query6)){
                $c_name=$row6['cname'];
                $c_email=$row6['c_email'];
                $c_cont=$row6['c_cont_no'];
               }
               
               echo "<br> Customer Name- ".$c_name."<br> Email- ".'<span style="color: cyan; text-align: center">'.$c_email.'</span>'."<br> Phone no- ".'<span style="color: cyan; text-align: center">'.$c_cont.'</span>'."<br>Total Amount- ".$tot."<br>Seats Booked- ";

               $query7=mysqli_query($con, "SELECT Seatid FROM `sbill` WHERE b_no=\"$b_no\"" );
 
               while($row7=mysqli_fetch_array($query7)){
                $seat_id_1=$row7['Seatid'];

                $query8=mysqli_query($con, "SELECT * FROM `seat` WHERE `Seatid` = '$seat_id_1'" );
                while($row8=mysqli_fetch_array($query8)){
                  $seat_id=$row8['Seatno'];
                echo '<span style="color: yellow; text-align: center">'.$seat_id." ".'</span>';
               }
              }
              
              echo "<br>";
              echo "--------------------------------------------";
               }
              ?>
          </div>
          <div class="form-group">
            <label></label>
          </div>
              </div>
        </form>
   <?php  }?>
</body>
</html>