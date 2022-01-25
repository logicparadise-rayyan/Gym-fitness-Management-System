<?php
include('../b-includes/header.php');
?>

<div class="main-content">
           <div class="wrapper">
             <h1>UPDATE POST</h1>
             
             <br><br>

            <?php 
            
                //1. get the ID of the admin to be deleted
                $id = $_GET['id'];

                //2. create sql to select data from the database
                $sql = "SELECT * FROM tbl_post where id=$id";
                
                //execute the query
                $res = mysqli_query($conn, $sql);
                

                //check wheather the query is executed or not
                if($res==TRUE){
                   $count = mysqli_num_rows($res);
                   if($count>0){

                        //get the details of the admin
                        $row = mysqli_fetch_assoc($res);

                        //now after retrieving the data form database we will save it in variables
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $content = $row['content'];

                   }else{

                      //session message if fetching or id is failed
                      $_SESSION['no-post-found'] = "<div class='error'>No Post Found</div>";
                       
                    //redirect to admin-manager page
                     header("location:".SITEURL.'../../back-end/admin/manage-workout.php');

                   }
                }
            ?>


                <form action="" method="POST" enctype="multipart/form-data">

                <table class="">

                <tr>
                    <td>title:</td>
                    <td><input class="input-design" type="text" name="title" value="<?php echo $title; ?>"></td>
                </tr>


                
                <tr>
                    <td>Current Image:</td>
                    <td>
                       <?php
                       
                        if($image_name!=""){
                            ?>
                              <img src = "../b-images/post-images/<?php echo $image_name; ?>"  width="150px" height = "150px">
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
                         <input type="file" name="new_image_name">
                    </td>
                    
                </tr>


                <tr>
                
                    <td>
                    <label>content:</label>
                    <td><textarea name="content"   rows="10" cols = "50"> <?php echo  $content;?> </textarea></td>
                    </td>
                    
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="$image_name" value="<?php echo $image_name; ?>">
                        <input type="submit" name="submit" value="Update Content" class="btn-secondary">
                    </td>
                    
                </tr>

                </table>
                </form>

           </div>  
</div>

    <?php  
        //1.  these are the new values from update workout page
        if(isset($_POST['submit'])){

         //get the value of all the variables
         $title = $_POST['title'];
         $new_image_name = $_POST['new_image_name'];
         $content = $_POST['content'];
        
        

        
        
            //2. check wheather the image is selected or not
            if(isset($_FILES['new_image_name']['name']))
            {

                //upload the image
                $new_image_name = $_FILES['new_image_name']['name'];
            
                //if new image is not empty than update the new image
                if($new_image_name !="")
                {

                        //auto generate image names
                        //explode them at end side at (.) extension
                        $ext = end(explode('.' , $new_image_name ));

                        $new_image_name = "fc".date('Y-m-d' , time()).'('.rand(000 , 999).')'.'.'.$ext;

                        //we will join it with date and a string
                        //format to display image name
                        //$fc_image_name = "fc".date('Y-m-d' , time()).'.'.$ext;

                        $source_path = $_FILES['new_image_name']['tmp_name'];

                        $destination_path = "../b-images/post-images/".$new_image_name;

                        //finally upload the image
                        $upload = move_uploaded_file($source_path , $destination_path);
                    

                        //to check wheather the image is uploaded or not and redirect
                        if($upload==FALSE)
                        {
                            //create a session variable for error message
                            $_SESSION['upload'] = "<div class='error text-centre'>imge not uploaded</div>";

                            //redirect 
                            header("location:".SITEURL.'../../back-end/admin/manage-workout.php');

                            //stop the rest process
                            die();
                        }
                
                        if($image_name!="")
                        {
                            //3. remove current image
                             //we will get the current img by the variable we passed in manage admin 
                             $image_name = $_GET['image_name'];

                            //we will give path to image folder
                            $remove_path = "../b-images/post-images/".$image_name;

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
                    $new_image_name = $image_name;
                }
                    
            }
            else
            {

                //if new image is not selected then we will put back the old image
                $new_image_name = $image_name;
            }


        //create a sql query to update the new data into database
        $sql2 = "UPDATE tbl_post SET 
         title = '$title',
         image_name = '$new_image_name',
         content= '$content'
         where id='$id'
         ";
                
        //execute the query
        $res2 = mysqli_query($conn, $sql2);

        //display the message
        if($res2==TRUE){
            //create a session variable to display message
             
            $_SESSION['update-post'] = "<div class='success'> post updated Successfully</div>";
          
            //redirect page to admin manager
 
             header("location:".SITEURL.'../../back-end/admin/manage-workout.php');
        }
        else{
            //create a session variable to display message
 
             $_SESSION['update-post'] = "<div class='error'>Failed to update post</div>";
 
            //redirect page to admin manager
 
            header("location:".SITEURL.'../../back-end/admin/manage-workout.php');
         }
        
        }

    ?>

<?php
include('../b-includes/footer.php');
?>