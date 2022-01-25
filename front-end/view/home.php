
<?php
include_once "../includes/header.php";
?>
        <!--body of home page-->

<!---------------------------------CAROUSEL START ------------------------------------->
<div class="texter">
    <div id="slider-one" class="owl-carousel owl-theme">
        <?php 
            $sql="SELECT * FROM  tbl_slider"; 
            
            //3. execute query and data into database
            $res = mysqli_query($conn,$sql) or die(mysqli_error());

                //4. to check wheathet the user exists or not
                $count = mysqli_num_rows($res);

                    //check whether the quer is executed or not
                    //check the number of rows
                if($count>0)
                   {
                        //we have data in Db
                        while($rows = mysqli_fetch_assoc($res))
                        {
                        
                            //using while loop to display all the data from database
                            $id = $rows['id'];
                            $slider_head = $rows['slider_head'];
                            $slider_image = $rows['slider_image'];
                            $slider_paragraph = $rows['slider_paragraph'];
                            ?>

                               <div class="item owl-carousal">
                                    <?php
                                    
                                    if($slider_image=="")
                                    {
                                        echo "<div class='error'>image not available</div>";

                                    }else{

                                        ?>
                                              <img src="<?php echo SITEURL; ?>../../back-end/b-images/slider-images/<?php echo $slider_image;?>">
                                        <?php


                                    }
                                    ?>
                                    <div class="text">
                                        <h1><?php echo $slider_head; ?></h1>
                                        <P><?php echo $slider_paragraph; ?></P>
                                    </div>
                                </div>

                            <?php
                        }

                    }
                    else
                    {
                        echo "<div class='error'>no image for slider found</div>";
                    }
                ?>
                
    </div>
    <!--------------------------- CAROUSEL END------------------------------------->
    <!-----------------------------POST START------------------------------------->

   

    <?php 
            $sql="SELECT * FROM  tbl_post"; 
            
            //3. execute query and data into database
            $res = mysqli_query($conn,$sql) or die(mysqli_error());

                //4. to check wheathet the user exists or not
                $count = mysqli_num_rows($res);

                    //check whether the quer is executed or not
                    //check the number of rows
                if($count>0)
                   {
                        //we have data in Db
                        while($rows = mysqli_fetch_assoc($res))
                        {
                        
                            //using while loop to display all the data from database
                            $id = $rows['id'];
                            $title = $rows['title'];
                            $image_name = $rows['image_name'];
                            $content = $rows['content'];
                            ?>
                                
                            <div class="post">
                                <div class="caption">

                                    <h1><?php echo $title; ?></h1>
                                    <p><?php echo $content; ?></p>


                                </div>

                                <div class="picture">
                                    <?php
                                                                
                                            if($image_name=="")
                                            {
                                                echo "<div class='error'>image not available</div>";

                                            }else{

                                                ?>
                                                        <img src="<?php echo SITEURL; ?>../../back-end/b-images/post-images/<?php echo $image_name;?>">
                                                <?php


                                            }
                                        ?>
                                </div>
                                
                            </div>

                            <?php
                        }

                    }
                    else
                    {
                        echo "<div class='error'>no image for slider found</div>";
                    }
     ?>
</div>


