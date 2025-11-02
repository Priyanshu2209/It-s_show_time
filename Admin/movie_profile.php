<html>
<head>
       <title>Movie Profile</title>
       <link rel="stylesheet" href="css/profile.css">

   </head>
   <?php
  require("../connection.php");

       $id=$_GET['movie'];
       $query3=mysqli_query($con,"select * from movie where m_no='$id'");
       
       while($row=mysqli_fetch_array($query3))
      {
      ?>
     <body>    
   <div class="container">
       <div class="profile-box">
       <div class="edit-icon"><a href="update_movie.php?movie=<?php echo $id; ?>" ><img src="images/ed_2.png" >
      </a> </div>
      <div class="home_back">
      <a href="movie_shows.php?movie=<?php echo $id; ?>&date=<?php echo date("y-m-d");?>">&#8249; Back</a></div>
           <a href="update_pic.php?movie=<?php echo $_GET['movie'];?>"><img src="movie_pic/<?php echo $row['m_pic']; ?>" class="profile-pic"></a>
           
           <div class="form-group">
            <label></label>
          </div>
          <div class="form-group">
            <label>Movie Name:-  </label>
            <?php echo $row['m_name']; ?>
          </div>  
          <div class="form-group">
            <label>Dimension:-  </label>
            <?php echo $row['m_dimension']; ?>
          </div>
          <div class="form-group">
            <label>Language:-  </label>
            <?php echo $row['m_language']; ?>
          </div>
          <div class="form-group">
            <label>Run Time(hrs):-  </label>
            <?php echo $row['m_hr'].":".$row['m_min']; ?>
          </div>
          <div class="form-group">
            <label></label>
          </div>
          
        </form>
       </div>
   </div>
   <?php  }?>
</body>
</html>