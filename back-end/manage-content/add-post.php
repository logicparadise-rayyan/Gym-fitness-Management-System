<?php
include('../b-includes/header.php');
?>

<div class="main-content">
           <div class="wrapper">
             <h1>ADD POST</h1><br><br>
           

           <?php

                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];//displaying session message
                    unset($_SESSION['add']);//removing session message
                }

                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];//displaying session message
                    unset($_SESSION['upload']);//removing session message
                }
           ?>


                <form action="" method="POST" enctype="multipart/form-data">

                    <table class="">

                        <tr>
                            <td>Add Title:</td>
                            <td><input class="input-design text-centre" type="text" name="title" placeholder="title"></td>
                        </tr>

                    

                        <tr>
                            <td>Select Image:</td>
                            <td>
                                
                                <div class="image-preview" id="imagePreview">
                                    <img src="" alt="image preview" class="image-preview__image">
                                    <span  class="image-preview__default-text">image preview<br>475 X 650</span>
                                </div>
                                <br>
                                <input type="file" name="image_name" id="inpFile">
                                <br><br><br>

                            </td>
                        </tr>


                        <tr>
                        
                            <td>
                            <label>content:</label>
                            <td><textarea name="content" rows="10" cols = "50"></textarea></td>
                            </td>
                            
                        </tr>


                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Update Post" class="btn-secondary">
                            </td>
                            
                        </tr>

                    </table>
               </form>
    </div>

</div>


        <?php

            if(isset($_POST['submit'])){

                //1. get the data from form

                $title=$_POST['title'];
                $content=$_POST['content'];
                $image_name=$_POST['image_name'];

                //check wheather the image is selected or not
                if(isset($_FILES['image_name']['name'])){

                        //upload the image
                        $image_name = $_FILES['image_name']['name'];
                    
                       //only upload if image is selected
                       if($image_name!=""){
                       
                            //auto generate image names
                            //explode them at end side at (.) extension
                            $ext = end(explode('.' , $image_name ));

                            $image_name = "fc".date('Y-m-d' , time()).'('.rand(000 , 999).')'.'.'.$ext;

                            //we will join it with date and a string
                            //format to display image name
                            //$fc_image_name = "fc".date('Y-m-d' , time()).'.'.$ext;

                            $source_path = $_FILES['image_name']['tmp_name'];

                            $destination_path = "../b-images/post-images/".$image_name;

                            //finally upload the image
                            $upload = move_uploaded_file($source_path , $destination_path);
                        

                            //to check wheather the image is uploaded or not and redirect
                            if($upload==FALSE){
                                //create a session variable for error message
                                $_SESSION['upload'] = "<div class='error text-centre'>imge not uploaded</div>";

                                //redirect 
                                header("location:".SITEURL.'../../back-end/admin/manage-workout.php');

                                //stop the rest process
                                die();

                            }
                        }
                            
                }else{

                    //if image is not selected do not upload the image and set the vale to empty
                    $image_name = "";
                }
     
                   

                //3.. insert data into datebase

                $sql="INSERT INTO tbl_post SET 
                title='$title',
                image_name='$image_name',
                content='$content'
                ";

                //3. execute query and data into database
                $res = mysqli_query($conn , $sql) or die(mysqli_error());

                    
                //4. check wheather the query ius executed or not
                if($res==TRUE){
                    //create a session variable to display message
                    $_SESSION['add'] = "<div class='success'> content uploaded successfully</div>";
                
                    //redirect page to admin manager
                    header("location:".SITEURL.'../../back-end/admin/manage-workout.php');
                }
                else{
                    //create a session variable to display message
                    $_SESSION['add'] = "<div class='error'>Failed to upload the content</div>";
        
                    //redirect page to admin manager
                    header("location:".SITEURL.'../../back-end/manage-content/add-post.php');
                }
           }
        ?>
<?php
include('../b-includes/footer.php');
?>

