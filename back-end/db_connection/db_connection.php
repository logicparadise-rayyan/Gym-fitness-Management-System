<?php

//start a session
session_start();

//constants
define('LOCALHOST' , 'localhost');
define('DB_USERNAME' , 'root');
define('DB_PASSWORD' , '');
define('DB_NAME' , 'gym_management');

define('SITEURL', 'http://localhost/gym_management/front-end/view/');


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());//database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());//selecting database

?>