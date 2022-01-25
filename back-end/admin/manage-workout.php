<?php
include('../b-includes/header.php');
?>

<div class="main-content">
           <div class="wrapper">
             <h1>WORKOUT</h1>

             <br><br>

                
           <?php

            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];//displaying session message
                unset($_SESSION['add']);//removing session message
            }

            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];//displaying session message
                unset($_SESSION['upload']);//removing session message
            }


           
            if(isset($_SESSION['remove-post'])){
                echo  $_SESSION['remove-post'];//displaying session message
                unset( $_SESSION['remove-post']);//removing session message
            }


            if(isset($_SESSION['delete-post'])){
                echo  $_SESSION['delete-post'];//displaying session message
                unset( $_SESSION['delete-post']);//removing session message
            }

            if(isset($_SESSION['update-post'])){
                echo  $_SESSION['update-post'];//displaying session message
                unset( $_SESSION['update-post']);//removing session message
            }


            ?>

            <br><br>


             <a  href="../manage-content/add-post.php"  class="btn-primary">New Workout</a>
             <br><br><br>

<table class="tbl-full">
   <tr>
       <th>S.no</th>
       <th>title</th>
       <th>image_name</th>
       <th>content</th>
   </tr>

   
   <?php 
   $sql="SELECT * FROM  tbl_post"; 
   
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
            $title = $rows['title'];
            $image_name = $rows['image_name'];
            $content = $rows['content'];
                ?>
                <tr>
                    <td><?php echo $sn++ ."."; ?></td>
                    <td><?php echo $title; ?></td>

                    <td><?php 
                    
                        if($image_name!=""){
                            //display image

                            ?>

                            <img src = "../b-images/post-images/<?php echo $image_name; ?>" width="100px" height = "100px" alt = "img not found">
                            
                            <?php

                        }else{

                            echo "<div class ='error'> image not added</div>";
                        }
                    
                    
                    ?></td>
                    
                    <td><?php echo $content; ?></td>
                    <td>
                        <a href="<?php echo SITEURL?>../../back-end/manage-content/update-post.php?id=<?php echo $id; ?>&image_name=<?php echo  $image_name; ?>" class="btn-secondary">Update post</a>
                        <a href="<?php echo SITEURL?>../../back-end/manage-content/delete-post.php?id=<?php echo $id; ?>&image_name=<?php echo  $image_name; ?>" class="btn-danger">Delete post</a>
                    </td>
                </tr>


                <?php
            } 
       }else{
           
       echo "<div class ='error'> No post added</div>";
       //if there is no data in database
       }

         
        
   
   ?>

  
</table>
</div>

<?php
include('../b-includes/footer.php');
?>