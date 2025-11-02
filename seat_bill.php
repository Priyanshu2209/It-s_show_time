<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
include "connection.php";
    // print_r($_POST['emp']);
    $seats=$_SESSION['seats'];
    $seat_ids=$_SESSION['seat_ids'];
    $i=0;
    foreach($seats as $item)
    {
        // $query="select *from `seat` where Seatid='$item'";
        // $cmd=mysqli_query($con,$query);
        // foreach($cmd as $val)
        // {
            $seat_no[$i]=$item;
            // echo $seat_no[$i];
        // }
        // $seat_ids[$i]=$item;
        // echo " ".$seat_ids[$i];
        $i++;
    }

    $price=$_SESSION['price'];
    $price*=$i;
    $sid=$_SESSION['s_id'];
    $cid=$_SESSION['c_id'];

    // echo "<BR>".$price." ".$sid." ".$cid;

    $date=date("Y-m-d");
    $time=date("h:i:s");
    $ampm=date("a");

    // echo "<BR>".$date;
    // echo "<br>".$time;
    // echo "<br>".$ampm;

    $query="SELECT * FROM `bill` WHERE b_no=(SELECT MAX(b_no) FROM bill)";
    
    $cmd=mysqli_query($con,$query);
     $row=mysqli_fetch_array($cmd);
    $num_row=mysqli_num_rows($cmd);
    
    // echo "<BR>".$max_bill_no;
    if($num_row==0)
    {
        $bill_no="b01";
    }
    else
    {
        $max_bill=$row['b_no'];
      
    // echo "<BR>".$max_bill;

    $max_bill_no=ltrim($max_bill,"b");
      $num=intval($max_bill_no);
        // echo $num;

        if(isset($max_bill_no)){
        if($max_bill_no<9)
        {
            $max_bill_no+=1;
            $bill_no="b0".$max_bill_no;
            // echo "<BR>".$bill;
        }
        else
        {
            $max_bill_no+=1;
            $bill_no="b".$max_bill_no;
        }
        }
    }

    // echo "<BR><br>".$bill_no;

    $query2="insert into bill values('$bill_no',' $date','$time','$ampm','  $price','$cid','$sid')";

    $cmd2=mysqli_query($con,$query2);

    if($cmd2)
    {
        foreach($seat_ids as $item)
        {
            $query3="INSERT INTO `sbill` VALUES (null,'$bill_no','$item')";
            $cmd3=mysqli_query($con,$query3);

            $query4="UPDATE `showseat` SET `status`='booked' WHERE s_id='$sid' AND Seatid='$item'";
            $cmd4=mysqli_query($con,$query4);
        }
        
    }
    $query="select * from customer where cid='$cid';";
   
    $cmd=mysqli_query($con,$query);
    // $row=mysqli_num_rows($cmd);
    $row1=mysqli_fetch_array($cmd);

    $email=$row1['c_email'];
    $query="select *from `show` where s_id='$sid'";
            $cmd=mysqli_query($con,$query);
            foreach($cmd as $row)
            {   
                 $movie_date=$row['s_date'];
            }
    // $email="";
    $to_email = $email;
    $subject = "Movie Ticket";
    $body = "Hi, $email \n Booking information:\n";
    $body.="\nBill no:$bill_no\nPrice:$price\nShow date:$movie_date\nSeat no.:";
    foreach($seat_no as $item)
    {
        $body.="$item\n\t\t";
    }
    
    $headers = "From: ranapriyanshu8080@gmail.com";

     
    if(mail($to_email, $subject, $body, $headers)) {
        
    }
    else {
        header("location:bill_payment.php?mail=notsend");
    }

?>
<html>
<head>
    <title>
        Its Show Time
    </title>
    <link rel="stylesheet" href="css/seat_bill.css">
</head>

<body>
    <div class="bill_layout">
        <div class="bill_container">
        <div class="main_bill_container">
    
        <div class="row first">
        <div class="col_1">
            Bill no:  <?php echo $bill_no; ?>
        </div>
    
        <div class="col_2 first_">
            Bill Date: <?php echo $date; ?>
        </div>
    </div>
    <div class="row">
        <div class="col_1">
            name: <?php 
            $query="select *from customer where cid='$cid'";
            $cmd=mysqli_query($con,$query);

            while($row=mysqli_fetch_array($cmd))
            {
                echo $row['cname'];
            }
            ?>
        </div>
        <div class="col_2">
            <?php
            $query="select *from `show` where s_id='$sid'";
            $cmd=mysqli_query($con,$query);
            foreach($cmd as $row)
            {   
                
                 $movie_date=$row['s_date'];
            }
            ?>
            Show date: <?php echo $movie_date; ?>
        </div> 
    </div>
    <div class="row">
        <div class="col_1">
            Movie:<?php 

            foreach($cmd as $row)
            {   
                $mno=$row['m_no'];
                $scr_no=$row['screen_no'];
                // $movie_date=$row['s_date'];
                $query1="select *from movie where m_no='$mno'";
                $cmd1=mysqli_query($con,$query1);
                foreach($cmd1 as $row1)
                {
                        echo " ".$row1['m_name'];
                }
            }
            ?>
             
        </div>
        <div class="col_2">
            Screen no. <?php echo $scr_no; ?>
        </div>                                                                                                                                   
    </div>
   
    <div class="row">
        <div class="col_1">
            Seat no.
            </div>
            <div class="col_2">
            <?php 
            foreach($seat_no as $item)
            {
                if($i==1)
                {
                    echo $item; 
                }
                else
                {
                echo $item.","; 
                }
            } ?>
        </div> 
        
    
    </div>
    <div class="row">
        <div class="col_1">
            Totle Price
        </div>
        <div class="col_2">
        <?php    echo $price."/-"; ?>
        </div>
    
    </div>
    </div>
            </div>
    </div>
    <?php
    
    // $email="priyanshurana2228@gmail.com";
    // $to_email = $email;
    // $subject = "Movie Ticket";
    // $body = "Hi, $email \nClick on the given link to reset the password.\n\t";
    // $headers = "From: ranapriyanshu8080@gmail.com";

     
    // if(mail($to_email, $subject, $body, $headers)) {
        
    // }
    // else {
    //     header("location:bill_payment.php?mail=notsend");
    // }
    ?>
</body>
</html>
