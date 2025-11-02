<html>
    <head>
        <title> Its Show Time </title>
        <link rel="stylesheet"  href="css/movie_event.css">
        <link rel="stylesheet" href="css/scroll_bar.css">
    </head>
<body>

<?php
    if(isset($_GET['admin'])||isset($_GET['search']))
    {
require('_header.php');
?>
<div class="movie_title"><h2>&#127916 All Movies</h2></div>
<div class="movies_container">
<?php
    
    require('../connection.php');
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
        ?><div class="m_pic"><a href="movie_shows.php?movie=<?php echo $m_no; ?>&date=<?php echo date("Y-m-d");?>"><img src="movie_pic/<?php echo $pic; ?>"></a>
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
    location.replace("https://itsshowtime08.000webhostapp.com/Admin/home.php?admin="+"<?php echo $admin;?>");
        }
        else
        {
              location.replace("https://itsshowtime08.000webhostapp.com/Admin/home.php?search_movie=no_result_found"+"&&admin="+"<?php echo $admin;?>");
        } 
  </script>
  <?php
             
     }
    }
    
    else if(isset($_GET['search_movie']))
    {
        ?><div class="error">
        <img src="images/7Fmb.gif">
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
        ?><div class="m_pic"><a href="movie_shows.php?movie=<?php echo $m_no; ?>&date=<?php echo date("Y-m-d");?>"><img src="movie_pic/<?php echo $pic; ?>"></a>
       <div class="m_name"><?php echo $m_name; ?></div></div>
        <?php
    }
    }
    ?>
            <style>
                .m_name2
                    {
                        padding: 10px;
                        padding-bottom: 5px;
                        text-align:center;
                        font-size:18px;
                        color: aliceblue;
                        font-weight: bold;
                        text-transform: capitalize;
                        text-shadow: 0px 0px 1px black;  
                    }
        </style>
          <form action="process_add_movie.php" method="post" enctype="multipart/form-data" id="form1">
            <div class="m_pic">
                
            <div class="m_con">
              <label class="m_name2">Movie Name:-</label>
              <input type="text" name="name" size="9"/>
            </div>
            
            <div class="m_con">
              <label class="m_name2">Language:-</label>
              <input type="text" name="lang" maxlength="8" size="4"/>
            </div>

            <div class="m_con">
              <label class="m_name2">Dim:-</label>
              <input type="text" name="dim" maxlength="2" size="4"/>
            </div>
            <div class="m_con">
              <label class="m_name2">Hours:-</label>
              <input type="text" name="hr" maxlength="2" size="4"/>
            </div>
            <div class="m_con">
              <label class="m_name2">Minutes:-</label>
              <input type="text" name="min" maxlength="2" size="4"/>
            </div>
            <div class="m_con">
              <label class="m_name2">Image</label>
              <input type="file" name="file"/>
            </div>
              <button type="submit" class="btn btn-success">Add Movie</button>
            </div>
          </form>
</div>
<?php

include('footer.php');
}
else
header("Location: ../index.php?");
?>
</body>
</html>