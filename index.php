<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moonlight</title>
    <link rel="icon" type="image/x-icon" href="image/moonicon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" type="text/css" href="fonts/themify-icons/themify-icons.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>
<?php
include_once 'header.php';
?>

<body>
    <div id="main">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url('image/laudai.jpg') ;">
                    <div class="text-content">
                        <h1 class="text-heading animation-slide">MOONLIGHT</h1>
                        <div class="text-description animation-slide">
                            Eventful 
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image:url('image/anh1.jpg') ;">
                    <div class="text-content">
                        <h1 class="text-heading animation-slide">MOONLIGHT</h1>
                        <div class="text-description animation-slide ">
                            Young
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image:url('image/anh2.jpg') ;">

                    <div class="text-content">
                        <h1 class="text-heading animation-slide">MOONLIGHT</h1>
                        <div class="text-description  animation-slide">
                            Colorful
                        </div>
                    </div>
                </div>

            </div>
            <div class="swiper-button-next next-animation"></div>
            <div class="swiper-button-prev next-animation"></div>
        </div>
        <!-- content -->
        <section id="content">
            <div class="content-section">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2 class="section-heading">General Gallery</h2>
                            <p class="section-sub-heading">Some famous festivals around the world</p>
                        </div>
                    </div>
                </div>
                <!-- FEARTURE FESTIVAL -->
                <?php
                include('admin/configs/connectDB.php');
                $sql_r = "SELECT * FROM festival,gallery WHERE festival.festID = gallery.festID ORDER BY RAND() LIMIT 6";
                if ($connect->query($sql_r)) {
                    $query_r = $connect->query($sql_r);
                    $row_rs = $query_r->fetch_all(MYSQLI_ASSOC);
                } else {
                    echo "error.$connect->error";
                }
                ?>
                <div class="row member-list">
                    <div class="col">
                        <div #swiperRef="" class="swiper swiper2 mySwiper2">
                            <div class="swiper-wrapper">
                                <?php foreach ($row_rs as $row_r) : ?>
                                    <div class="swiper-slide ">
                                        <div class="swiper-hidden">
                                            <a class="swiper-hidden" href="festivaldetail.php?festID=<?php echo $row_r['festID'] ?>">
                                                <img class="swiper-img" src="admin/modules/gallerys/upload/<?php echo $row_r['imgLink'] ?>" alt="<?php echo $row_r['imgLink'] ?>">
                                            </a>
                                            <div class="text">
                                                <h2 class="swiper-heading"><?php echo $row_r['festName'] ?></h2>
                                                <a href="festivaldetail.php?festID=<?php echo $row_r['festID'] ?>" class="swiper-search-heading">Information</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- <div class="swiper-pagination"></div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div id="about" style="padding-bottom: 64px;">
                <div class="content-section">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h2 class="section-heading">INTRODUCTION</h2>
                                <p class="section-sub-heading">About The Festival</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="about-item col-6">
                                <h2>Do you know ?</h2>
                                <p>
                                    -The festival is the crystallization of a long and persistent cultural accumulation process. Through the image of the festival, you can see the dreams and aspirations of the whole community towards good things. It can be considered that the cultural essence of a community is deposited in the festival. It is a cultural norm dense with spiritual values, if we peel the official shell we will find the core of the cultural essence.
                                </p>
                                <!-- <form action="2.General.php">
                                    <button class="btn">Start</button>
                                </form> -->
                            </div>
                            <div class="about-item col-6">
                                <div class="about-item-img">
                                    <span>Moonlight Event</span>
                                    <img src="image/anh6.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <?php
    include_once 'footer.php';
    include('admin/configs/closeDB.php');
    ?>



</body>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="js/app.js"></script>

</html>