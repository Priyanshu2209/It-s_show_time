<?php
date_default_timezone_set('Asia/Kathmandu');
session_start();
	$admin=$_SESSION['a_user'];
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
				
			<a href="home.php?admin=<?php echo $admin; ?>"><img src="images/logo-removebg-preview (1).png" alt="Logo Image Here"  /></a>
		</div>
		<form action="home.php?admin=<?php echo $admin; ?>" id="reservation-form" method="get" >
		    <div class="field" >
		       		       		     
                                <input type="text" class="search" placeholder="Enter A Movie Name"  id="search111" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>" required>
                                
                                <input type="submit" value="Search" class="search_btn" id="button111" >
    		</div>       	
        </form>
			  <div class="nav-wrap">
					<ul class="group" id="example-one" >
			           <li><a href="home.php?admin=<?php echo $admin; ?>" >Home</a></li>
			  		   <li><a href="admin_option.php">Admin Options</a></li>
			  		   <!-- <li><a href="contact.html">Contact us</a></li> -->
			  		   <li>
						 <?php if(isset($_SESSION['a_user']))
						 {
							 $a_user=$_SESSION['a_user'];
							 require("../connection.php");
							 $us=mysqli_query($con,"select * from admin where aname='$a_user'");
							 $user=mysqli_fetch_array($us);?>
							 <a href="profile.php?id=<?php echo $user['aid']; ?>">
								 
								 <?php echo $user['aname'];
								 ?>
								</a>
								 <a href="logout.php">Logout</a>
								 <?php 
								 }
								 else{
								?>
								<a href="../log_sign.php">Login</a> 
								<a href="../log_sign.php?signup=create">Register</a>
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