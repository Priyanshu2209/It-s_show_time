<html>
<head>
       <title>Choose Image</title>
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
               <h2>Update Image</h2>
                   <?php if(isset($_GET['movie']))
                   {
                      require("../connection.php");
                      $id=$_GET['movie'];
                      $query="select *from movie where m_no='$id'";
                      $cmd=mysqli_query($con,$query);

                      while($row=mysqli_fetch_array($cmd))
                      {
                            $m_pic=$row['m_pic'];
                       ?>
                    <form  id="Update" name="frm-Contact" method="post" enctype="multipart/form-data" action="updation_pic.php?movie=<?php echo $id; ?>" class="input-group">
                   <input type="file" name="pic" class="input-field">
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
