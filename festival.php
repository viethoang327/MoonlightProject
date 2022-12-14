<?php
include('admin/configs/connectDB.php');
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = '1';
}
if ($currentPage == '1') {
    $begin = 0;
} else {
    $begin = ($currentPage * 6) - 6;
}
$sql = "SELECT * FROM festival 
        RIGHT JOIN gallery 
        ON festival.festID = gallery.festID
        RIGHT JOIN category
        ON festival.catID = category.catID
        RIGHT JOIN religion
        ON festival.relID = religion.relID
        ORDER BY festival.festID LIMIT $begin,6";
if ($connect->query($sql)) {
    $qr = $connect->query($sql);
    $result = $qr->fetch_all(MYSQLI_ASSOC);
}
$sql_cat = "SELECT * FROM category";
if($connect->query($sql_cat)){
    $query_cat = $connect->query($sql_cat);
    $result_cat = $query_cat->fetch_all(MYSQLI_ASSOC);
}else{
    echo "ERROR CONNECT DATABASE.$connect->connect_error";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Festival</title>
    <link rel="icon" type="image/x-icon" href="image/moonicon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/allfes.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    
</head>

<body>

    <div class="header">
        <a href="index.php" class="logo_container">
            <img src="image/Asset 1.png" alt="">
        </a>
        <!-- Begin : Nav -->
        <ul id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="festival.php">All Festival
                    <i class=" nav-arow ti-angle-down"></i>
                </a>
                <ul style="padding-left:0 ;" class="subnav">
                    <?php foreach($result_cat as $row_cat): ?>
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
            <form action="festival.php" method="GET">
                <input type="text" name="keyword" class="search-input" />
                <input type="submit" name="search">
            </form>
            <button type="button" class="search-btn">
                <i class="ti-search fa-search"></i>
            </button>
        </div>

    </div>
    <!-- body -->
    <div id="main_food">
        <div class="layout">
            <h1 class="title">All festivals</h1>
        </div>
        <div class="content_food">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="introduce">
                            <h1>Festival overview</h1>
                            <p>- This is an opportunity for visitors to enjoy the taste of traditional cuisine, cultural exchanges, specialty shopping and participate in street parade festivals of thousands of people from all over the world and regions of
                                Vietnam
                            </p>
                            <p>- At the food festival, diners not only enjoy traditional dishes, typical of Vietnamese-Chinese cuisine, but also have the opportunity to learn about culture through outstanding performances such as dance. Dragon lion, magic
                                performance, culinary performance by famous chefs and culinary artists</p>
                        </div>
                        <div class="bar">
                            <div class="filter">
                                <h2 class="filter_title">
                                    <span class="filter_logo"> All Festival</span>
                                </h2>
                                <button href="" class="filter_text js-buy-ticket">
                                    <i class="ti-filter" style="padding-right: 10px;"></i>
                                    <span class="filter_filter_content ">Festival Filter</span>
                                </button>

                            </div>
                        </div>
                        <div class="content">
                            <div class="list-festival">
                                <?php
                                // FILTER LOGIC                            
                                if (isset($_GET['submit'])) {
                                    $months = [];
                                    $months = $_GET['months'] ?? "";
                                    $religions = [];
                                    $religions = $_GET['religions'] ?? "";
                                    if (!empty($months)) {
                                        foreach ($months as $month) {
                                            $sqlMonth = "SELECT * FROM festival,gallery WHERE festival.festID = gallery.festID AND festival.month IN ('$month')";
                                            if ($connect->query($sqlMonth)) {
                                                $qry = $connect->query($sqlMonth);
                                                $rresult = $qry->fetch_all(MYSQLI_ASSOC);
                                            }
                                            foreach ($rresult as $rrow) { ?>
                                                <div class="layout-item">
                                                    <a href="festivaldetail.php?festID=<?php echo $rrow['festID'] ?>" class="btn">
                                                        <div class="div1">
                                                            <img src="admin/modules/gallerys/upload/<?php echo $rrow['imgLink'] ?>" alt="<?php echo $rrow['imgLink'] ?>">
                                                            <p class="allfes_p">
                                                                <?php echo $rrow['festName'] ?>
                                                            </p>
                                                            <p style="margin-bottom:0px;"><?php echo $rrow['nation'] ?></p>
                                                            <p class="allfes_p">
                                                                Read more
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php }
                                        }
                                    } elseif (!empty($religions)) {
                                        foreach ($religions as $religion) {
                                            $sql_rel = "SELECT * FROM festival,gallery WHERE festival.festID = gallery.festID AND  festival.relID IN ('$religion')";
                                            if ($connect->query($sql_rel)) {
                                                $qry_rel = $connect->query($sql_rel);
                                                $result_rel = $qry_rel->fetch_all(MYSQLI_ASSOC);
                                            }
                                            foreach ($result_rel as $row_rel) { ?>
                                                <div class="layout-item">
                                                    <a href="festivaldetail.php?festID=<?php echo $row_rel['festID'] ?>" class="btn">
                                                        <div class="div1">
                                                            <img src="admin/modules/gallerys/upload/<?php echo $row_rel['imgLink'] ?>" alt="<?php echo $row_rel['imgLink'] ?>">
                                                            <p class="allfes_p">
                                                                <?php echo $row_rel['festName'] ?>
                                                            </p>
                                                            <p style="margin-bottom:0px;"><?php echo $row_rel['nation'] ?></p>
                                                            <p class="allfes_p">
                                                                Read more
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php }
                                        }
                                    }
                                    // SEARCH LOGIC
                                } elseif (isset($_GET['search'])) {
                                    $key = $_GET['keyword'];
                                    $sql_search = "SELECT * FROM festival,gallery WHERE festival.festID = gallery.festID AND festival.festName LIKE '%$key%'";
                                    if ($connect->query($sql_search)) {
                                        $qry_search = $connect->query($sql_search);
                                        if (mysqli_num_rows($qry_search) > 0) {
                                            $counts = mysqli_num_rows($qry_search);
                                            $result_search = $qry_search->fetch_all(MYSQLI_ASSOC);
                                            $inform = "We found $counts results match with keyword: $key";
                                            ?><p><?php echo $inform; ?></p><?php
                                            foreach ($result_search as $row_search) { ?>
                                                <div class="layout-item">
                                                    <a href="festivaldetail.php?festID=<?php echo $row_search['festID'] ?>" class="btn">
                                                        <div class="div1">
                                                            <img src="admin/modules/gallerys/upload/<?php echo $row_search['imgLink'] ?>" alt="<?php echo $row_search['imgLink'] ?>">
                                                            <p class="allfes_p">
                                                                <?php echo $row_search['festName'] ?>
                                                            </p>
                                                            <p style="margin-bottom:0px;"><?php echo $row_search['nation'] ?></p>
                                                            <p class="allfes_p">
                                                                Read more
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php }
                                        } else {
                                            $inform = "There are 0 result match with keyword: $key!";
                                            ?>
                                            <div class="layout_item">
                                                <p><?php echo $inform; ?></p>
                                            </div>
                                        <?php }
                                    }
                                } else {
                                    foreach ($result as $row) {
                                        ?>
                                        <div class="layout-item">
                                            <a href="festivaldetail.php?festID=<?php echo $row['festID'] ?>" class="btn">
                                                <div class="div1">
                                                    <img src="admin/modules/gallerys/upload/<?php echo $row['imgLink'] ?>" alt="<?php echo $row['imgLink'] ?>">
                                                    <p class="allfes_p">
                                                        <?php echo $row['festName'] ?>
                                                    </p>
                                                    <p style="margin-bottom:0px;"><?php echo $row['nation'] ?></p>
                                                    <p class="allfes_p">
                                                        Read more
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                <?php }
                                } ?>

                            </div>
                        </div>
                        <?php
                        $sql_page = "SELECT * FROM festival";
                        $query = $connect->query($sql_page);
                        $row_count = mysqli_num_rows($query);
                        $page = ceil($row_count / 6);
                        ?>
                        <nav class="pagination1 d-flex justify-content-center" aria-label="...">
                            <ul class="pagination pagination-sm ">
                                <?php for ($i = 1; $i <= $page; $i++) : ?>
                                    <li class="page-item ">
                                        <a class="page-link" href="?page=<?php echo $i ?>" tabindex="-1"><?php echo $i ?></a>
                                    </li>
                                <?php endfor ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FILTER -->
    <?php
    $sqlRel = "SELECT * FROM religion";
    $queryRel = $connect->query($sqlRel);
    $resultRel = $queryRel->fetch_all(MYSQLI_ASSOC);
    include('admin/configs/closeDB.php');
    ?>
    <div class="modal ">
        <div class="modal-container js-container">
            <div class="modal-close js-close">
                <i class="ti-close"></i>
                <span>Close</span>
            </div>
            <form action="festival.php" method="GET">
                <div class="modal-header">
                <input type="submit" name='submit' value="Search" class="btn btn-primary btn-sm filter-search">
                </div>   
                <div class="modal-body">
                        <div class="modal-month">
                            <label class="modal-label" for="">MONTH</label>
                            <div class="product-tool__color-items">
                                <div class="d-flex align-items-center mb-2 modal-row">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="Jan" id="">

                                    <label for="">January</label>
                                </div>
                                <div class="d-flex align-items-center mb-2 modal-row">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="Feb" id="">

                                    <label for="">February</label>
                                </div>
                                <div class="d-flex align-items-center mb-2 modal-row ">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="Mar" id="">
                                    <label for="">
                                        March</label>
                                </div>
                                <div class="d-flex align-items-center mb-2 modal-row">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="Apr" id="">

                                    <label for="">April</label>
                                </div>
                                <div class="d-flex align-items-center mb-2 modal-row">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="May" id="">

                                    <label for="">May</label>
                                </div>
                                <div class="d-flex align-items-center mb-2 modal-row ">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="Jun" id="">
                                    <label for="">
                                        June</label>
                                </div>
                                <div class="d-flex align-items-center mb-2 modal-row">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="Jul" id="">

                                    <label for="">July</label>
                                </div>
                                <div class="d-flex align-items-center mb-2 modal-row">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="Aug" id="">

                                    <label for="">August</label>
                                </div>
                                <div class="d-flex align-items-center mb-2 modal-row ">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="Sep" id="">
                                    <label for="">
                                        September</label>
                                </div>
                                <div class="d-flex align-items-center mb-2 modal-row">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="Oct" id="">

                                    <label for="">October</label>
                                </div>
                                <div class="d-flex align-items-center mb-2 modal-row">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="Nov" id="">

                                    <label for="">
                                        November</label>
                                </div>
                                <div class="d-flex align-items-center mb-2 modal-row ">
                                    <input class=" modal-check" type="checkbox" name="months[]" value="Dec" id="">
                                    <label for="">December</label>
                                </div>
                            </div>
                        </div>
                        <div class="product-tool__material">
                            <div class="product-tool__material-title text-uppercase pb-2 text-shadow modal-label">
                                RELIGION
                            </div>
                            <div class="product-tool__material-items">
                                <?php foreach ($resultRel as $rowRel) : ?>

                                    <div class="d-flex align-items-center mb-2 modal-row">
                                        <input class=" modal-check" type="checkbox" name="religions[]" value="<?php echo $rowRel['relID'] ?>" id="">
                                        <label class="ms-2" for=""><?php echo $rowRel['relName'] ?></label>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <br><br><br>
    <?php include 'footer.php' ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="js/app.js"></script>
<script>
    const buyBtns = document.querySelector('.js-buy-ticket')
    const modal = document.querySelector('.modal')
    const modalcontainer = document.querySelector('.js-container')
    const modalclose = document.querySelector('.js-close')
    //hamf hi???n th??? modal mua v??(th??m class open v??o modal)
    function showBuytickets() {
        modal.classList.add('open')
    } //h??m ???n modal mua v??(g??? b??? class open c???a modal)
    function hideBuytickets() {
        modal.classList.remove('open')
    }


    buyBtns.addEventListener('click', showBuytickets)
    modalclose.addEventListener('click', hideBuytickets)
    modal.addEventListener('click', hideBuytickets)
    modalcontainer.addEventListener('click', function(event) {
        event.stopPropagation()
    });
</script>

</html>