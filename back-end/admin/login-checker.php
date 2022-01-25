<?Php
//Authorization and Access control
//check wheather the user is logged inn or not

if(!isset($_SESSION['user'])){

    //if session is not set redirect to login page
    //user is not logged inn
    $_SESSION['no-login-message'] = "<div class='error text-centre'>Please Login To Access The Control Panel</div>";

    //redirect to login page
    header("location:".SITEURL.'../../back-end/admin/login.php');
}else{

}


?>