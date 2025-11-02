<?php
    session_start();
        require('connection.php');
  
    if (isset($_POST['Login']))
     {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        //Check Admin
        $query    = "SELECT * FROM admin WHERE aname='$username'
                     AND a_pass='$password' OR a_email='$username' AND a_pass='$password';";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
          $row2=mysqli_fetch_array($result);
        
        //Check Customer
        $query2    = "SELECT * FROM customer WHERE cname='$username'
                     AND c_pass='$password'OR c_email='$username' AND c_pass='$password';";
        $result2 = mysqli_query($con, $query2);
        $rows2 = mysqli_num_rows($result2);
        $row=mysqli_fetch_array($result2);

        $user=$row['cname'];
        $id=$row['cid'];
        $admin=$row2['aname'];
        if ($rows == 1) {
            // Redirect to user Admin page
            $_SESSION['a_user']=$admin;
            header("Location: Admin/home.php?admin=$admin");
        } 
        elseif ($rows2 == 1) {
           $_SESSION['c_user']=$user;
           $_SESSION['c_id']=$id;
            // Redirect to home page
            header("Location: index.php?");
        } 
    
        else {
            header('Location:log_sign.php?login=invalid');
        }
    }
?>