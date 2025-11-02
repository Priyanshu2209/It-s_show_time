<html>
    <head>
        <link rel="stylesheet"  href="index.css">
    </head>
    <body>
    <div class="home">
    <div class="head_nav">
            <?php
                include ('_header.php');
            ?>
    </div>
    <div class="movie_title"><h2>&#127916Movies</h2></div>
    <div class="link_movies_all"><a href="movie_event.php">See All &#8250</a></div>
    
    <div class="movies">
    <?php
    require('connection.php');
    if(isset($_GET['search']))
    {
        $search=strtoupper($_GET['search']);
        $query1="select * from movie  where concat(m_name,m_language) like '%$search%' ";
        $cmd1=mysqli_query($con,$query1);

        if(mysqli_num_rows($cmd1)>0)
        {
        while($row=mysqli_fetch_array($cmd1))
        {
            $m_id=$row['m_no'];
        $pic=$row['m_pic'];
        $m_name=$row['m_name'];
        ?><div class="m_pic"><a href="movie_shows.php?movie=<?php echo $m_id; ?>"><img src="Admin/movie_pic/<?php echo $pic; ?>"></a>
        <div class="m_name"><?php echo $m_name; ?></div></div>
        <?php
        }
        }
        else
        {
        ?>
            <script>
                let text = "No Movies Found";
            if (confirm(text) == true)
            {
                location.replace("https://itsshowtime08.000webhostapp.com/index.php");
            }
            else
            {
                location.replace("https://itsshowtime08.000webhostapp.com/index.php?search_movie=no_result_found");
            } 
            </script>
                 <?php
    //              $query2="select * from movie limit 6";
    //              $cmd2=mysqli_query($con,$query2);

    //          foreach($cmd2 as $items)
    //          {
    //              $m_id=$items['m_no'];
    //              $pic=$items['m_pic'];
    //              $m_name=$items['m_name'];
                 ?>
                 <!-- <div class="m_pic"><a href="movie_shows.php?movie=
                 <?php
                 // echo $m_id; ?>">
                 <img src="images/<?php //echo $pic; ?>"></a> 
                 <div class="m_name"><?php //echo $m_name; ?></div></div> -->
   \              <?php
    //          }
        }
    }
    else if(isset($_GET['search_movie']))
    {
        ?><div class="error">
        <img src="Admin/images/error.gif">
        <h2>No Movies Found</h2>
        </div>
        <?php
    }
    else
    {
        $query2="select * from movie limit 6";
        $cmd2=mysqli_query($con,$query2);

    // while($row=mysqli_fetch_array($cmd2))
    foreach($cmd2 as $items)
    {
        $m_id=$items['m_no'];
        $pic=$items['m_pic'];
        $m_name=$items['m_name'];
        ?><div class="m_pic"><a href="movie_shows.php?movie=<?php echo $m_id; ?>"><img src="Admin/movie_pic/<?php echo $pic; ?>"></a>
        <div class="m_name"><?php echo $m_name; ?></div></div>
        <?php
    }
    }
    ?>
    </div>

<div class="foot">
    <?php
include ('footer.php');
?>
</div>
</div>

    </body>
</html>
