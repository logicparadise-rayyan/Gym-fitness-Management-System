<?php
include_once "../b-includes/header.php";
?>

<div class="main-content">
           <div class="wrapper">
             <h1>MANAGE FITNESS CONTENT PAGE</h1>

             <br><br><br>
             
             <?php

                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];//displaying session message
                        unset($_SESSION['add']);//removing session message
                    }

                    if(isset($_SESSION['remove'])){
                        echo $_SESSION['remove'];//displaying session message
                        unset($_SESSION['remove']);//removing session message
                    }

                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];//displaying session message
                        unset($_SESSION['delete']);//removing session message
                    }

                    if(isset($_SESSION['no-category-found'])){
                        echo $_SESSION['no-category-found'];//displaying session message
                        unset($_SESSION['no-category-found']);//removing session message
                    }


                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];//displaying session message
                        unset($_SESSION['update']);//removing session message
                    }

                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];//displaying session message
                        unset($_SESSION['upload']);//removing session message
                    }
                    
                    
                    if(isset($_SESSION['current-img-remove'])){
                        echo $_SESSION['current-img-remove'];//displaying session message
                        unset($_SESSION['current-img-remove']);//removing session message
                    }
                    
                    ?>
              <br><br>

             <a  href="../manage-content/add-fc.php"  class="btn-primary">New Post</a>
             
             <br><br><br>

<table class="tbl-full">
   <tr>
       <th>S.no</th>
       <th>Heading</th>
       <th>image name</th>
       <th>paragraph</th>
       <th>featured</th>
       <th>active</th>
   </tr>


   <?php 
   $sql="SELECT * FROM  fitness_content"; 
   
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
            $fc_image_name = $rows['fc_img_name'];
            $fc_heading = $rows['fc_heading'];
            $fc_active = $rows['fc_active'];
            $fc_featured = $rows['fc_featured'];
            $fc_paragraph = $rows['fc_paragraph'];

                ?>
                <tr>
                    <td><?php echo $sn++ ."."; ?></td>
                    <td><?php echo $fc_heading; ?></td>

                    <td><?php 
                    
                        if($fc_image_name!=""){
                            //display image

                            ?>

                            <img src = "../b-images/fc-images/<?php echo $fc_image_name; ?>" width="100px" height = "100px" alt = "img not found">
                            
                            <?php

                        }else{

                            echo "<div class ='error'> image not added</div>";
                        }
                    
                    
                    ?></td>
                    
                    <td><?php echo $fc_paragraph; ?></td>
                    <td><?php echo $fc_featured; ?></td>
                    <td><?php echo $fc_active; ?></td>
                    <td>
                        <a href="<?php echo SITEURL?>../../back-end/manage-content/update-fc.php?id=<?php echo $id; ?>&fc_image_name=<?php echo  $fc_image_name; ?>" class="btn-secondary">Update content</a>
                        <a href="<?php echo SITEURL?>../../back-end/manage-content/delete-fc.php?id=<?php echo $id; ?>&fc_image_name=<?php echo  $fc_image_name; ?>" class="btn-danger">Delete content</a>
                    </td>
                </tr>


                <?php
            }
       }else{
           
       echo "<div class ='error'> No Fitness content added</div>";
       //if there is no data in database
       }

         
        
   
   ?>

  
</table>
</div>

<?php
include_once "../b-includes/footer.php";
?>