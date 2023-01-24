
<?php
include_once "../includes/header.php";
?>
        <!--body of home page-->

<!---------------------------------CAROUSEL START ------------------------------------->
<div class="texter">
    <div id="slider-one" class="owl-carousel owl-theme">
        <div class="item owl-carousal">
            <img src="../images/rope.jpg">
            <div class="text">
                <h1>U FAT SHIT</h1>
                <P>Loose All Your Fat IN No Time</P>
            </div>
        </div>


        <div class="item owl-carousal">
            <img src="../images/only-men-rope.jpg">
            <div class="text">
                <h1>U FAT SHIT</h1>
                <P>Loose All Your Fat IN No Time</P>
            </div>
        </div>


        <div class="item owl-carousal">
            <img src="../images/with-trainer.jpg">
            <div class="text">
                <h1>U FAT SHIT</h1>
                <P>Loose All Your Fat IN No Time</P>
            </div>
        </div>


        <div class="item owl-carousal">
            <img src="../images/heavy-squat-men.jpg">
            <div class="text">
                <h1>U FAT SHIT</h1>
                <P>Loose All Your Fat IN No Time</P>
            </div>
        </div>
    </div>
    <!--------------------------- CAROUSEL END------------------------------------->
    <!-----------------------------POST START------------------------------------->

    <div class="post">
        <div class="caption">
            <h1>This is a Post</h1>
            <p>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                blanditiis praesentium voluptatum deleniti atque<br><br> corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
                "At vero eos et accusamus et iusto odio dignissimos </p>


        </div>
        <div class="picture">
            <img src="../images/bicep-curl-men.jpg">
        </div>
    </div>
    <div class="post ">
        <div class="picture second-pic">
            <img src="../images/man-jump-ball.jpg">
        </div>
        <div class="caption second-para">
            <h1>This is a Post</h1>
            <p>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
                "At vero eos et accusamus et iusto odio dignissimos
                <br>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat."
                "At vero eos et accusamus et iusto odio dignissimos </p>
        </div>
    </div>
</div>
<div class="circle-post">
    <h1>Latest workout plans</h1>
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
        $i=0;
        while ($i<5){
        $i++;
        ?>

        <div class="cards">
            <h3>this is heading</h3>
            <div class="card-image"><img src="../images/heavy-squat-men.jpg"></div>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium volupt<br>atum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                blanditiis praesentium voluptatum deleniti atque</p>
            <a href="">View More</a>
        </div>


            <?php
        }
        ?>
    </div>
    <!-----------------------------CARD END------------------------------------->
    <!-----------------------------CLIENT TESTIMONIAL START------------------------------------->
    <div class="testimonial-container">
        <div class="client-testimonial"><h1>CLIENT TESTIMONIAL</h1></div>
        <div  id="slider-two" class="owl-carousel second-carousel ">
            <div class="content-area">
                <div class="content">
                    <div class="image-area"><img src="../images/potrait-1.jpg"> </div>
                    <h1>some famous</h1>
                    <p>"In my opinion this is the best gym ihave seen so far"</p>
                </div>
            </div>

            <div class="content-area">
                <div class="content">
                    <div class="image-area"><img src="../images/potrait-2.jpg"> </div>
                    <h1>some famous</h1>
                  <p>"In my opinion this is the best gym ihave seen so far"</p>
                </div>
            </div>

            <div class="content-area">
                <div class="content">
                    <div class="image-area"><img src="../images/potrait-3.jpg"> </div>
                    <h1>some famous</h1>
                    <p>"In my opinion this is the best gym ihave seen so far"<br></p>
                </div>
            </div>


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