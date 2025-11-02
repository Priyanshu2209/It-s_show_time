<html>
<head>
       <title>Reset Password</title>
       <link rel="stylesheet" href="css/resetpass.css">
       
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
       <?php
       session_start();

       if(isset($_GET['selector'])&&isset($_GET['validate']))
       {
           $check=$_GET['selector'];
           $validate=$_GET['validate'];
           $username=$_SESSION['cname'];
          
           $date=date("U");
           if($_SESSION['selector']==$check&&$_SESSION['validate']==$validate&&$_SESSION['exp']>=$date)
           {
            ?>
              <div class="hero">
           <div class="contain">
           <div class="form-box">
               <form name="resetmail" method="post" action="updatepass.php" class="input-group">
                   <input type="hidden" name="username" value="<?php echo $username; ?>">
                   <input type="text" name="pass" class="input-field" placeholder="Enter Password">
                   <input type="text" name="pass_again" class="input-field" placeholder="Enter Password Again">
                   <button type="submit" name="pwd_reset" class="submit-btn">Reset Password</button>
               </form>
              <?php

                if(isset($_GET['pass']))
                {
                    $error_pass=$_GET['pass'];

                    if($error_pass=="notsame")
                    {
                        ?>
                        <div class="message">Passwords are not same</div>
                        <?php
                    }
                }
               ?>
       </div>
       </div>
       </div> 
              <?php
           }
           else{
            header("location:resetmail.php?mail=exp");
            
           }
       }
       
        ?>
       
</body>
</html>