<?php 
session_start();
if(isset($_GET['action'])&&$_GET['action']=='logout'){
    unset($_SESSION['username']);
}
include('admin/configs/connectDB.php');
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT Count(*) as cout FROM users WHERE userName = '$username'
                AND userPassword = '$password'";
        if($connect->query($sql)){
            $qr = $connect->query($sql);
            $result = $qr->fetch_array(MYSQLI_ASSOC);
            if($result['cout']>0){
                $_SESSION['username'] = $username;
                header ('Location: admin/index.php');
            }
            else{
                $fail = "Your username and password are incorrect. Please try again!";
            }
        }
    }
include('admin/configs/closeDB.php');
?>
<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="image/moonicon.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body class="img js-fullheight" style="background-image: url(image/anh5.jpg); height: 100vh;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section"><a href="index.php"><img style="width:250px" src="image/Asset 1.png" alt=""></a></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Admin</h3>
                        <form action="admindb.php" class="signin-form" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" name="password" placeholder="Password" required>
                                <span toggle="#password-field" class="fa-solid fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="form-control btn btn-primary sign_in submit px-3">Sign In</button>
                                <span style="color:red; font-size:14px;"><?php echo $fail ?? ''  ?></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="/admin/js/main.js"></script>
</body>
<script>
    var password = document.getElementById('password-field');
    var eyes = document.querySelector('.toggle-password');
    let checkeye = 1;
    eyes.addEventListener('click', function(e) {
        // password.attributes('type', 'text');
        if (checkeye == 1) {
            password.removeAttribute('type');
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
            checkeye = 0;
        } else {
            password.setAttribute('type', 'password');
            this.classList.add('fa-eye');
            this.classList.remove('fa-eye-slash');
            checkeye = 1;
        }
    });
</script>
    <h1 ></h1>
</html>