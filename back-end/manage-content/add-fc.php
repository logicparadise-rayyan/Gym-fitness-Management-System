<?php
include('../b-includes/header.php');
?>

<div class="main-content">
           <div class="wrapper">
             <h1>ADD FITNESS CONTENT</h1><br><br><br>
           

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
                    <td>Heading:</td>
                    <td><input class="input-design" type="text" name="fc_heading" placeholder="Heading"></td>
                </tr>

                

                <tr>
                    <td>Select Image:</td>
                    <td>
                        
                        <div class="image-preview" id="imagePreview">
                            <img src="" alt="image preview" class="image-preview__image">
                            <span  class="image-preview__default-text">image preview<br>475 X 650</span>
                        </div>
                        <br>
                        <input type="file" name="fc_image_name" id="inpFile">
                        <br><br><br>

                    </td>
                </tr>



                <tr>
                
                    <td>
                    <label>Fitness content:</label>
                    <td><textarea name="fc_paragraph" rows="10" cols = "50"></textarea></td>
                    </td>
                    
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Content" class="btn-secondary">
                    </td>
                    
                </tr>

            </table>
        </form>
        
    </div>

</div>

        <?php

            if(isset($_POST['submit'])){

                //1. get the data from form

                $fc_heading=$_POST['fc_heading'];
                $fc_paragraph=$_POST['fc_paragraph'];

               
                //check wheather the image is selected or not
                if(isset($_FILES['fc_image_name']['name'])){

                        //upload the image
                        $fc_image_name = $_FILES['fc_image_name']['name'];
                    
                       //only upload if image is selected
                       if($fc_image_name!=""){
                       
                            //auto generate image names
                            //explode them at end side at (.) extension
                            $ext = end(explode('.' , $fc_image_name ));

                            $fc_image_name = "fc".date('Y-m-d' , time()).'('.rand(000 , 999).')'.'.'.$ext;

                            //we will join it with date and a string
                            //format to display image name
                            //$fc_image_name = "fc".date('Y-m-d' , time()).'.'.$ext;

                            $source_path = $_FILES['fc_image_name']['tmp_name'];

                            $destination_path = "../b-images/fc-images/".$fc_image_name;

                            //finally upload the image
                            $upload = move_uploaded_file($source_path , $destination_path);
                        

                            //to check wheather the image is uploaded or not and redirect
                            if($upload==FALSE){
                                //create a session variable for error message
                                $_SESSION['upload'] = "<div class='error text-centre'>imge not uploaded</div>";

                                //redirect 
                                header("location:".SITEURL.'../../back-end/admin/manage-fc.php');

                                //stop the rest process
                                die();

                        }
                    }
                            
                }else{

                    //if image is not selected do not upload the image and set the vale to empty
                    $fc_image_name = "";
                }
     
                   

                //3.. insert data into datebase

                $sql="INSERT INTO fitness_content SET 
                fc_heading='$fc_heading',
                fc_img_name='$fc_image_name',
                fc_paragraph='$fc_paragraph'
                ";

            //3. execute query and data into database
            $res = mysqli_query($conn , $sql) or die(mysqli_error());

                  
            //4. check wheather the query ius executed or not
            if($res==TRUE){
                //create a session variable to display message
                $_SESSION['add'] = "<div class='success'> content updated successfully</div>";
              
                //redirect page to admin manager
                 header("location:".SITEURL.'../../back-end/admin/manage-fc.php');
            }
            else{
                //create a session variable to display message
                 $_SESSION['add'] = "<div class='error'>Failed to update the content</div>";
     
                //redirect page to admin manager
                header("location:".SITEURL.'../../back-end/manage-content/add-fc.php');
             }

           }
        ?>


<?php
include('../b-includes/footer.php');
?>

