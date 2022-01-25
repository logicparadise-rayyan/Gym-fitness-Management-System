<?php
include('../db_connection/db_connection.php');
include('../admin/login-checker.php');
?>
<!DOCTYPE html>
<html>
    <head>
     <title>gym_management</title>
     <link rel="stylesheet"  href="../back-css/b-style.css">
    </head>

    <body>
        <!--menu section starts -->
        <div class="menu text-centre">
           <div class="wrapper">
             <ul>
                 <li><a href="../admin/index.php">Home</a></li>
                 <li><a href="../admin/admin-manager.php">Admin</a></li>
                 <li><a href="../admin/manage-fc.php">Fitness-content</a></li>
                 <li><a href="../admin/manage-workout.php">workout</a></li>
                 <li><a href="../admin/manage-slider.php">Slider</a></li>
                 <li><a href="../admin/manage-testimonial.php">Testimonial</a></li>
                 <li><a href="../admin/logout.php">Logout</a></li>
             </ul>
           </div>
        </div>
        <!--menu section ends-->
        