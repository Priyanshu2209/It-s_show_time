<html>
<head>
       <title>User Profile</title>
       <link rel="stylesheet" href="css/profile.css">

   </head>
   <?php
  require("connection.php");

     if(isset($_GET['id']))
     {
       $id=$_GET['id'];
       $query3=mysqli_query($con,"select * from customer where cid='$id'");
       
       while($row=mysqli_fetch_array($query3))
      {
      ?>
     <body>    
   <div class="container">
       <div class="profile-box">
       <div class="edit-icon"><a href="update_profile.php?id=<?php echo $id; ?>" ><img src="Admin/images/ed_2.png" >
      </a> </div>
      <div class="home_back">
      <a href="index.php">&#8249; home</a></div>
           <img src="Admin/images/p_1.png" class="profile-pic">
           
           <div class="form-group">
            <label></label>
          </div>
          <div class="form-group">
            <label>Username:-  </label>
            <?php echo $row['cname']; ?>
          </div>  
          <div class="form-group">
            <label>Contact:-  </label>
            <?php echo $row['c_cont_no']; ?>
          </div>
          <div class="form-group">
            <label>Email:-  </label>
            <?php echo $row['c_email']; ?>
          </div>
          <div class="form-group">
            <label></label>
          </div>
          <div class="form-group-a">
          <a href="resetmail.php">Change Password?</a>
          <!-- <br><br> -->
             <a href="logout.php">Log out</a>            
          </div>
        </form>
       </div>
   </div>
   <?php } }?>
</body>
</html>