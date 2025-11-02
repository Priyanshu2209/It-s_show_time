<?php
            $id=$_GET['show'];
           
  require("connection.php");
                $query5=mysqli_query($con, "SELECT * FROM `bill` WHERE s_id='$id'" );
              
                 while($row5=mysqli_fetch_array($query5)){
               
                 $c_id=$row5['cid'];
                 $tot=$row5['total_price'];
                
                 $query6=mysqli_query($con, "SELECT * FROM `customer` WHERE cid='$c_id'" );
               while($row6=mysqli_fetch_array($query6)){
                $c_name=$row6['cname'];
               }
               echo $c_name."->".$tot;
            
               }
              ?>