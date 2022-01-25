<?php
include('../b-includes/header.php');
?>

<div class="main-content">
           <div class="wrapper">
             <h1>UPDATE ADMIN</h1>
             
             <br><br>

            <?php 
            
                //1. get the ID of the admin to be deleted
                $id = $_GET['id'];

                //2. create sql to select data from the database
                $sql = "SELECT * FROM tbl_admin where id=$id";
                
                //execute the query
                $res = mysqli_query($conn, $sql);
                

                //check wheather thebquery is executed or not
                if($res==TRUE){
                   $count = mysqli_num_rows($res);
                   if($count==1){

                    //get the details of the admin
                    $row = mysqli_fetch_assoc($res);

                    //now after retrieving the data form database we will save it in variables
                    $full_name = $row['full_name'];
                    $username = $row['username'];


                   }else{
                       
                    //redirect to admin-manager page
                     header("location:".SITEURL.'../../back-end/admin/admin-manager.php');

                   }
                }
            ?>


             <form action="" method="POST">

                <table class="tbl-30">

                    <tr>
                        <td>full name:</td>
                        <td><input class="input-design" type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                    </tr>

                    
                    <tr>
                        <td>username:</td>
                        <td><input class="input-design" type="text" name="username" value="<?php echo $username; ?>"></td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            
                         <input type="hidden" name="id" value="<?php echo $id; ?>">
                         <input type="submit" name="submit" value="Upadte Admin" class="btn-secondary">

                        </td>
                        
                    </tr>

                </table>
             </form>
           </div>  
</div>

    <?php 
        //condition for checking submit value   
        if(isset($_POST['submit'])){

         //get the value of all the variables
           $id = $_POST['id'];
           $full_name = $_POST['full_name'];
           $username = $_POST['username'];

        //create a sql query to update the new data into database
        $sql = "UPDATE tbl_admin SET 
         full_name = '$full_name',
         username = '$username'
         where id='$id'
         ";
                
        //execute the query
        $res = mysqli_query($conn, $sql);

        //display the message
        if($res==TRUE){
            //create a session variable to display message
             
            $_SESSION['update'] = "<div class='success'>Admin updated Successfully</div>";
          
            //redirect page to admin manager
 
             header("location:".SITEURL.'../../back-end/admin/admin-manager.php');
        }
        else{
            //create a session variable to display message
 
             $_SESSION['update'] = "<div class='error'>Failed to update Admin</div>";
 
            //redirect page to admin manager
 
            header("location:".SITEURL.'../../back-end/admin/admin-manager.php');
         }
        
        }

    ?>

<?php
include('../b-includes/footer.php');
?>