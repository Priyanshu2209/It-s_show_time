<html>
    <head>
        <title> Its Show Time </title>
        <link rel="stylesheet"  href="css/movie_event.css">
    </head>
<body>

<?php
require('_header.php');
?>
<div class="movie_title"><h2>&#127916 All Movies</h2></div>
<div class="movies_container">
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
        $pic=$row['m_pic'];
        $m_name=$row['m_name'];
        $m_no=$row['m_no'];
        ?><div class="m_pic"><a href="movie_shows.php?movie=<?php echo $m_no; ?>"><img src="Admin/movie_pic/<?php echo $pic; ?>"></a>
        <div class="m_name"><?php echo $m_name; ?></div></div>
        <?php
        }
        }
     else
     {
        ?><script> let text = "No Movies Found";
        // // alert(text);
        // let path = location.pathname;
        // console.log(path);
//         setTimeout(function() { 
    //   alert('not found'); 
// }, 1000);
     if (confirm(text) == true) {
    location.replace("https://itsshowtime08.000webhostapp.com/movie_event.php");
  }
  else
  {
    location.replace("https://itsshowtime08.000webhostapp.com/movie_event.php?search_movie=no_result_found");
  } 
  </script>
  <?php
             
     }
    }
    
    else if(isset($_GET['search_movie']))
    {
        ?><div class="error">
        <img src="Admin/images/7Fmb.gif">
        <h2>No Such Movies Found</h2>
        </div>
        <?php
    }
    else
    {
        $query2="select * from movie";
        $cmd2=mysqli_query($con,$query2);

    // while($row=mysqli_fetch_array($cmd2))
    foreach($cmd2 as $items)
    {
        $pic=$items['m_pic'];
        $m_name=$items['m_name'];
        $m_no=$items['m_no'];
        ?><div class="m_pic"><a href="movie_shows.php?movie=<?php echo $m_no; ?>"><img src="Admin/movie_pic/<?php echo $pic; ?>"></a>
       <div class="m_name"><?php echo $m_name; ?></div></div>
        <?php
    }
    }
    ?>
</div>
<?php

include('footer.php');
?>
</body>
</html>