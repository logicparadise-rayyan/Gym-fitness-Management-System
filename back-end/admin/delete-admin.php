<?php
//include data base connection
include('../db_connection/db_connection.php ');
//1. get the ID of the admin to be deleted
 $id = $_GET['id'];

//2. create sql to delete the admin
$sql = "DELETE FROM tbl_admin where id=$id";

//execute the query
$res = mysqli_query($conn, $sql);

if($res==TRUE){
    //echo "admin delete success";
    $_SESSION['delete'] = "<div class='success'> Admin deleted successfully.</div>";

    //redirecting the page to admin manager
    header("location:".SITEURL.'../../back-end/admin/admin-manager.php');


}else{
    echo "admin delete failure";

    $_SESSION['delete'] = "<div class='error'> Admin not deleted.Try again later.</div>";

    //redirecting the page to admin manager
    header("location:".SITEURL.'../../back-end/admin/admin-manager.php');
}
//3. redirect to mange admin page with the mesaaadmin/(success/failure) 
?>