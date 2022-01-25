<?php
include('../b-includes/header.php');
?>

<div class="main-content">
           <div class="wrapper">
             <h1>New Slider Images</h1><br>
             <p>NOTE: Only add Horizontal oriented Images.vertical images will distort.<p>

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


           
            if(isset($_SESSION['remove-slider'])){
                echo  $_SESSION['remove-slider'];//displaying session message
                unset( $_SESSION['remove-slider']);//removing session message
            }


            if(isset($_SESSION['delete-slider'])){
                echo  $_SESSION['delete-slider'];//displaying session message
                unset( $_SESSION['delete-slider']);//removing session message
            }

            ?>

            <br><br>


             <a  href="../manage-content/add-slider.php"  class="btn-primary">New Slider Images</a>
             <br><br><br>

<table class="tbl-full">
   <tr>
       <th>S.no</th>
       <th>heading</th>
       <th>Paragraph</th>
       <th>image</th>
   </tr>

   
   <?php 
   $sql="SELECT * FROM  tbl_slider"; 
   
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
            $slider_head = $rows['slider_head'];
            $slider_paragraph = $rows['slider_paragraph'];
            $slider_image = $rows['slider_image'];
                ?>
                <tr>
                    <td><?php echo $sn++ ."."; ?></td>
                    <td><?php echo $slider_head; ?></td>

                    <td><?php 
                    
                        if($slider_image!=""){
                            //display image

                            ?>

                            <img src = "../b-images/slider-images/<?php echo $slider_image; ?>" width="100px" height = "100px" alt = "img not found">
                            
                            <?php

                        }else{

                            echo "<div class ='error'> image not added</div>";
                        }
                    
                    
                    ?></td>
                    
                    <td><?php echo $slider_paragraph; ?></td>
                    <td>
                        <a href="<?php echo SITEURL?>../../back-end/manage-content/delete-slider.php?id=<?php echo $id; ?>&slider_image=<?php echo  $slider_image; ?>" class="btn-danger">Delete this slider image</a>
                    </td>
                </tr>


                <?php
            } 
       }else{
           
       echo "<div class ='error'> No slider added</div>";
       //if there is no data in database
       }

         
        
   
   ?>

  
</table>
</div>

<?php
include('../b-includes/footer.php');
?>