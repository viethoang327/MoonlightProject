<?php
include('admin/configs/connectDB.php');
    $sql_cat = "SELECT * FROM category";
    if($connect->query($sql_cat)){
        $query_cat = $connect->query($sql_cat);
        $result_cat = $query_cat->fetch_all(MYSQLI_ASSOC);
    }else{
        echo "ERROR CONNECT DATABASE.$connect->error";
    }

include('admin/configs/closeDB.php');
?>

<body >

    <div class="header">
        <a href="index.php" class="logo_container">
            <img style src="image/Asset 1.png" alt="logo">
        </a>
        <!-- Begin : Nav -->
        <ul id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="festival.php">All festivals
                    <i class=" nav-arow ti-angle-down"></i>
                </a>
                <ul class="subnav">
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

    <body>


        <!--  -->