<div class="circle-post">
    <h1>Latest workout/Meal plans</h1>
    <div class="div-post">

        <a href="#"> <div class="circle-image"><img src="../images/push-up.jpg"></div>
            <h3>text for circle</h3>

        <a href="#"> <div class="circle-image"><img src="../images/push-up.jpg"></div>
                <h3>text for circle</h3></a>

        <a href="#"> <div class="circle-image"><img src="../images/push-up.jpg"></div>
            <h3>text for circle</h3></a>

        <a href="#"> <div class="circle-image"><img src="../images/push-up.jpg"></div>
            <h3>text for circle</h3></a>

        <a href="#"> <div class="circle-image"><img src="../images/push-up.jpg"></div>
            <h3>text for circle</h3></a>

        <a href="#"> <div class="circle-image"><img src="../images/push-up.jpg"></div>
            <h3>text for circle</h3></a>
    </div>
    <!-----------------------------POST END------------------------------------->


    <!-----------------------------CARD START------------------------------------->
    <div id="fitness-content"><h1 >FITNESS CONTENT</h1></div>
    <div class="main-div-cards">
            <?php 
                    $sql="SELECT * FROM  fitness_content"; 
                    
                    //3. execute query and data into database
                    $res = mysqli_query($conn,$sql) or die(mysqli_error());

                        //4. to check wheathet the user exists or not
                        $count = mysqli_num_rows($res);

                            //check whether the quer is executed or not
                            //check the number of rows
                        if($count>0)
                        {
                                //we have data in Db
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                
                                    //using while loop to display all the data from database
                                    $id = $rows['id'];
                                    $fc_heading = $rows['fc_heading'];
                                    $fc_image_name = $rows['fc_img_name'];
                                    $fc_paragraph = $rows['fc_paragraph'];
                                
                        ?>


                                <div class="cards">
                                    <h3><?php echo $fc_heading; ?></h3>

                                            <?php
                                                
                                                if($fc_image_name=="")
                                                {
                                                    echo "<div class='error'>image not available</div>";

                                                }else{

                                            ?>
                                                <div class="card-image"> <img src="<?php echo SITEURL; ?>../../back-end/b-images/fc-images/<?php echo $fc_image_name;?>"></div>
                                            <?php


                                                }
                                            ?>
                                
                                                <p><?php echo $fc_paragraph; ?></p>
                                                <a href="">View More</a>
                                </div>
                                    

                        <?php
                                }

                            }
                            else
                            {
                                echo "<div class='error'>no image for slider found</div>";
                            }
                        ?>
    </div>
     
    <!-----------------------------CARD END------------------------------------->


    <!-----------------------------CLIENT TESTIMONIAL START------------------------------------->
    <div class="testimonial-container">
        <div class="client-testimonial"><h1>CLIENT TESTIMONIAL</h1></div>
        <div  id="slider-two" class="owl-carousel second-carousel ">


                <?php 
                    $sql="SELECT * FROM  tbl_testimonial"; 
                    
                    //3. execute query and data into database
                    $res = mysqli_query($conn,$sql) or die(mysqli_error());

                        //4. to check wheathet the user exists or not
                        $count = mysqli_num_rows($res);

                            //check whether the quer is executed or not
                            //check the number of rows
                        if($count>0)
                        {
                                //we have data in Db
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                
                                    //using while loop to display all the data from database
                                    $id = $rows['id'];
                                    $testimonial_profile = $rows['testimonial_profile'];
                                    $testimonial_head = $rows['testimonial_head'];
                                    $testimonial_para = $rows['testimonial_para'];
                                    ?>

                                    <div class="content-area">
                                        <div class="content">

                                            <?php
                                                if($testimonial_profile=="")
                                                {
                                                    echo "<div class='error'>image not available</div>";

                                                }else{

                                                    ?>
                                                        <div class="image-area"><img src="<?php echo SITEURL; ?>../../back-end/b-images/testimonial-images/<?php echo $testimonial_profile;?>"></div>
                                                    <?php


                                                }
                                                ?>

                                                <h1><?php echo $testimonial_head; ?></h1>
                                                <p><?php echo $testimonial_para; ?></p>
                                        </div>        
                                     </div>

                        <?php

                                }

                            }
                            else
                            {
                                echo "<div class='error'>no image for testimonial found</div>";
                            }
                        ?>
        </div>                
   </div>

        <a  href="<?php echo SITEURL;?>../../back-end/manage-content/add-testimonial.php"> <div class="join-us" id = "testimonial"><h3>ADD TESTIMONIAL</h3></div></a>
     
            <div class = " feedback-testimonial">
                <?php
                
                    if(isset($_SESSION['add-testimonial'])){
                        echo $_SESSION['add-testimonial'];//displaying session message
                        unset($_SESSION['add-testimonial']);//removing session message
                    }
                    
                ?>
            </div>
            <!-----------------------------CLIENT TESTIMONIAL END------------------------------------->
            <!-----------------------------VIDEO START------------------------------------->
        <iframe id="video-player"
                width="1000" height="600"
                src="https://www.youtube.com/embed/tlr5_3D20X8?autoplay=0&mute=1&enablejsapi=1&rel=0"
                frameborder="0"
                modestbranding=1
                allowfullscreen
        ></iframe>
            <!-----------------------------VIDEO END------------------------------------->
            <!-----------------------------JOIN US START------------------------------------->
        <a href="#"><div class="join-us"><h3>JOIN US NOW</h3></div></a>
            <!-----------------------------JOIN US END------------------------------------->
            <!-----------------------------FOOTER START------------------------------------->

<?php
include_once "../includes/footer.php";
?>