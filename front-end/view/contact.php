<?php
include_once "../includes/header.php";
?>

<div class="reg-form">
    <div class="form">
        <form action="" method="POST">
            <div class="heading">
                <h1>Registration Form</h1>
            </div>
            <div class="label input">
                <label>Enter your Name</label>
                <input class="lab" type="text" name="name" >
            </div>
            <div class="label input">
                <label>Enter your Age</label>
                <input class="lab" type="date">
            </div>
            <div class="label input">
                <label>Enter your parentage</label>
                <input class="lab" type="text">
            </div>
            <div class="label input">
                <label>Enter your email</label>
                <input class="lab" type="email">
            </div>
            <div class="label input">
                <label>Contact number</label>
                <input class="lab" type="number">
            </div>
            <div class="button">
                <input class="submit" type="submit">
            </div>

        </form>
    </div>
</div>




<?php
include_once "../includes/footer.php";
?>

