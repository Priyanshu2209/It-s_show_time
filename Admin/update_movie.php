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
               <h2>Edit Details</h2>
                   <?php if(isset($_GET['movie']))
                   {
                      require("../connection.php");
                      $id=$_GET['movie'];
                      $query="select *from movie where m_no='$id'";
                      $cmd=mysqli_query($con,$query);

                      while($row=mysqli_fetch_array($cmd))
                      {
                            $m_name=$row['m_name'];
                            $m_dim=$row['m_dimension'];
                            $m_lang=$row['m_language'];
                            $m_min=$row['m_min'];
                            $m_hr=$row['m_hr'];
                            $m_pic=$row['m_pic'];
                       ?>
                    <form  id="Update" name="frm-Contact" method="post" enctype="multipart/form-data" action="updation_movie.php" class="input-group">

                   <input type="hidden" name="id" class="input-field" value="<?php echo $id; ?>" >
                   <h3>movie:</h3><input type="text" name="m_name" class="input-field" value="<?php echo $m_name; ?>" >
                <h3>dimantion:</h3><input type="text" name="m_dim" class="input-field" value="<?php echo $m_dim; ?>" >
                 <h3>language:</h3><input type="text" name="m_lang" class="input-field" value="<?php echo $m_lang; ?>" >
                  <h3>hr:</h3> <input type="text" name="m_hr" class="input-field"  value="<?php echo $m_hr; ?>" >
                    <h3>min:</h3> <input type="text" name="m_min" class="input-field"  value="<?php echo $m_min; ?>" >
                   
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
