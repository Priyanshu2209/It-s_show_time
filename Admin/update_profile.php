<html>
<head>
       <title>Login And Registration Form</title>
       <link rel="stylesheet" href="css\update_profile.css">
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
                      require("../connection.php");
                      $id=$_GET['id'];
                      $query="select *from admin where aid='$id'";
                      $cmd=mysqli_query($con,$query);

                      while($row=mysqli_fetch_array($cmd))
                      {
                            $aname=$row['aname'];
                            $a_cont_no=$row['a_cont_no'];
                            $a_email=$row['a_email'];
                      
                       ?>
                    <form  id="Update" name="frm-Contact" method="post" action="updation_profile.php?id=<?php echo $id; ?>" class="input-group">

                   <input type="hidden" name="id" class="input-field" value="<?php echo $id; ?>" >
                   <input type="text" name="aname" class="input-field" value="<?php echo $aname; ?>" >
                   <input type="text" name="a_cont_no" class="input-field" value="<?php echo $a_cont_no; ?>" >
                   <input type="email" name="a_email" class="input-field" value="<?php echo $a_email; ?>" >
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
