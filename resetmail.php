<html>
<head>
       <title>Reset password mail</title>
       <link rel="stylesheet" href="css/resetmail.css">
       
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
                <p class="message">Enter the email address on which the password rest instructions will be sent..&#9993</p>
               <form name="resetmail" method="post" action="forgot.php" class="input-group">
                   <input type="mail" name="sentmail" class="input-field" placeholder="Enter Email">
                   <button type="submit" name="checkmail" class="submit-btn">Send</button>
               </form>
               
               <?php 
                   if(isset($_GET['mail']))
                   {
                       $error=$_GET['mail'];
                       if($error=="send")
                       {
                        ?>
                        <div class="msg" >Mail sent successfully &#128077</div>
                        <?php
                        }
                        elseif($error=="notsend")
                        { 
                            ?>         
                            <div class="error_msg" >Mail not sent</div>            
                            <?php
                        }
                        elseif($error=="incorrect")
                        {
                           ?>         
                        <div class="error_msg" >* Incorrect mail *</div>            
                            <?php
                        }
                        elseif($error=="exp")
                        {
                           ?>         
                        <div class="error_msg" >*Timed out, send again &#129301*</div>            
                            <?php
                        }
                    }
               ?>
       </div>
       </div>
       
</body>
</html>