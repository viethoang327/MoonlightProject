<?php
include('../../configs/connectDB.php');
//INSERT COMMENT FROM CUSTOMER
if (isset($_POST['postComment'])) {
    $festID = $_GET['festID'];
    $fedName = $_POST['fedName'];
    $comment = $_POST['comment'];
    $postTime =  date("Y/m/d h:i:s",time()+18000);
    if (!empty($fedName) && !empty($comment)) {
        try {
            $sql_comment = "INSERT INTO feedback(festID,fedName,comment,postTime)
                                                    VALUES ($festID,'$fedName','$comment','$postTime')";
            if (!$connect->query($sql_comment)) {
                $error = $connect->connect_error;
                throw new Exception($error);
            }else{
                header("Location:../../../festivaldetail.php?festID=".$festID);
            }
        } catch (Exception $e) {
            echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
        }
    }else{
        header("Location:../../../festivaldetail.php?festID=".$festID);
    }
}
// DELETE COMENT FROM ADMIN
if (isset($_GET['action'])&&$_GET['action']=='delete') {
    $fedID = $_GET['fedID'];   
        try {
            $sql_delete = "DELETE FROM feedback WHERE fedID=$fedID";
            if (!$connect->query($sql_delete)) {
                $error = $connect->connect_error;
                throw new Exception($error);
            }else{
                header("Location:feedback.php");
            }
        } catch (Exception $e) {
            echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
        }
}   
//INSERT CONTACT INFORMATION
if(isset($_POST['message'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    try{
        if (filter_var($email, FILTER_VALIDATE_EMAIL)&&preg_match('/^[0-9]*$/', $phone)) {
            $sql = "INSERT INTO contactus(name,email,phone,message) VALUES('$name','$email','$phone','$message')";
            if(!$connect->query($sql)){
                $error = $connect->connect_error;
                throw new Exception($error);
            }else{
                $inform = "You have successfully submitted, we will contact you as soon as possible";
                header("Location:../../../contact.php?inform=".$inform);
            }
        } else {
            $error = "$email is not a valid email address and $phone have to be a number";
            throw new Exception($error);
        }
       
    }
    catch(Exception $e){
        echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
    }
}
// DELETE CONTACT FROM ADMIN
if (isset($_GET['action'])&&$_GET['action']=='deleteContact') {
    $ID = $_GET['id'];   
        try {
            $sql_delete = "DELETE FROM contactus WHERE ID=$ID";
            if (!$connect->query($sql_delete)) {
                $error = $connect->connect_error;
                throw new Exception($error);
            }else{
                header("Location:feedback.php");
            }
        } catch (Exception $e) {
            echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
        }
}  
include('../../configs/closeDB.php');