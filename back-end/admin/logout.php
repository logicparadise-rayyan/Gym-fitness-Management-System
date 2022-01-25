<?php

//1. database connection and session connection
include('../db_connection/db_connection.php');

//2. destroy the session
session_destroy();
// the value of session["user"]=$username; unsets here when we destroy the session
//this helps us to check wheather the user is logged inn or not.
//if user is not logged in the session destroys itself

//3. Redirect to login page
header("location:".SITEURL.'../../back-end/admin/login.php');

?>