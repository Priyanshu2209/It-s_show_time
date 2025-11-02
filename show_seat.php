<!DOCTYPE html>
<html lang="en">
<head>
    <title>Its Show Time</title>
    <link rel="stylesheet" href="css/show_seat.css">
    <link rel="stylesheet" href="css/scroll_bar.css">

</head>
<body>
    <?php 
    include "_header.php";
    ?>
    <div class="seat_container">
        <div class="notation"><div class="seat_notation">
        <div class="booked_seats"></div><p>Booked</p>
        <div class="select"></div><p>Select</p>
        <div class="available"></div><p>Available</p>
        </div></div>

<?php
    // session_start();
    if(isset($_GET['show']))
    {
    $s_id=$_GET['show'];

        include "connection.php";

    $query4="select *from `show` where s_id='$s_id'";
    $cmd4=mysqli_query($con,$query4);

    foreach($cmd4 as $index)
    { 
        $screen=$index['screen_no'];
        $mno=$index['m_no'];
        // $_SESSION['m_no']=$mno;
        // $_SESSION['s_id']=$s_id;
        $price=$index['price'];
        ?>
        <script>
            // var price=<?php echo $price; ?>;
            localStorage.setItem("price",<?php echo $price; ?>);
        </script>
        <?php
    }

    if($screen==1)
    {
        $query1="select *from seat group by Col_no order by Col_no ";
         $cmd1=mysqli_query($con,$query1);

        //     while($column=mysqli_fetch_array($cmd1))
        //  {
        //  $col=$column['Col_no'];
       
        //  }

         $query="select *from seat group by Row_no order by Row_no ";
         $cmd=mysqli_query($con,$query);
     
         foreach($cmd as $item)
         {
             $row=$item['Row_no'];
             ?> <div class="rows_container">
              <div class="row_no"><?php echo $row; ?></div>
             <?php

             foreach($cmd1 as $items)
             {
                 $col=$items['Col_no'];
                 // echo "_ _".$col;

                 $query2="select *from seat where Row_no='$row' AND Col_no='$col'";
                 $cmd2=mysqli_query($con,$query2);

                 while($seat=mysqli_fetch_array($cmd2))
                 {
                     $seat_id=$seat['Seatid'];
                     $seat_no=$seat['Seatno'];

                     $query3="select *from showseat where s_id='$s_id' AND Seatid='$seat_id'";
                     $cmd3=mysqli_query($con,$query3);
                     foreach($cmd3 as $value)
                     {
                         $status=$value['status'];
                         if($status=="available")
                         { ?>
                            <div class="seat_style" id="<?php echo $seat_id; ?>"><?php echo $col; ?></div>
                            <?php
                         }
                         else
                         {                                                                                  
                             ?>
                             <div class="seat_style booked"><?php echo $col; ?></div>
                             <?php 

                         }
                     }
                 }
             } ?> </div>

             <?php
         }
    }
    if($screen==2)
    {
        $query1="select *from seat where Seatid>'S51' group by Col_no order by Col_no";
        $cmd1=mysqli_query($con,$query1);

        // while($column=mysqli_fetch_array($cmd1))
        //  {
        //  $col=$column['Col_no'];
        
        //  }

         $query="select *from seat where Seatid>'S51' group by Row_no order by Row_no";
         $cmd=mysqli_query($con,$query);
     
         foreach($cmd as $item)
         {
             $row=$item['Row_no'];
             ?> <div class="rows_container">
              <div class="row_no"><?php echo $row; ?> </div>
             <?php

             foreach($cmd1 as $items)
             {
                 $col=$items['Col_no'];
                 // echo "_ _".$col;

                 $query2="select *from seat where Row_no='$row' AND Col_no='$col'";
                 $cmd2=mysqli_query($con,$query2);

                 while($seat=mysqli_fetch_array($cmd2))
                 {
                     $seat_id=$seat['Seatid'];
                     $seat_no=$seat['Seatno'];

                     $query3="select *from showseat where s_id='$s_id' AND Seatid='$seat_id'";
                     $cmd3=mysqli_query($con,$query3);
                     foreach($cmd3 as $value)
                     {
                         $status=$value['status'];
                         if($status=="available")
                         { ?>
                            <div class="seat_style" id="<?php echo $seat_id; ?>"><?php echo $col; ?></div>
                            <?php
                         }
                         else
                         {                                                                                  
                             ?> 
                             <div class="seat_style booked"><?php echo $col; ?></div>
                            <?php 

                         }
                     }
                 }
             } ?> </div>

             <?php
         }
    }
    if($screen==3)
    {
        $query1="select *from seat where Seatid<'S120' group by Col_no order by Col_no ";
        $cmd1=mysqli_query($con,$query1);
        
        // while($column=mysqli_fetch_array($cmd1))
        //  {
        //  $col=$column['Col_no'];
        
        //  }

         $query="select *from seat where Seatid<'S120' group by Row_no order by Row_no";
         $cmd=mysqli_query($con,$query);
     
         foreach($cmd as $item)
         {
             $row=$item['Row_no'];
             ?> <div class="rows_container">
              <div class="row_no"><?php echo $row; ?> </div>
             <?php

             foreach($cmd1 as $items)
             {
                 $col=$items['Col_no'];
                 // echo "_ _".$col;

                 $query2="select *from seat where Row_no='$row' AND Col_no='$col'";
                 $cmd2=mysqli_query($con,$query2);

                 while($seat=mysqli_fetch_array($cmd2))
                 {
                     $seat_id=$seat['Seatid'];
                     $seat_no=$seat['Seatno'];

                     $query3="select *from showseat where s_id='s05' AND Seatid='$seat_id'";
                     $cmd3=mysqli_query($con,$query3);
                     foreach($cmd3 as $value)
                     {
                         $status=$value['status'];
                         if($status=="available")
                         { ?>
                            <div class="seat_style" id="<?php echo $seat_id; ?>"><?php echo $col; ?></div>
                            <?php
                         }
                         else
                         {                                                                                  
                             ?>
                             <div class="seat_style booked"><?php echo $col; ?></div>
                            <?php 

                         }
                     }
                 }
             } ?> </div>

             <?php
         }
        
    }
}
    if(isset($_GET['search']))
    {
        header("location:movie_event.php?search=$_GET[search]");
    }
    
