<?php
 include('../db_connection/db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../back-css/b-style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
       <div class="screen">
        <div class="mobile">
            <h1 class= " click-me position" >click on picture</h1>
            <img class="iphone position" src="../../front-end/images/iphone.png" alt="not found">
             <img id="instafeed"  class=" feed position" src="../../front-end/images/man-jump-ball.jpg" alt="not found">
             <img id="instafeed2"  class=" cake position" src="../../front-end/images/bicep-curl-men.jpg" alt="not found">
          
        </div>
        <div class="login_page">
           <img class="logo" src="../../front-end/images/main-logo.png" alt="not found"><br><br>

           <?php 
           
                if(isset($_SESSION['login'])){
                    echo  $_SESSION['login'];
                    unset ($_SESSION['login']);
                }
                
                
                if(isset($_SESSION['no-login-message'])){
                    echo  $_SESSION['no-login-message'];
                    unset ($_SESSION['no-login-message']);
                }
                
           ?>

           <form action="" method="POST">
                <div class="info">

                    <div class="username">
                        <input type="text" placeholder="username"  name="username">
                    </div>

                    <div class="password">
                        <input type="password" placeholder="password"  name="password">
                    </div>

                    <div>
                    <input type="submit" name="submit" value="LOG IN" class="log_in">
                    </div>

                </div>
            </form>
        </div>
       </div>
    </div>
    <script src="../../front-end/javascript/script.js"></script>
</body>
</html>

<?php

if(isset($_POST['submit'])){
    //process for loging inn an admin
    //1. get the data from form

    $username=$_POST['username'];
    $password=md5($_POST['password']);//md5 is password encryptionS

    //2. insert data into datebase

    $sql="SELECT * FROM  tbl_admin WHERE username = '$username' AND password = '$password'"; 
   
   //3. execute query and data into database
   $res = mysqli_query($conn,$sql) or die(mysqli_error());

    //4. to check wheathet the user exists or not
    $count = mysqli_num_rows($res);

    if($count==1){

        //log inn the user
        //create a session variable to display message 
        $_SESSION['login'] = "<div class='success'>You Are Logged Inn Successfully</div>";
        $_SESSION['user'] = $username; //helps to check wheather the user is logged inn or not(Take reference from logout page)
         
        //redirect page to admin manager
        header("location:".SITEURL.'../../back-end/admin/');

    }else{

        //user not found
        //create a session variable to display message 
        $_SESSION['login'] = "<div class='error text-centre'>Incorrect Username/Password.</div>";
         
        //redirect page to admin manager
        header("location:".SITEURL.'../../back-end/admin/login.php');
    }
}
?>