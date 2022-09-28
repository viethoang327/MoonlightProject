<?php
include('../../configs/connectDB.php');
//ADD ADMIN MEMBER
if (isset($_POST['submit'])) {
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $userPhone = $_POST['userPhone'];
    $userEmail = $_POST['userEmail'];
    try {
        if (!empty($userName) && !empty($userPassword)) {
            $sql = "INSERT INTO users(userName,userPassword,userPhone,userEmail) 
                VALUES ('$userName','$userPassword','$userPhone','$userEmail')";
            if (!$connect->query($sql)) {
                $error = $connect->connect_errno;
                throw new Exception($error);
            } else {
                header("Location: users.php");
            }
        }
    } catch (Exception $e) {
        echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
        echo "<h2 style=\"color:red;\">ERROR_ToString:</h2> " . "<p>" . $e->__toString() . "</p>";
    }
}
//DELETE ADMIN MEMBER
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $userId = $_GET['id'];
    $sql_check = "SELECT * FROM users";
    $query_check = $connect->query($sql_check);
    $counts = mysqli_num_rows($query_check);
    if ($counts > 1) {
        try {
            $sql = "DELETE FROM users WHERE userID=$userId";
            if (!$connect->query($sql)) {
                $error = $connect->connect_errno;
                throw new Exception($error);
            } else {
                header("Location: users.php");
            }
        } catch (Exception $e) {
            echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
        }
    } else {
        echo "<h2 style=\"color:red\">You can't delete the last Admin Member</h2>";
        echo "<a href=\"users.php\" class=\"btn btn-primary\">Back</a>";
    }
}

//EDIT ADMIN MEMBER
if (isset($_POST['edit'])) {
    $userID = $_POST['userID']??'';
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $userPhone = $_POST['userPhone'];
    $userEmail = $_POST['userEmail'];
    try {
        if (!empty($userName) && !empty($userPassword)) {
            $sql = "UPDATE users SET userName = '$userName',userPassword = '$userPassword',userPhone = '$userPhone',userEmail = '$userEmail' WHERE userID = $userID";
            if (!$connect->query($sql)) {
                $error = $connect->connect_errno;
                throw new Exception($error);
            } else {
                header("Location: users.php");
            }
        }
    } catch (Exception $e) {
        echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
    }
}
include('../../configs/closeDB.php');
