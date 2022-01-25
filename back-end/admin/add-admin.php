<?php
include('../b-includes/header.php');
?>

<div class="main-content">
           <div class="wrapper">
             <h1>ADD ADMIN</h1><br><br><br>

    <?php

        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];//displaying session message
            unset($_SESSION['add']);//removing session message
        }
    ?>

             <form action="" method="POST">

                <table class="tbl-30">

                    <tr>
                        <td>full name:</td>
                        <td><input class="input-design" type="text" name="full_name" placeholder="enter your full name"></td>
                    </tr>

                    
                    <tr>
                        <td>username:</td>
                        <td><input class="input-design" type="text" name="username" placeholder="enter a username"></td>
                    </tr>

                    
                    <tr>
                        <td>password:</td>
                        <td><input class="input-design" type="password" name="password" placeholder="enter password"></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                        
                    </tr>

                </table>
             </form>
           </div>  
</div>

<?php
include('../b-includes/footer.php');
?>

<?php

    if(isset($_POST['submit'])){

        //1. get the data from form

        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);//md5 is password encryptionS

        //2. insert data into datebase

        $sql="INSERT INTO tbl_admin SET 
        full_name='$full_name',
        username='$username',
        password='$password'
        ";

       //3. execute query and data into database
       $res = mysqli_query($conn,$sql) or die(mysqli_error());

       //check wheather the query is executed
       if($res==TRUE){
           //create a session variable to display message
            
           $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
         
           //redirect page to admin manager

            header("location:".SITEURL.'../../back-end/admin/admin-manager.php');
       }
       else{
           //create a session variable to display message

            $_SESSION['add'] = "<div class='error'>Failed to add Admin</div>";

           //redirect page to admin manager

           header("location:".SITEURL.'../../back-end/admin/add-admin.php');
        }
       
    }

?>