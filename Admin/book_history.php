<html>
    <head>
        <title>Add Admin</title>
        <link rel="stylesheet"  href="css/booking_hist.css">
    </head>
<body>

<?php
require('_header.php');
?>
   <?php
    error_reporting(0); ini_set('display_errors', 0);
//   require("connection.php");
      ?>
         <!-- <link rel="stylesheet" href="admin.css"> -->
       <div class="hero">
           <div class="contain">
           <div class="form-box">
               <table border="2" align="left" cellspacing="1" cellpadding="10" bgcolor="powderblue" >
                   <tr>
                       <th>Bill no</th>
                       <th>Bill date</th>
                       <th>Bill time</th>
                       <th>name</th>
                       <th>Email</th>
                       <th>movie</th>
                       <th>Language</th>
                       <th>Screen</th>
                       <th>show Time</th>
                       <th>seats</th>
                   </tr>
                   
           <?php
            // $id=$_GET['show'];
           
            require("../connection.php");
                $query1= "SELECT * FROM `bill` " ;
                $cmd1=mysqli_query($con,$query1);
                 while($row1=mysqli_fetch_array($cmd1))
                 {
                    $bill_no=$row1['b_no'];
                    $bill_date=$row1['b_date'];
                    $bill_time=$row1['b_time'];
                    $bill_ampm=$row1['b_ampm'];
                    $total_price=$row1['total_price'];
                    $cid=$row1['cid'];
                    $s_id=$row1['s_id'];
                    
                    $query2="select *from `show` where s_id='$s_id'";
                    $cmd2=mysqli_query($con,$query2);
                    foreach($cmd2 as $val)
                    {
                        $scr=$val['screen_no'];
                        $shr=$val['s_hr'];
                        $smin=$val['s_min'];
                        $sampm=$val['am_pm'];
                        $movie_no=$val['m_no'];
                    }
                
                //  <!-- echo "<br><br>".$bill_no."<br>".$bill_date."<br>".$bill_time."<br>".$bill_ampm."<br>".$total_price."<br>".$cid."<br>".$s_id."<br>";
                //  echo $scr."<br>".$shr.":".$smin.$sampm;
                //  echo $movie_no; -->
                    
                 $query3="SELECT * FROM `movie` WHERE m_no='$movie_no'";
                 $cmd3=mysqli_query($con,$query3);
                 foreach($cmd3 as $vall)
                 {
                     $m_name=$vall['m_name'];
                     $m_dimension=$vall['m_dimension'];
                     $m_language=$vall['m_language'];
                     $m_hr=$vall['m_hr'];
                     $m_min=$vall['m_min'];
                 }
                //  echo $m_name."<br>".$m_dimension."<br>".$m_language."<br>".$m_hr.":".$m_min;

                //  echo "<B>".$cid."</B>";
                 $query4="SELECT * FROM customer WHERE cid='$cid'";
                 $cmd4=mysqli_query($con,$query4);
                 foreach($cmd4 as $item)
                 {
                     $c_name=$item['cname'];
                     $c_cont_noo=$item['c_cont_no'];
                     $c_email=$item['c_email'];
                     
                 }
                //  echo $c_email;
                 
                 $query5="SELECT * FROM `sbill` WHERE b_no='$bill_no'";
                 $cmd5=mysqli_query($con,$query5);
                 $seat=array(null);
                 foreach($cmd5 as $val)
                 {
                        $seatid=$val['Seatid'];
                        // echo $seatid;
                        $query6="SELECT * FROM `seat` WHERE Seatid='$seatid'";
                         $cmd6=mysqli_query($con,$query6);
                         foreach($cmd6 as $val)
                         {
                             $seatno=$val['Seatno'];
                            //  echo "<BR><BR>".$seatno;
                             array_push($seat,$seatno);
                         }
                        
                 }
                 
                 
            //    echo $c_name."->".$tot;
            ?>
                    <tr>
                        <td><?php echo $bill_no;?></td>
                        <td><?php echo $bill_date;?></td>
                        <td><?php echo $bill_time." ".$bill_ampm;?></td>
                        <td><?php echo $c_name;?></td>
                        <td><?php echo $c_email;?></td>
                        <td><?php echo $m_name;?></td>
                        <td><?php echo $m_language;?></td>
                        <td><?php echo $scr;?></td>
                        <td><?php echo $shr.":".$smin." ".$sampm;?></td>
                        <td><?php foreach($seat as $i)
                            {
                             echo $i." ";
                            }?></td>

                    </tr>
            <?php
        }
               
              ?>
                 </table>
           </div>
       </div>
       </div>
</body>
</html>
