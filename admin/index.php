<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN</title>
    <link rel="icon" type="image/x-icon" href="img/admin.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="../fonts/themify-icons/themify-icons.css">
  </head>
  <body>
    <div class="wrapper">
        <h1 class="text-center">MoonLight Management</h1>
        <div class="blur">
            <div class="center-card">
                <i class="ti-reload icon-center"></i>
                <div class="card card-item card1">
                    <a href="modules/users/users.php">
                        <i class="ti-user icon-card mb-2"></i>
                        <div class="card-body text-light text-center my-5 px-5">
                            <h5 class="card-title">User Control</h5>
                            <p class="card-text">Quản lý người dùng, xem thông tin,  thêm, sửa, xóa thành viên. </p>
                        </div>
                    </a>
                </div>
                <div class="card card-item card2">
                    <a href="modules/festival/festivalInfor.php">
                        <i class="ti-camera icon-card mb-2"></i>
                        <div class="card-body text-light text-center my-5 px-5">
                            <h5 class="card-title">Festival Infor</h5>
                            <p class="card-text">Quản lý thông tin về lễ hội, danh sách lễ hội, thêm sửa xóa lễ hội</p>
                        </div>
                    </a>
                </div>
                <div class="card card-item card3">
                    <a href="modules/gallerys/gallery.php">
                        <i class="ti-gallery icon-card mb-2"></i>
                        <div class="card-body text-light text-center my-5 px-5">
                            <h5 class="card-title">Gallery</h5>
                            <p class="card-text">Bộ sưu tầm hình ảnh về lễ hội, upload hình ảnh, xóa hình ảnh</p>
                        </div>
                    </a>
                </div>
                <div class="card card-item card4">
                    <a href="modules/feedbacks/feedback.php">
                        <i class="ti-comment icon-card mb-2"></i>
                        <div class="card-body text-light text-center my-5 px-5">
                            <h5 class="card-title">Feed back</h5>
                            <p class="card-text">Quản lý phản hồi và thông tin liên hệ của viewer</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>                
        <nav class="navbar control">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#log" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                Hello, <?php echo $_SESSION['username'] ?? 'Admin' ; ?> 
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <div class="exit collapse" id="log"> 
            <a href="../admindb.php?action=logout" class="btn btn-light btn-sm">Log Out<i class="ti-arrow-left"></i></a>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>