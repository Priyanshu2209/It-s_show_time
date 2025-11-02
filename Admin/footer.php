<html>
<head>
<link rel="stylesheet" href="css/footer.css">
</head>
<body>
<div class="footer" >
	<div class="wrap" id="foot">
		<div class="footer-top">
			<div class="col_1_of_4 span_1_of_4">
					<div class="footer-nav">
		                <ul>
		                   <li><a href="home.php?admin=<?php 
			            $admin=$_SESSION['a_user'];
			            echo $admin; ?>" style="text-decoration:none;">Home</a></li>
		                   <li><a href="admin_option.php"style="text-decoration:none;">Admin Options</a></li>
			  		   <!--<li><a href="movie_event.php" style="text-decoration:none;">Movies</a></li>-->
			  		   <li><a href="../log_sign.php" style="text-decoration:none;">Login</a></li>
			  		   <!--<li><a href="contact.html" style="text-decoration:none;">Contact us</a></li>-->

					</ul>
		              </div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class="textcontact">
						<p>Theatre Assistance<br>
						Online Movie Theatre Booking System<br>
						Ph: 8849259341<br>
						</p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class="call_info">
						<p class="txt_3">Call us toll free:</p>
						<p class="txt_4">8849259341</p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class=social>
						<a href="https://www.facebook.com/" target="_blank"><img src="images/fb.png" alt=""/></a>
						<a href="https://twitter.com/" target="_blank"><img src="images/tw.png" alt=""/></a>
						<a href="https://dribbble.com/" target="_blank"><img src="images/dribble.png" alt=""/></a>
						<a href="https://in.pinterest.com/" target="_blank"><img src="images/pinterest.png" alt=""/></a>
					</div>
				</div>
				<div class="clear"></div>
		</div>
	</div>
</div>
	<script>
		document.getElementById('foot').style.bottom="0px";
	</script>
</body>
</html>
