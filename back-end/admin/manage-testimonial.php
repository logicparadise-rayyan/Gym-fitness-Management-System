<?php
include('../b-includes/header.php');
?>

<div class="main-content">
           <div class="wrapper">
             <h1>Manage Testimonial</h1><br>

             <br><br>

                
           <?php

            if(isset($_SESSION['add-testimonial'])){
                echo $_SESSION['add-testimonial'];//displaying session message
                unset($_SESSION['add-testimonial']);//removing session message
            }

            if(isset($_SESSION['upload-testimonial'])){
                echo $_SESSION['upload-testimonial'];//displaying session message
                unset($_SESSION['upload-testimonial']);//removing session message
            }


           
            if(isset($_SESSION['remove-testimonial'])){
                echo  $_SESSION['remove-testimonial'];//displaying session message
                unset( $_SESSION['remove-testimonial']);//removing session message
            }


            if(isset($_SESSION['delete-testimonial'])){
                echo  $_SESSION['delete-testimonial'];//displaying session message
                unset( $_SESSION['delete-testimonial']);//removing session message
            }

            ?>

            <br><br>


             <a  href="../manage-content/add-testimonial.php"  class="btn-primary">Add Testimonial</a>
             <br><br><br>

<table class="tbl-full">
   <tr>
       <th>S.no</th>
       <th>Profile Pic</th>
       <th>Your Name</th>
       <th>Comment</th>
   </tr>

   
   <?php 
   $sql="SELECT * FROM  tbl_testimonial"; 
   
   //3. execute query and data into database
   $res = mysqli_query($conn,$sql) or die(mysqli_error());

    //4. to check wheathet the user exists or not
    $count = mysqli_num_rows($res);

        //check whether the quer is executed or not
        //check the number of rows
    if($count>0){
            //we have data in Db
             $sn = 1;
            while($rows = mysqli_fetch_assoc($res)){
               
            //using while loop to display all the data from database
            $id = $rows['id'];
            $testimonial_profile = $rows['testimonial_profile'];
            $testimonial_head = $rows['testimonial_head'];
            $testimonial_para = $rows['testimonial_para'];
                ?>
                <tr>
                    <td><?php echo $sn++ ."."; ?></td>
                    <td><?php echo $testimonial_head; ?></td>

                    <td><?php 
                    
                        if($testimonial_profile!=""){
                            //display image

                            ?>

                            <img src = "../b-images/testimonial-images/<?php echo $testimonial_profile; ?>" width="100px" height = "100px" alt = "img not found">
                            
                            <?php

                        }else{

                            echo "<div class ='error'> image not added</div>";
                        }
                    
                    
                    ?></td>
                    
                    <td><?php echo $testimonial_para; ?></td>
                    <td>
                        <a href="<?php echo SITEURL?>../../back-end/manage-content/delete-testimonial.php?id=<?php echo $id; ?>&image_name=<?php echo  $testimonial_profile; ?>" class="btn-danger">Delete this slider image</a>
                    </td>
                </tr>


                <?php
            } 
       }else{
           
       echo "<div class ='error'> No testimonial added</div>";
       //if there is no data in database
       }

         
        
   
   ?>

  
</table>
</div>

<?php
include('../b-includes/footer.php');
?>