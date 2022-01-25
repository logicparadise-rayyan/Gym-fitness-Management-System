<?php
//delete the fitness content page
include('../db_connection/db_connection.php');

    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        //check wheather the id and image-name isset or not

        //save the valuses in variables
        $id = $_GET['id'];
        $testimonial_profile= $_GET['image_name'];

        //remove the image file from upload folder
        if($testimonial_profile != ""){
            //image is availabe to remove 
            //we will give path to image folder
            $path= "../b-images/testimonial-images/".$testimonial_profile;

            //remove the image
            $remove = unlink($path);//it will give boolean as output than we will use that to check wheather the image is removed or not

            if($remove==FALSE){
                // session the error message
                $_SESSION['remove-testimonial'] = "<div class='error'>Failed to remove the testimonial image.</div>";

                //redirect to manage-fc page
                header("location:".SITEURL.'../../back-end/admin/manage-testimonial.php');

                //stop the process
                die();
            }

        }
        //and then delete from thge database
        //2. create sql to delete the admin
            $sql = "DELETE FROM tbl_testimonial where id=$id";

            //execute the query
            $res = mysqli_query($conn, $sql);

            if($res==TRUE){
                //echo "fc delete success";
                $_SESSION['delete-testimonial'] = "<div class='success'> testimonial  deleted successfully.</div>";

                //redirecting the page to admin manager
                header("location:".SITEURL.'../../back-end/admin/manage-testimonial.php');


            }else{

                $_SESSION['delete-testimonial'] = "<div class='error'> Failed to delete the testimonial.</div>";

                //redirecting the page to admin manager
                header("location:".SITEURL.'../../back-end/admin/manage-testimonial.php');
            }
            //3. redirect to mange admin page with the mesaaadmin/(success/failure) 
           
    }else{
        //redirect to manage fc page
        header("location:".SITEURL.'../../back-end/admin/manage-testimonial.php');
      
    }

?>