?>
<div class="screen_style"></div>
</div>
<div class="seat_text">
      Selected Seat/s= <span id="count">0</span><br>
      Price = Rs. <span id="total">0</span>
    </div>
   
<button type="submit" class="book_btn" onclick="totalseat()">book</button>

<?php 
    
   if(isset($_SESSION['c_user']))
   {
        $c_user=$_SESSION['c_user'];
        if(isset($_SESSION['m_no'])||isset($_SESSION['s_id'])||isset($_SESSION['price']))
        {
            unset($_SESSION['m_no']);
            unset($_SESSION['s_id']);
            unset($_SESSION['price']);
            unset($_SESSION['seats']);
            unset($_SESSION['seat_ids']);
            if(!isset($_SESSION['m_no'])||!isset($_SESSION['s_id'])||!isset($_SESSION['price']))
            {
                $_SESSION['m_no']=$mno;
                $_SESSION['s_id']=$s_id;
                $_SESSION['price']=$price;
            }
        }
        else{
        $_SESSION['m_no']=$mno;
        $_SESSION['s_id']=$s_id;
        $_SESSION['price']=$price;
        }
   }
   else
   {
        $c_user=null;
        session_destroy();
   }
        include "footer.php";
?>

<script>
    function totalseat()
    {
        var user=<?php echo json_encode($c_user); ?>;
        if(user==null)
        {
            alert("Please login first");
        }
        else{
        console.log(user);
        totalseat_();
        }
    }
</script>


<script src="js/script_seat.js"></script>

</body>
</html>