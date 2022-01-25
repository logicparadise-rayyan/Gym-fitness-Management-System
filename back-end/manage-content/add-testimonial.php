<?php
include('../b-includes/header.php');
?>

<div class="main-content">
           <div class="wrapper">
             <h1>ADD TESTIMONIAL</h1>
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
           ?>


                <form action="" method="POST" enctype="multipart/form-data">

                    <table class="">

                        <tr>
                            <td>Your Name:</td>
                            <td><input class="input-design text-centre" type="text" name="head" placeholder="title"></td>
                        </tr>

                        

                        <tr>
                            <td>Select Image:</td>
                            <td>
                                
                                <div class="image-preview" id="imagePreview">
                                    <img src="" alt="image preview" class="image-preview__image">
                                    <span  class="image-preview__default-text">image preview</span>
                                </div>
                                <br>
                                <input type="file" name="image_name" id="inpFile">
                                <br><br><br>

                            </td>
                        </tr>


                        <tr>
                        
                            <td>
                            <label>Add Comment:</label>
                            <td><textarea name="paragraph" rows="10" cols = "50"></textarea></td>
                            </td>
                            
                        </tr>


                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add Testimonial" class="btn-secondary">
                            </td>
                            
                        </tr>

                    </table>
               </form>
    </div>

</div>


        <?php

            if(isset($_POST['submit'])){

                //1. get the data from form

                $head=$_POST['head'];
                $paragraph=$_POST['paragraph'];
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

                            $destination_path = "../b-images/testimonial-images/".$image_name;

                            //finally upload the image
                            $upload = move_uploaded_file($source_path , $destination_path);
                        

                            //to check wheather the image is uploaded or not and redirect
                            if($upload==FALSE){
                                //create a session variable for error message
                                $_SESSION['upload-testimonial'] = "<div class='error text-centre'>image not uploaded</div>";

                                //redirect 
                                header("location:".SITEURL.'../../back-end/admin/add-testimonial.php');

                                //stop the rest process
                                die();

                            }
                        }
                            
                }else{

                    //if image is not selected do not upload the image and set the vale to empty
                    $image_name = "";
                }
     
                   

                //3.. insert data into datebase

                $sql="INSERT INTO tbl_testimonial SET 
                testimonial_head ='$head',
                testimonial_profile='$image_name',
                testimonial_para='$paragraph'
                ";

                //3. execute query and data into database
                $res = mysqli_query($conn , $sql) or die(mysqli_error());

                    
                //4. check wheather the query ius executed or not
                if($res==TRUE){
                    //create a session variable to display message
                    $_SESSION['add-testimonial'] = "<div class='success testimonials'> Testimonial Uploaded Successfully</div>";
                
                    //redirect page to admin manager
                    header("location:".SITEURL);
                }
                else{
                    //create a session variable to display message
                    $_SESSION['add-testimonial'] = "<div class='error'>Failed to upload the testimonial</div>";
        
                    //redirect page to admin manager
                    header("location:".SITEURL.'../../back-end/manage-content/add-testimonial.php');
                }
           }
        ?>
<?php
include('../b-includes/footer.php');
?>

