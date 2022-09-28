<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Contact Us</title>
    <link rel="icon" type="image/x-icon" href="image/moonicon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <!-- <link rel="stylesheet" href="fonts/themify-icons-font/themify-icons/themify-icons.css"> -->
</head>
<?php
include_once 'header.php';
?>

<body>

    <div class="home">
        <img class="home_background parallax-window" parallax="scroll" src="image/wallpapers.jpg">
        <div class="home_content">
            <div class="home_title">contact us</div>
        </div>
    </div>
    <div class="contact_form_section ">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Contact Form -->
                    <div class="contact_form_container">
                        <?php
                        if (isset($_GET['inform'])) {
                            $inform = $_GET['inform'];
                            echo "<h3>$inform</h3>";
                        } else { ?>
                            <div class="contact_title text-center">contact us</div>
                            <form action="admin/modules/feedbacks/feedbackcontrol.php" class="contact_form text-center" method="POST">
                                <input type="text" class="contact_form_name input_field" name="name" placeholder="Name" required="required">                               
                                <input type="text" pattern="[0-9]{10,11}" class="contact_form_phone input_field" id="phone" name="phone" placeholder="Enter phone" required>
                                <input type="email" class="contact_form_email input_field" name="email" placeholder="Email" required="required">
                                <textarea class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required"></textarea>
                                <button type="submit" id="form_submit_button" class="form_submit_button button trans_200" name="send">send
                                    message<span></span></button>
                            </form>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">

                    <!-- About - Image -->

                    <div class="about_image">
                        <img class="about_img" src="image/hoa-dang.png" alt="">
                    </div>

                </div>

                <div class="col-lg-4">

                    <!-- About - Content -->

                    <div class="about_content">
                        <div class="logo_container about_logo">
                            <div class="logo"><a href="#"></a></div>
                        </div>
                        <p class="about_text">Festivals are a great way to experience a destination in a unique and
                            different way. And with several hundred festivals all over the world every month – there are
                            plenty to chose from! This post is a world festivals calendar and pulls together a
                            collection of the Best Festivals In The World</p>

                    </div>

                </div>

                <div class="col-lg-3">

                    <!-- About Info -->

                    <div class="about_info">
                        <ul class="contact_info_list">
                            <li class="contact_info_item d-flex flex-row">
                                <div>
                                    <div class="contact_info_icon"><i class="ti-home"></i></div>
                                </div>
                                <div class="contact_info_text">285 Đội Cấn, Q. Ba Đình, Hà Nội, Việt Nam </div>
                            </li>
                            <li class="contact_info_item d-flex flex-row">
                                <div>
                                    <div class="contact_info_icon"><i class="ti-headphone"></i></div>
                                </div>
                                <div class="contact_info_text">0976282140</div>
                            </li>
                            <li class="contact_info_item d-flex flex-row">
                                <div>
                                    <div class="contact_info_icon"><i class="ti-email"></i></div>
                                </div>
                                <div class="contact_info_text"><a href="mailto:dang.nh.2046@aptechlearning.edu.vn?Subject=Hello" target="_top">dang.nh.2046@aptechlearning.edu.vn</a></div>
                            </li>
                            <li class="contact_info_item d-flex flex-row">
                                <div>
                                    <div class="contact_info_icon"><i class="ti-world"></i></div>
                                </div>
                                <div class="contact_info_text"><a href="index.php">www.moonlightevents.com</a></div>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="contact-map">
        <div id="google-map" class="google-map">
            <div class="map-container">
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9231238519906!2d105.81679641540237!3d21.03576179291394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab0d127a01e7%3A0xab069cd4eaa76ff2!2zMjg1IMSQ4buZaSBD4bqlbiwgVsSpbmggUGjDuiwgQmEgxJDDrG5oLCBIw6AgTuG7mWkgMTAwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1661090189995!5m2!1svi!2s" width="100%" height="550" style="border:0; margin:auto;align-items: center;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
<script src="js/header.js"></script>

</html>