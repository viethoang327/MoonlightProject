<?php
include('admin/configs/connectDB.php');
if (isset($_GET['festID'])) {
    $festID = $_GET['festID'];
    $sql = "SELECT * FROM festival,category,religion WHERE festival.festID = $festID AND 
                festival.catID=category.catID AND festival.relID=religion.relID ";
    if ($connect->query($sql)) {
        $qr = $connect->query($sql);
        $result1 = $qr->fetch_array(MYSQLI_ASSOC);
    }
    $sql1 = "SELECT * FROM gallery WHERE festID = $festID";
    if ($connect->query($sql)) {
        $qrr = $connect->query($sql1);
        $result2 = $qrr->fetch_array(MYSQLI_ASSOC);
    }

    $row = array_merge($result1, $result2);
}
include('admin/configs/connectDB.php');
$sql_cat = "SELECT catID,catName FROM category";
if ($connect->query($sql_cat)) {
    $query_cat = $connect->query($sql_cat);
    $result_cat = $query_cat->fetch_all(MYSQLI_ASSOC);
} else {
    echo "ERROR CONNECT DATABASE.$connect->error";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Detail</title>
    <link rel="icon" type="image/x-icon" href="image/moonicon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/allfes.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
</head>

<body>

    <div class="header">
        <a href="index.php" class="logo_container">
            <img src="image/Asset 1.png" alt="logo">
        </a>
        <!-- Begin : Nav -->
        <ul id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="festival.php">All Festival
                    <i class=" nav-arow ti-angle-down"></i>
                </a>
                <ul class="subnav">
                <?php foreach ($result_cat as $row_cat) : ?>
                        <li><a href="festivalCategory.php?catID=<?php echo $row_cat['catID'] ?>"><?php echo $row_cat['catName'] ?></a></li>
                <?php endforeach ?>
                </ul>
            </li>
            <li><a href="admindb.php">Admin</a></li>
            <li><a href="contact.php">Contact Us </a></li>
        </ul>
        <!-- End : Nav -->
        <!-- Begin : Search button -->
        <div class="search-box">
            <input type="text" class="search-input" />
            <button class="search-btn">
                <i class="ti-search fa-search"></i>
            </button>
        </div>

    </div>
    <!-- body -->
    <div id="main_food">
        <div class="layout">
            <h1 class="title"><?php echo $row['festName'] ?></h1>
        </div>
        <div class="content_food">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="introduce border-bottom border-light">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-flex">
                                        <p class="detail-font">Country: <?php echo $row['nation'] ?> </p>
                                    </div>
                                    <div class="detail-flex">
                                        <p class="detail-font">Religious: <?php echo $row['relName'] ?></p>
                                    </div>
                                    <div class="detail-flex">
                                        <p class="detail-font">Month: <?php echo $row['month'] ?> </p>
                                    </div>
                                </div>

                            </div>
                            <p class="detail-information">Information </p>
                            <p>
                                <?php echo $row['imgDescription'] ?>
                            </p>
                            <img src="admin/modules/gallerys/upload/<?php echo $row['imgLink'] ?>" alt="<?php echo $row['imgLink'] ?>" class="detail-size-image" width="100%">
                            <p>
                                <?php echo $row['festDescription'] ?>
                            </p>
                        </div>
                        <!-- COMMENT SECTION-->
                        <div class=" mt-2 container comment">
                            
                            <div class="d-flex  row" style="margin-top: 50px;margin-bottom: 40px;">
                                <div>
                                    <div class="d-flex flex-column comment-section">
                                        <?php
                                        $sqlShow = "SELECT * FROM feedback WHERE festID = $festID";
                                        $queryShow = $connect->query($sqlShow);
                                        $rowCmts = $queryShow->fetch_all(MYSQLI_ASSOC);
                                        ?>
                                        <div class="bg-white">
                                            <div class="bg-white p-2">
                                                <?php foreach ($rowCmts as $rowCmt) : ?>
                                                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="image/anhdaidien.jpg" width="40">
                                                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo $rowCmt['fedName'] ?></span><span class="date text-black-50">Shared publicly - <?php echo $rowCmt['postTime'] ?> </span></div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <p class="comment-text"><?php echo $rowCmt['comment'] ?></p>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>

                                        <form action="admin/modules/feedbacks/feedbackcontrol.php?festID=<?php echo $festID ?>" method="POST">
                                            <div class="bg-light p-2">
                                                <div class="d-flex flex-row align-items-start">
                                                    <div>
                                                        <img class="rounded-circle" src="image/anhdaidien.jpg" width="40">
                                                    </div>
                                                    <div>
                                                        <input name="fedName" type="text" class=" ml-1 shadow-none name" style="border: 1px solid #ced4da;border-radius: 0.25rem;padding:10px" placeholder="Write Your Name">
                                                        <textarea name="comment" style="margin-top: 15px;width:750px" class="form-control ml-1 shadow-none textarea" placeholder="Write Your Comments"></textarea>
                                                    </div>
                                                </div>
                                                <div class="mt-2 text-right">
                                                    <button class="btn btn-primary btn-sm shadow-none" name="postComment" type="submit">Post comment</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SUGGESTION SECTION                        -->
                    <div class="col-md-3">
                        <h1 style="text-align: center;">Readmore?</h1>
                        <?php
                        $sql_r = "SELECT * FROM festival,gallery WHERE festival.festID = gallery.festID ORDER BY RAND() LIMIT 5";
                        if ($connect->query($sql_r)) {
                            $query_r = $connect->query($sql_r);
                            $row_rs = $query_r->fetch_all(MYSQLI_ASSOC);
                        } else {
                            echo "error.$connect->error";
                        }
                        foreach ($row_rs as $row_r) :
                        ?>
                            <a class="btn btn-outline-info" href="festivaldetail.php?festID=<?php echo $row_r['festID'] ?>">
                                <img src="admin/modules/gallerys/upload/<?php echo $row_r['imgLink'] ?>" alt="" width="100%">
                            </a>
                            <p>
                            <h3><a class="btn btn-outline-info" href="festivaldetail.php?festID=<?php echo $row_r['festID'] ?>"><?php echo $row_r['festName'] ?></a></h3>
                            </p>
                            <hr width="100%">
                            <br>
                            <br>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>


        <br><br><br>
        <?php include 'footer.php';
        include('admin/configs/closeDB.php');
        ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="js/app.js"></script>

</html>