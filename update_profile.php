<html>
<head>
       <title>Login And Registration Form</title>
       <link rel="stylesheet" href="css/update_profile.css">
       <style>
           ::placeholder {
             color: white;
             opacity: 1; 
           }
           
           :-ms-input-placeholder { 
            color: white;
           }
           
           ::-ms-input-placeholder { 
            color: white;
           }
           </style>

   </head>
   <body>
       <div class="hero">
           <div class="contain">
           <div class="form-box">
               <h2>Edit Profile</h2>
                   <?php if(isset($_GET['id']))
                   {
                      require("connection.php");
                      $id=$_GET['id'];
                      $query="select *from customer where cid='$id'";
                      $cmd=mysqli_query($con,$query);

                      while($row=mysqli_fetch_array($cmd))
                      {
                            $cname=$row['cname'];
                            $c_cont_no=$row['c_cont_no'];
                            $c_email=$row['c_email'];
                      
                       ?>
                    <form  id="Update" name="frm-Contact" method="post" action="updation_profile.php" class="input-group">

                   <input type="hidden" name="cid" class="input-field" value="<?php echo $id; ?>" >
                   <input type="text" name="cname" class="input-field" value="<?php echo $cname; ?>" >
                   <input type="text" name="c_cont_no" class="input-field" value="<?php echo $c_cont_no; ?>" >
                   <input type="email" name="c_email" class="input-field" value="<?php echo $c_email; ?>" >
                   <button type="submit" name="Update" class="submit-btn">Update</button>
                  <?php 
                      }
                    } 
                    ?>
               </form>
           </div>
       </div>
       </div>
   
</body>

</html>
