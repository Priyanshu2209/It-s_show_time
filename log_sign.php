<html>
<head>
       <title>Login And Registration Form</title>
       <link rel="stylesheet" href="css/log_sign.css">
       
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
                   <div class="button-box">
                       <div id="btn"></div>
                           <button type="button" class="toggle-btn" onclick="Login()">Login</button>
                       
                           <button type="button" class="toggle-btn" onclick="Register()">Register</button>                     
                   </div>
                  
               <form id="Login" name="frm-Contact" method="post" action="log.php" class="input-group">
                   <input type="text" name="username" class="input-field" placeholder="User name or Email" required >
                   <input type="password" name="password" class="input-field" placeholder="Password" required >
                   <button type="submit" name="Login" class="submit-btn">Login</button>
                   <a href="resetmail.php"><div class="forgot_">Forgot Password?</div></a>
               </form>
               
               <?php 
                   if(isset($_GET['login']))
                   {
                       $error=$_GET['login'];
                       if($error=="invalid")
                       {
                        ?>
                        <div class="message" id="error_login_">Please try again..&#128077</div>
                        <?php
                        }

                        elseif($error=="success")
                        {
                           ?>                     
                               <div class="message_" id="error_login_">sign up successfully &#128519</div>
                            <?php
                        }
                        
                    }
                    elseif(isset($_GET['forgot']))
                    {
                        $msg=$_GET['forgot'];
                        if($msg=="done")
                        {
                            ?>                     
                            <div class="message_" id="error_login_">Password reset successfully &#128519</div>
                          <?php   
                        }
                    }                  
                    else
                    {?>
                        <div class="message" id="error_login_"></div>
                        
                        <?php
                    }
                    
                    ?>
               
               <form id="Register" name="frmContact" method="post" action="db.php" class="input-group2">
                   <input type="text" name="username" class="input-field" placeholder="User name" required>
                   <input type="email" name="email" class="input-field" id="email_id" placeholder="Email Id" required>
                   <input type="text" name="c_phone_no" class="input-field" placeholder="Phone no" required>
                   <input type="password" name="password" class="input-field" placeholder="Password" required>
             
                   <button type="submit" name="register" class="submit-btn" >Register</button>
               </form>

               <?php 

                       
                    if(isset($_GET['signup']))
                    {
                        $error=$_GET['signup'];

                        if($error=="sameuser")
                        {
                            ?>
                            <div class="message_" id="error_sign">username is taken..&#128577</div>
                        
                        <?php 
                         echo "<script src='signup.js'></script>";
                        }  
                         if($error=="samemail")
                        {
                            ?>
                            <div class="message" id="error_sign">mail is taken..&#128577</div>
                        
                        <?php 
                         echo "<script src='signup.js'></script>";
                        }  
                        if($error=="create")
                        {
                            echo "<script src='signup.js'></script>";
                        }   
                        if($error=="sent")
                        {
                            ?>
                            <div class="message" id="error_sign">Check your mail</div>
                        
                        <?php 
                         echo "<script src='signup.js'></script>";
                        }

                    }
                    else if(isset($_GET['verify']))
                    {
                        $msg=$_GET['verify'];
                        if($msg=="true")
                        {
                            ?>                     
                               <div class="message_" id="error_login_">sign up successfully &#128519</div>
                            <?php
                        }
                        
                    }
                    else
                    {?>
                        <div class="message_" id="error_sign"></div>
                        <?php
                    }
                     ?>
           </div>
       </div>
       </div>
       <script>

           var x= document.getElementById("Login"); 
           var y= document.getElementById("Register");         
           var z= document.getElementById("btn");
           var es= document.getElementById("error_sign");
           var erl=document.getElementById("error_login_");
         
           function Login(){
               x.style.left = "50px";
               y.style.left = "450px";
               z.style.left = "00px";
               erl.style.left="50px";
             es.style.left="450px";
             
           }
          
           function Register(){
               x.style.left = "-450px";
               y.style.left = "50px";
               z.style.left = "100px";
               es.style.left="50px";
               erl.style.left="-450px";
           }
 </script>

 
</body>
</html>