<html>
    <head>
        <title>Its Show Time</title>
        <link rel="stylesheet" href="css/movie_shows.css">
        <link rel="stylesheet" href="css/scroll_bar.css">
    </head>
    <body>
    
    <?php
    include('_header.php');
    $m=$_GET['movie'];
        // $m=str_replace("0000"," ",$_GET['movie']);
        ?>
        <div class="dates_nav">
        <div class="date_txt">Date:</div>
        <?php
        require('../connection.php');
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
             <div class="date"><a href="https://itsshowtime08.000webhostapp.com/Admin/movie_shows.php?movie=<?php echo $m;?>&date=<?php echo $date_full_; ?>"><?php echo $date_num."<br>".$date_char; ?></a></div>
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
            $m_hr=$row['m_hr'];
            $m_min=$row['m_min'];
            
            $m_hr2=$row['m_hr'];
            $m_min2=$row['m_min'];   
         ?>

        <div class="movie_pic"><img src="movie_pic/<?php echo $m_pic; ?>"></div>
        <div class="movie_info"> 
            <h1><?php echo $m_name; ?></h1>
           <div class="mv_dim_lang"> <h3><?php echo $m_dim; ?></h3>
            <h3><?php echo $m_lang; ?></h3></div>
            <p> Timing:<?php echo " ".$m_hr.":".$m_min." hr"?></p>
            
         <a href="movie_profile.php?movie=<?php echo $m; ?>"><button type="submit" class="btn01">Edit</button></a>
         <a href="process_delete_movie.php?movie=<?php echo $m; ?>"><button type="submit" class="btn02">Delete</button></a>
        </div>
        <div class="show_time_info">
        <div class="show_txt"><h1>Shows&#127871</h1></div>
        <?php
        }
        if(isset($_GET['date']))
        {
                
                    $date=$_GET['date'];
                    // date("Y-m-d");
                $query2="select *from `show` where s_date='$date' AND m_no=(select m_no from movie where m_no='$m')" ;
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
                    ?>  <div class="shows"><a href="show_info.php?show=<?php echo $show_id; ?>" title="<?php echo $seat_type;?>"><?php echo $show_hr.":".$show_min." ".$show_am_pm; ?></a></div>
                    
                <?php
                    if(($show_min+$m_min)>60){
                        $jodd = 60-$show_min;
                        $m_min = $m_min-$jodd;
                        $show_hr = $show_hr+1;
                    }
                    else{
                        $m_min=$m_min+$show_min;
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
                    ?>  <div class="shows"><a href="show_info.php?show=<?php echo $show_id; ?>" title="<?php echo $seat_type;?>"><?php echo $show_hr.":".$show_min." ".$show_am_pm; ?></a></div>
                <?php 
                    $show_hr= $show_hr+12+$m_hr;
                    if(($show_min+$m_min)>60){
                        $jodd = 60-$show_min;
                        $m_min = $m_min-$jodd;
                        $show_hr = $show_hr+1;
                    }
                    else{
                        $m_min=$m_min+$show_min;
                    }
                    }
                }
            }
            else
            {?>
                <div class="no_show"><h2>no show</h2></div>
            <?php
         }
         //error_reporting(0); ini_set('display_errors', 0);  
        ?>
            <br>
            <br>
            <br><div class="add_shows">
            <form  method="post" action="add_show.php?movie=<?php echo $m; ?>&date=<?php echo $date; ?>">
            <label for="date" style="color:white;">Choose a Date:</label>
            <input type="date" name="date_s" size="4"  min="<?php echo date("Y-m-d");?>" value="<?php echo $date; ?>"><br><br>
        
                    <label for="screen" style="color:white;">Choose a Screen:</label>
                    <select name="screen" id="screen">
                        <optgroup label="Screen no.">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                   <br><br>
                    <input type="submit" value="Available Time" name="min_time">
                    </form>
                   <br><br>
                    <label style="color:white;">Selected Screen:<?php error_reporting(0); ini_set('display_errors', 0);  echo $_GET['screen'];?> </label>
                    <br><br>
                    <?php 
                    $jodd3=$_GET['screen'];
                    $mid=$_GET['movie'];
                    $jodd2=$_GET['s_date'];
                    require('../connection.php');
                    $query5="SELECT am_pm FROM `show` WHERE am_pm=\"pm\" AND s_date=\"$jodd2\";";
                    $cmd5=mysqli_query($con,$query5);
                    $row5=mysqli_fetch_array($cmd5);
                    if(isset($row5)){
                        $query7="SELECT * FROM `show` WHERE s_hr=(SELECT MAX(s_hr) FROM `show` WHERE screen_no =$jodd3 AND s_date=\"$jodd2\" AND am_pm=\"pm\") AND screen_no =$jodd3 AND s_date=\"$jodd2\";";
                        $cmd7=mysqli_query($con,$query7);
                     while($row7=mysqli_fetch_array($cmd7))
                   {    
                        $movie_info=$row7['m_no'];
                       $query4="SELECT * FROM `movie` HAVING m_no = \"$movie_info\"";
                        $cmd4=mysqli_query($con,$query4);
                        while($row4=mysqli_fetch_array($cmd4)){
                        $movie_hr=$row4['m_hr'];
                        $movie_min=$row4['m_min'];
                        }
                       $max_hr= $row7['s_hr'];
                       $max_hr= $max_hr+12;
                       $max_min=$row7['s_min'];
                    if(($max_min+$movie_min)>60){
                     $f_min = 60-$max_min;
                     $movie_min = $movie_min-$f_min;
                        $max_hr = $max_hr+1;
                    }
                    else{
                        $movie_min=$max_min+$movie_min;
                    }
                    }  
                    }
                    else{
                    $query3="SELECT * FROM `show` WHERE s_hr=(SELECT MAX(s_hr) FROM `show` WHERE screen_no =$jodd3 AND s_date=\"$jodd2\") AND screen_no =$jodd3 AND s_date=\"$jodd2\";";
                    $cmd3=mysqli_query($con,$query3);
                   while($row3=mysqli_fetch_array($cmd3))
                   {    
                        $movie_info=$row3['m_no'];
                       $query4="SELECT * FROM `movie` HAVING m_no = \"$movie_info\"";
                        $cmd4=mysqli_query($con,$query4);
                        while($row4=mysqli_fetch_array($cmd4)){
                        $movie_hr=$row4['m_hr'];
                        $movie_min=$row4['m_min'];
                        }
                       $max_hr= $row3['s_hr'];
                       $max_min=$row3['s_min'];
                    if(($max_min+$movie_min)>60){
                     $f_min = 60-$max_min;
                     $movie_min = $movie_min-$f_min;
                      
                        $max_hr = $max_hr+1;
                    }
                    else{
                        $movie_min=$max_min+$movie_min;
                        
                    }
                    }  
                }
                     ?>
                    
                     <form  method="post" action="add_show.php?movie=<?php echo $m; ?>&date=<?php echo $date; ?>&s_date=<?php echo $_GET['s_date']; ?>&screen=<?php echo $_GET['screen']; ?>">
            
                   
                <div class="selected_date">Minimum Time: <?php
                if($max_hr+$movie_hr>12){
                    $hehe=$max_hr+$movie_hr-12;
                    $hehe_time="PM";
                }
                else{
                    $hehe=$max_hr+$movie_hr;
                    $hehe_time="AM";
                }
                if($movie_min==60){
                    $movie_min=00;
                    $hehe=$hehe+1;
                }
                if($movie_min<10){
                    $movie_min=sprintf("%02d", $movie_min);
                    }
                echo $hehe.":".$movie_min." ".$hehe_time; 
                
                ?></div>
                <br>
                <label for="time" style="color:white;">Choose a time:</label>
                    <input type="time" name="time" id="time" value="<?php 
                    $hehe_jodd=$hehe;
                    if($hehe_time=="PM"){
                        $hehe_jodd=$hehe_jodd+12;
                    }
                    echo $hehe_jodd.":".$movie_min; ?>" 
                    min="<?php 
                    $hehe_jodd=$hehe;
                    if($hehe_time=="PM"){
                        $hehe_jodd=$hehe_jodd+12;
                    }
                    echo $hehe_jodd.":".$movie_min; ?>">
                    <br>
                    <br>
                <label for="date" style="color:white;">Price:</label>
                <input type="text" name="price" size="4">
            <br><br>
               
                    <input type="submit" value="Add Show" name="add">
                    </div>
            </form>
            
            
            <?php
        }

        else
        {
            $date=date("Y-m-d");
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
                    ?>  <div class="shows"><a href="show_info.php?show=<?php echo $show_id; ?>" title="<?php echo $seat_type;?>"><?php echo $show_hr.":".$show_min." ".$show_am_pm; ?></a></div>

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
                    ?>  <div class="shows"><a href="show_info.php?show=<?php echo $show_id; ?>" title="<?php echo $seat_type;?>"><?php echo $show_hr.":".$show_min." ".$show_am_pm; ?></a></div>

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
