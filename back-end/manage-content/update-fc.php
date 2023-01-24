<?php
include('../b-includes/header.php');
?>

<div class="main-content">
           <div class="wrapper">
             <h1>UPDATE FITNESS CONTENT</h1>
             
             <br><br>

            <?php 
            
                //1. get the ID of the admin to be deleted
                $id = $_GET['id'];

                //2. create sql to select data from the database
                $sql = "SELECT * FROM fitness_content where id=$id";
                
                //execute the query
                $res = mysqli_query($conn, $sql);
                

                //check wheather the query is executed or not
                if($res==TRUE){
                   $count = mysqli_num_rows($res);
                   if($count==1){

                        //get the details of the admin
                        $row = mysqli_fetch_assoc($res);

                        //now after retrieving the data form database we will save it in variables
                        $fc_heading = $row['fc_heading'];
                        $fc_current_image_name = $row['fc_img_name'];
                        $fc_paragraph = $row['fc_paragraph'];
                        $fc_featured = $row['fc_featured'];
                        $fc_active = $row['fc_active'];


                   }else{

                      //session message if fetching or id is failed
                      $_SESSION['no-category-found'] = "<div class='error'>No Post Found</div>";
                       
                    //redirect to admin-manager page
                     header("location:".SITEURL.'../../back-end/admin/manage-fc.php');

                   }
                }
            ?>


                <form action="" method="POST" enctype="multipart/form-data">

                <table class="">

                <tr>
                    <td>Heading:</td>
                    <td><input class="input-design" type="text" name="fc_heading" value="<?php echo $fc_heading; ?>"></td>
                </tr>


                
                <tr>
                    <td>Current Image:</td>
                    <td>
                       <?php
                       
                        if($fc_current_image_name!=""){
                            ?>
                              <img src = "../b-images/fc-images/<?php echo $fc_current_image_name; ?>"  width="150px" height = "150px">
                            <?php

                        }else{
                            //image not availabe
                            echo "<div class='error'>image not found</div>";
                        }

                       ?>
                    </td>
                    
                </tr>


                <tr>
                    <td>New Image:</td>
                    <td>
                         <input type="file" name="fc_new_image_name">
                    </td>
                    
                </tr>


                <tr>
                
                    <td>
                    <label>Fitness content:</label>
                    <td><textarea name="fc_paragraph"   rows="10" cols = "50"> <?php echo  $fc_paragraph;?> </textarea></td>
                    </td>
                    
                </tr>


                <tr>
                    <td>featured:</td>
                    <td>
                        <input <?php if($fc_featured=="yes"){echo "checked";} ?> type="radio" name="fc_featured" value="yes">yes
                        <input <?php if($fc_featured=="no"){echo "checked";} ?> type="radio" name="fc_featured" value="no">no
                    </td>
                </tr>


                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if($fc_active=="yes"){echo "checked";} ?> type="radio" name="fc_active" value="yes">yes
                        <input <?php if($fc_active=="no"){echo "checked";} ?> type="radio" name="fc_active" value="no">no
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="$fc_current_img_name" value="<?php echo $fc_current_img_name; ?>">
                        <input type="submit" name="submit" value="Update Content" class="btn-secondary">
                    </td>
                    
                </tr>

                </table>
                </form>

           </div>  
</div>

    <?php  
        //1.  these are the new values from update fc page
        if(isset($_POST['submit'])){

         //get the value of all the variables
         $fc_heading = $_POST['fc_heading'];
         $fc_current_image_name = $_POST['fc_current_image_name'];
         $fc_paragraph = $_POST['fc_paragraph'];
         $fc_featured = $_POST['fc_featured'];
         $fc_active = $_POST['fc_active'];
        
            //2. check wheather the image is selected or not
            if(isset($_FILES['fc_new_image_name']['name']))
            {

                //upload the image
                $fc_new_image_name = $_FILES['fc_new_image_name']['name'];
            
                //if new image is not empty than update the new image
                if($fc_new_image_name !="")
                {

                        //auto generate image names
                        //explode them at end side at (.) extension
                        $ext = end(explode('.' , $fc_new_image_name ));

                        $fc_new_image_name = "fc".date('Y-m-d' , time()).'('.rand(000 , 999).')'.'.'.$ext;

                        //we will join it with date and a string
                        //format to display image name
                        //$fc_image_name = "fc".date('Y-m-d' , time()).'.'.$ext;

                        $source_path = $_FILES['fc_new_image_name']['tmp_name'];

                        $destination_path = "../b-images/fc-images/".$fc_new_image_name;

                        //finally upload the image
                        $upload = move_uploaded_file($source_path , $destination_path);
                    

                        //to check wheather the image is uploaded or not and redirect
                        if($upload==FALSE)
                        {
                            //create a session variable for error message
                            $_SESSION['upload'] = "<div class='error text-centre'>imge not uploaded</div>";

                            //redirect 
                            header("location:".SITEURL.'../../back-end/admin/manage-fc.php');

                            //stop the rest process
                            die();
                        }
                
                        if($fc_current_image_name!="")
                        {
                            //3. remove current image

                            //we will give path to image folder
                            $remove_path = "../b-images/fc-images/".$fc_current_image_name;

                            //remove the image
                            $remove = unlink($remove_path);//it will give boolean as output than we will use that to check wheather the image is removed or not
 
                            if($remove==false)
                            {
                                // session the error message
                                $_SESSION['current-img-remove'] = "<div class='error'>Failed to remove the current image.</div>";

                                //redirect to manage-fc page
                                header("location:".SITEURL.'../../back-end/admin/manage-fc.php');

                                //stop the process
                                die();
                            }
                        
                        
                        }

                        

                }
                else
                {

                    //repeat old image as new
                    $fc_new_image_name = $fc_current_image_name;
                }
                    
            }
            else
            {

                //if new image is not selected then we will put back the old image
                $fc_new_image_name = $fc_current_image_name;
            }


        //create a sql query to update the new data into database
        $sql2 = "UPDATE fitness_content SET 
         fc_heading = '$fc_heading',
         fc_img_name = '$fc_new_image_name',
         fc_paragraph = '$fc_paragraph',
         fc_featured = '$fc_featured',
         fc_active= '$fc_active'
         where id='$id'
         ";
                
        //execute the query
        $res2 = mysqli_query($conn, $sql2);

        //display the message
        if($res2==TRUE){
            //create a session variable to display message
             
            $_SESSION['update'] = "<div class='success'>Fitness post updated Successfully</div>";
          
            //redirect page to admin manager
 
             header("location:".SITEURL.'../../back-end/admin/manage-fc.php');
        }
        else{
            //create a session variable to display message
 
             $_SESSION['update'] = "<div class='error'>Failed to update post</div>";
 
            //redirect page to admin manager
 
            header("location:".SITEURL.'../../back-end/admin/manage-fc.php');
         }
        
        }

    ?>

<?php
include('../b-includes/footer.php');
?>