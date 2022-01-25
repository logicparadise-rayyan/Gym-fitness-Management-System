<?php
//delete the fitness content page
include('../db_connection/db_connection.php');

    if(isset($_GET['id']) AND isset($_GET['slider_image'])){
        //check wheather the id and image-name isset or not

        //save the valuses in variables
        $id = $_GET['id'];
        $slider_image= $_GET['slider_image'];

        //remove the image file from upload folder
        if($slider_image != ""){
            //image is availabe to remove 
            //we will give path to image folder
            $path= "../b-images/slider-images/".$slider_image;

            //remove the image
            $remove = unlink($path);//it will give boolean as output than we will use that to check wheather the image is removed or not

            if($remove==FALSE){
                // session the error message
                $_SESSION['remove-slider'] = "<div class='error'>Failed to remove the slider image.</div>";

                //redirect to manage-fc page
                header("location:".SITEURL.'../../back-end/admin/manage-slider.php');

                //stop the process
                die();
            }

        }
        //and then delete from thge database
        //2. create sql to delete the admin
            $sql = "DELETE FROM tbl_slider where id=$id";

            //execute the query
            $res = mysqli_query($conn, $sql);

            if($res==TRUE){
                //echo "fc delete success";
                $_SESSION['delete-slider'] = "<div class='success'> slider image deleted successfully.</div>";

                //redirecting the page to admin manager
                header("location:".SITEURL.'../../back-end/admin/manage-slider.php');


            }else{

                $_SESSION['delete-slider'] = "<div class='error'> Failed to delete the slider image.</div>";

                //redirecting the page to admin manager
                header("location:".SITEURL.'../../back-end/admin/manage-slider.php');
            }
            //3. redirect to mange admin page with the mesaaadmin/(success/failure) 
           
    }else{
        //redirect to manage fc page
        header("location:".SITEURL.'../../back-end/admin/manage-slider.php');
      
    }

?>