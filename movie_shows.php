<html>
    <head>
        <title>Its Show Time</title>
        <link rel="stylesheet" href="css/movie_shows.css">
        <link rel="stylesheet" href="css/scroll_bar.css">
    </head>
    <body>
    
    <?php
        // date_default_timezone_set('Asia/Kolkata');
    include('_header.php');
    $m=$_GET['movie'];
        // $m=str_replace("0000"," ",$_GET['movie']);
        ?>
        <div class="dates_nav">
        <div class="date_txt">Date:</div>
        <?php
        require('connection.php');
         $c_d=date("Y-m-d");
        $query="SELECT `s_date` FROM `show` WHERE s_date>='$c_d' GROUP BY s_date ORDER BY s_date DESC";
        $cmd=mysqli_query($con,$query);
        $num_row=mysqli_num_rows($cmd);
        if($num_row>0)
        {
        // $row=mysqli_fetch_array($cmd);
        // while($row=mysqli_fetch_array($cmd))
         foreach($cmd as $itemss)
        {
            // $date_full=$row['s_date'];
            $date_full=$itemss['s_date'];
            break;
            // echo $s;
            // $dates=$date_full;
            // echo $date_full;
            // $date_num=date("d",strtotime("$dates"));
            // echo $date_num;
            // $date_char=date("D",strtotime("$dates"));
        
        }
        // echo $date_full;
        $i=0;
        while($c_d<=$date_full)
        {
            $date_full_=date("Y-m-d",strtotime("+$i Day"));
            $date_num=date("d",strtotime("+$i Day"));
            $date_char=date("D",strtotime("+$i Day"));

            ?>
             <div class="date"><a href="https://itsshowtime08.000webhostapp.com/movie_shows.php?movie=<?php echo $m;?>&date=<?php echo $date_full_; ?>"><?php echo $date_num."<br>".$date_char; ?></a></div>
            <?php
             $i++;
            $c_d=date("Y-m-d",strtotime("+$i Day"));
           
        }
        }
        ?>

        </div>
        <?php
        // echo $m;
        $query="select *from movie where m_no='$m'";

        $cmd=mysqli_query($con,$query);
        ?>
        <div class="movie_all_info">
            <div class="all_info">
            <?php
        while($row=mysqli_fetch_array($cmd))
        {
            $m_name=$row['m_name'];
            $m_lang=$row['m_language'];
            $m_pic=$row['m_pic'];
            $m_dim=$row['m_dimension'];     
            // $m_timxe=$row['m_time'];  
            $m_hr=$row['m_hr']; 
            $m_min=$row['m_min']; 
         ?>
        <div class="movie_pic"><img src="Admin/movie_pic/<?php echo $m_pic; ?>"></div>
        <div class="movie_info"> 
            <h1><?php echo $m_name; ?></h1>
           <div class="mv_dim_lang"> <h3><?php echo $m_dim; ?></h3>
            <h3><?php echo $m_lang; ?></h3></div>
            <p> Timing:<?php echo " ".$m_hr.":".$m_min." hr"?></p>
        </div>
        <div class="show_time_info">
        <div class="show_txt"><h1>Shows&#127871</h1></div>
        <?php
        }
        if(isset($_GET['date'])&&$_GET['date']!=date("Y-m-d"))
        {
                
                    $date=$_GET['date'];
                    // date("Y-m-d");
                $query2="select *from `show` where s_date='$date' AND m_no=(select m_no from movie where m_no='$m')";
                // $query2="SELECT * FROM `show` where m_no=(select m_no from movie where m_no='$m')";
                $cmd2=mysqli_query($con,$query2);
                ?>
                <div class="selected_date">Selected date: <?php echo $date; ?></div>
                    <?php
            if(mysqli_num_rows($cmd2)>0)
            {
                foreach($cmd2 as $item)
                {
                    $show_id=$item['s_id'];
                    $show_hr=$item['s_hr'];
                    $show_min=$item['s_min'];
                    $show_am_pm=$item['am_pm'];
                    $seat_type=$item['type_of_seat'];

                    if($show_am_pm=="am")
                    {
                    ?>  <div class="shows"><a href="show_seat.php?show=<?php echo $show_id; ?>" title="<?php echo $seat_type;?>"><?php echo $show_hr.":".$show_min." ".$show_am_pm; ?></a></div>

                <?php
                    }
                }
                foreach($cmd2 as $item)
                {
                    $show_id=$item['s_id'];
                    $show_hr=$item['s_hr'];
                    $show_min=$item['s_min'];
                    $show_am_pm=$item['am_pm'];
                    $seat_type=$item['type_of_seat'];

                    if($show_am_pm=="pm")
                    {
                    ?>  <div class="shows"><a href="show_seat.php?show=<?php echo $show_id; ?>" title="<?php echo $seat_type;?>"><?php echo $show_hr.":".$show_min." ".$show_am_pm; ?></a></div>

                <?php
                    }
                }
            }
            else
            {?>
                <div class="no_show"><h2>no show</h2></div>
            <?php }
        }
        else
        {
            date_default_timezone_set('Asia/Kolkata');
            $date=date("Y-m-d");
            $hr=date("h");
            $ampm=date("a");
            $min=date("i");
            
            // echo $hr.":".$min." ".$ampm;
            if($ampm=='Am')
            {
                $totalmin=($hr*60)+$min;
            $query2="select *from `show` where s_date='$date' AND m_no=(select m_no from movie where m_no='$m')";

            $cmd2=mysqli_query($con,$query2);
            ?>
                <div class="selected_date">Selected date: <?php echo $date; ?></div>
            <?php
            if(mysqli_num_rows($cmd2)>0)
            {
                foreach($cmd2 as $item)
                {
                    $show_id=$item['s_id'];
                    $show_hr=$item['s_hr'];
                    $show_min=$item['s_min'];
                    $show_am_pm=$item['am_pm'];
                    $seat_type=$item['type_of_seat'];

                    if($show_am_pm=="am")
                    {
                    $stotalmin=($show_hr*60)+$show_min;
                        if($stotalmin>=$totalmin)
                        {
                    ?>  <div class="shows"><a href="show_seat.php?show=<?php echo $show_id; ?>" title="<?php echo $seat_type;?>"><?php echo $show_hr.":".$show_min." ".$show_am_pm; ?></a></div>

                <?php
                        }
                    }
                }
                foreach($cmd2 as $item)
                {
                    $show_id=$item['s_id'];
                    $show_hr=$item['s_hr'];
                    $show_min=$item['s_min'];
                    $show_am_pm=$item['am_pm'];
                    $seat_type=$item['type_of_seat'];

                    if($show_am_pm=="pm")
                    {
                    ?>  <div class="shows"><a href="show_seat.php?show=<?php echo $show_id; ?>" title="<?php echo $seat_type;?>"><?php echo $show_hr.":".$show_min." ".$show_am_pm; ?></a></div>

                <?php
                    }
                }
                 }
                 else
                 { ?>
                 <div class="no_show"><h2>no show</h2></div>
                 <?php 
                 }
            }
            if($ampm=="pm")
            {   
                
                $x=12;
                if($hr==$x)
                {
                    $totalmin=$hr*60+$min;
                }
                else
                {
                    $totalmin=($hr+12)*60+$min;
                }
                
                
                $query2="select *from `show` where s_date='$date' AND m_no=(select m_no from movie where m_no='$m')";

                $cmd2=mysqli_query($con,$query2);
                ?>
                    <div class="selected_date">Selected date: <?php echo $date; ?></div>
                <?php
                    if(mysqli_num_rows($cmd2)>0)
                    {
                    
                        foreach($cmd2 as $item)
                        {
                            $show_id=$item['s_id'];
                            $show_hr=$item['s_hr'];
                            $show_min=$item['s_min'];
                            $show_am_pm=$item['am_pm'];
                            $seat_type=$item['type_of_seat'];

                            if($show_am_pm=="pm")
                            {
                                if($show_hr==$x)
                                {
                                    $stotalmin=($show_hr*60)+$show_min;
                                    
                                }
                                else
                                {
                                    $stotalmin=($show_hr+12)*60+$show_min;
                                    
                                }
                                   
                             
                                if($stotalmin>=$totalmin)
                                {
                            ?>  
                            <div class="shows"><a href="show_seat.php?show=<?php echo $show_id; ?>" title="<?php echo $seat_type;?>"><?php echo $show_hr.":".$show_min." ".$show_am_pm; ?></a></div>

                        <?php
                                }
                            }
                        }
                    }
                 else
                 { ?>
                 <div class="no_show"><h2>no show</h2></div>
                 <?php 
                 }
            }
        }   
        if(isset($_GET['search']))
        {
            header("location:movie_event.php?search=$_GET[search]");
        }
    ?>
     </div>

     </div>
     </div>
     <?php
        include('footer.php');
     ?>
    </body>
</html>
