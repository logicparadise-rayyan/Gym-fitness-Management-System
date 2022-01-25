<?php 

include('../../back-end/db_connection/db_connection.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="../css/style.css" rel="stylesheet">
    <title>gym-management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

</head>
<body>
<div class="container">
    <div class="content-wrapper">
        <!--Header-->

        <header>
            <nav>
                <div class="navigation">
                    <div class="menu" style="text-align: center;">
                        <a href="<?php echo SITEURL;?>">Home</a>
                        <a href="<?php echo SITEURL;?>about.php" >about</a>
                        <a href="<?php echo SITEURL;?>workout.php ">workout</a>
                        <a href="#">client</a>
                        <a href="<?php echo SITEURL;?>contact.php">contact</a>
                    </div>
                    <div class="icon">
                        <img src="../images/main-logo.png" >
                    </div>
                </div>
            </nav
        </header>
