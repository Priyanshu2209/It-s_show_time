<?php
date_default_timezone_set('Asia/Kathmandu');
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Its Show Time</title>
<link rel="stylesheet" href="css/__header__.css">
<body>
<div class="header">
	<div class="header-top">
		<div class="wrap">
			<div class="h-logo" >
				
			<a href="index.php"><img src="Admin/images/logo-removebg-preview (1).png" alt="Logo Image Here"  /></a>
		</div>
		<form action="" id="reservation-form" method="get" >
		    <div class="field" >
		       		       		     
                                <input type="text" class="search" placeholder="Enter A Movie Name"  id="search111" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>" required>
                                
                                <input type="submit" value="Search" class="search_btn" id="button111" >
    		</div>       	
        </form>
			  <div class="nav-wrap">
					<ul class="group" id="example-one" >
			           <li><a href="index.php" >Home</a></li>
			  		   <li><a href="movie_event.php">Movies</a></li>
			  		   <!-- <li><a href="contact.html">Contact us</a></li> -->
			  		   <li>
						 <?php 
						 if(isset($_SESSION['c_user']))
						 {
							 $c_user=$_SESSION['c_user'];
							 require("connection.php");
							 $us=mysqli_query($con,"select * from customer where cname='$c_user'");
							 $user=mysqli_fetch_array($us);?>
							 <a href="profile.php?id=<?php echo $user['cid']; ?>">
								 
								 <?php echo $user['cname'];
								 ?>
								</a>
								 <a href="logout.php">Logout</a>
								 <?php 
						 }
						else{
								?>
								<a href="log_sign.php">Login</a> 
								<a href="log_sign.php?signup=create">Register</a>
								<?php 
							}
								?>
						</li>
			        </ul>
			  </div>		
   		</div>
		
    </div>
</div>

</body>
</html>