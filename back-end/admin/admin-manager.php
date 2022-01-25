<?php
include('../b-includes/header.php');
?>


<div class="main-content">
           <div class="wrapper">
             <h1>ADMIN MANAGER</h1>

             <br><br>           

             <?php
             
             if(isset($_SESSION['add'])){
              echo  $_SESSION['add'];//displaying session message
              unset ($_SESSION['add']);//removing session message
            }

            if(isset($_SESSION['delete'])){
                echo  $_SESSION['delete'];
                unset ($_SESSION['delete']);
              }


              if(isset($_SESSION['update'])){
                echo  $_SESSION['update'];
                unset ($_SESSION['update']);
              }


              if(isset($_SESSION['user-not-found'])){
                echo  $_SESSION['user-not-found'];
                unset ($_SESSION['user-not-found']);
              }


              if(isset($_SESSION['pwd-not-matched'])){
                echo  $_SESSION['pwd-not-matched'];
                unset ($_SESSION['pwd-not-matched']);
              }

              if(isset($_SESSION['pwd-change'])){
                echo  $_SESSION['pwd-change'];
                unset ($_SESSION['pwd-change']);
              }

          ?>

      

        <br><br><br>

            <!-- button to add an admin-->
            <a  href="../admin/add-admin.php"  class="btn-primary">Add Admin</a><br><br><br>

             <table class="tbl-full">
                <tr>
                    <th>S.no</th>
                    <th>Full Name</th>
                    <th>username</th>
                    <th>Actions</th>
                </tr>


                
                <?php
                //query to display data from database
                 $sql = "SELECT * FROM tbl_admin";

                 //exectute the query
                 $res = mysqli_query($conn, $sql);

                 //check whether the quer is executed or not
                 if($res==TRUE){

                     //count rows to check whether there is data in the database
                     $count = mysqli_num_rows($res);//function to get all rows in database
                    $sn = 1;
                     //check the number of rows
                     if($count>0){
                        //we have data in Db
                        while($rows = mysqli_fetch_assoc($res))
                        {

                            //using while loop to display all the data from database
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];
                        
                           //displaying the data in tables
                                                             
                           ?>
                      
                                            
                                <tr>
                                    <td><?php echo $sn++ ."."; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                       <a href="<?php echo SITEURL?>../../back-end/admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                       <a href="<?php echo SITEURL?>../../back-end/admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                       <a href="<?php echo SITEURL?>../../back-end/admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>


                      <?php
                        } 

                     }
                     else
                     {
                        //we dont have data in db
                        echo "<div class='error'>no data found in Database.</div>";

                     }
                 }
                ?>

             </table>
           </div>
</div>

<?php
include('../b-includes/footer.php');
?>



