<?php
//delete the fitness content page
include('../db_connection/db_connection.php');

    if(isset($_GET['id']) AND isset($_GET['fc_image_name'])){
        //check wheather the id and image-name isset or not

        //save the valuses in variables
        $id = $_GET['id'];
        $fc_image_name= $_GET['fc_image_name'];

        //remove the image file from upload folder
        if($fc_image_name != ""){
            //image is availabe to remove 
            //we will give path to image folder
            $path= "../b-images/fc-images/".$fc_image_name;

            //remove the image
            $remove = unlink($path);//it will give boolean as output than we will use that to check wheather the image is removed or not

            if($remove==FALSE){
                // session the error message
                $_SESSION['remove'] = "<div class='error'>Failed to remove the image.</div>";

                //redirect to manage-fc page
                header("location:".SITEURL.'../../back-end/admin/manage-fc.php');

                //stop the process
                die();
            }

        }
        //and then delete from thge database
        //2. create sql to delete the admin
            $sql = "DELETE FROM fitness_content where id=$id";

            //execute the query
            $res = mysqli_query($conn, $sql);

            if($res==TRUE){
                //echo "fc delete success";
                $_SESSION['delete'] = "<div class='success'> Post deleted successfully.</div>";

                //redirecting the page to admin manager
                header("location:".SITEURL.'../../back-end/admin/manage-fc.php');


            }else{

                $_SESSION['delete'] = "<div class='error'> Failed to delete the post.</div>";

                //redirecting the page to admin manager
                header("location:".SITEURL.'../../back-end/admin/manage-fc.php');
            }
            //3. redirect to mange admin page with the mesaaadmin/(success/failure) 
           
    }else{
        //redirect to manage fc page
        header("location:".SITEURL.'../../back-end/admin/manage-fc.php');
      
    }

?>