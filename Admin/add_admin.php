<html>
    <head>
        <title>Add Admin</title>
        <link rel="stylesheet"  href="css/admin_option.css">
        <link rel="stylesheet" href="css/scroll_bar.css">
    </head>
<body>

<?php
require('_header.php');
?>
   <?php
    error_reporting(0); ini_set('display_errors', 0);
  require("../connection.php");
      ?>
       <div class="hero">
           <div class="contain"> 
           <div class="home_back">
               <a href="admin_option.php">&#8249; back </a> </div>
              
           <div class="form-box">
                  <form id="Register-Admin" name="frmContact" method="post" action="add_admin.php" class="input-group2">
                   <input type="text" name="username" class="input-field" placeholder="Username" required>
                   <input type="email" name="email" class="input-field" placeholder="Email Id" required>
                   <input type="text" name="c_phone_no" class="input-field" placeholder="Phone no" required>
                   <input type="password" name="password" class="input-field" placeholder="Password" required>
                   <button type="submit" name="register" class="submit-btn">Register Admin</button>
                   <?php
                        if(isset($_POST['register']))
                        {
                            // $con = mysqli_connect("localhost","root","","project");

                            if (mysqli_connect_errno()){
                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }
                            else
                            {
                                
                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                $c_phno=$_POST['c_phone_no'];  
                                
                                $query1="select *from admin where aname='$username';";
                                $cmd2=mysqli_query($con,$query1);
                                if(($row=mysqli_num_rows($cmd2))>0)
                                {
                                    echo "&#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205  &#8205 &#8205 &#8205 &#8205 &#8205  &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205";
                                    
                                    echo "Username Taken";
                                }
                                else{
                                    
                                $query2="INSERT INTO admin (aid,aname,a_cont_no,a_email,a_pass) VALUES (null,'$username','$c_phno','$email','$password');";
                                $rs= mysqli_query($con,$query2);
                                if($rs)
                                {
                                       echo "&#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205  &#8205 &#8205 &#8205 &#8205 &#8205  &#8205 &#8205 &#8205 &#8205 &#8205 &#8205 &#8205";
                                    echo "Admin Created";
                                    
                                }
                                }
                            }
                        }
                        ?>
                   
               </form>
           </div>
       </div>
       </div>
</body>
</html>
