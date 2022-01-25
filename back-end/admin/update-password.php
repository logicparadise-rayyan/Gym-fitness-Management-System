<?php
include('../b-includes/header.php');
?>

<div class="main-content">
           <div class="wrapper">
             <h1>UPDATE ADMIN PASSWORD</h1>
             
             <br><br>

            <?php 

                if(isset($_GET['id'])){

                    $id = $_GET['id'];
                }
            ?>


             <form action="" method="POST">

                <table class="tbl-30">

                    <tr>
                        <td>Current Password:</td>
                        <td><input class="input-design" type="password" name="current_password" placeholder="Current Password"></td>
                    </tr>

                    
                    <tr>
                        <td>New Password:</td>
                        <td><input class="input-design" type="password" name="new_password"  placeholder="New Password"></td>
                    </tr>


                    <tr>
                        <td>Confirm Password:</td>
                        <td><input class="input-design" type="password" name="confirm_password"  placeholder="Confirm Password"></td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            
                         <input type="hidden" name="id" value="<?php echo $id; ?>">
                         <input type="submit" name="submit" value="Change Password" class="btn-secondary">

                        </td>
                        
                    </tr>

                </table>
             </form>
           </div>  
</div>

    <?php 
        //condition for checking submit value   
        if(isset($_POST['submit'])){

         //get the value from form
           $id = $_POST['id'];
           $current_password = md5($_POST['current_password']);
           $new_password = md5($_POST['new_password']);
           $confirm_password = md5($_POST['confirm_password']);

        //create a sql query to check wheather  the users are already registered or not
        $sql = "SELECT * FROM tbl_admin WHERE id='$id' AND password='$current_password'";
        
                
        //execute the query
        $res = mysqli_query($conn, $sql);

        //display the message
        if($res==TRUE){
            $count= mysqli_num_rows($res);
                if($count==1){
                    //user exists and password can be changed
                    if($new_password==$confirm_password){
                        //update user
                        $sql2 ="UPDATE tbl_admin SET 
                        password= '$new_password'
                        WHERE id='$id'
                        ";
                           $res2 = mysqli_query($conn , $sql2);

                           //if query is successful display messge
                           if($res2==TRUE){
                               //successful
                              $_SESSION['pwd-change'] = "<div class='success'>Password changed Successfully</div>";
                    
                              //Redirecting back to admin manger
                              header("location:".SITEURL.'../../back-end/admin/admin-manager.php');
                           }else{
                                  //unsuccessful
                              $_SESSION['pwd-change'] = "<div class='error'>failed to change password.Try again later</div>";
                    
                              //Redirecting back to admin manger
                              header("location:".SITEURL.'../../back-end/admin/admin-manager.php');
                           }
                        

                    }else{
                            //error message and redirect
                            $_SESSION['pwd-not-matched'] = "<div class='error'>The password does not match.</div>";
                        
                            //Redirecting back to admin manger
                            header("location:".SITEURL.'../../back-end/admin/admin-manager.php');
                    }



                }else{
                    //user does not exist and redirect 
                    $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                    
                    
                    //Redirecting back to admin manger
                    header("location:".SITEURL.'../../back-end/admin/admin-manager.php');

                }
        }
        else{
          
         }
        
        }

    ?>

<?php
include('../b-includes/footer.php');
?>