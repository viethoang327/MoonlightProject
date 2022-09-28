<?php
include('../../configs/connectDB.php');
// ADD MORE CATEGORY
if (isset($_POST['category'])) {
    $catName = $_POST['catName'];
    $catIntro = $_POST['catIntro'];
    $file = $_FILES['catBackground']['name'];
    if(!empty($catName)&&!empty($catIntro)&&!empty($file)){
        $sql_addcat = "INSERT INTO category(catName,catIntro,catBackground) VALUES('$catName','$catIntro','$file')";
        if ($connect->query($sql_addcat)) {
            move_uploaded_file($_FILES['catBackground']['tmp_name'], '../../img/categoryupload/' . $file);
            header('Location:insert.php');
        }
    }else{
        echo "<h2 style=\"color:red\">You have to fill all the fields</h2>";
        echo "<a href=\"insert.php\" class=\"btn btn-primary\">Back</a>";
    }
}
// DELETE 1 CATEGORY

try {
    if (isset($_GET['delcat']) && $_GET['delcat'] == 'del') {
        $id = $_GET['id'];
        $sql_delcat = "DELETE FROM category WHERE catID = $id";
        if ($connect->query($sql_delcat)) {
            $sql = "SELECT * FROM category WHERE catID = '$id' LIMIT 1";
            $query = $connect->query($sql);
            $result = $query->fetch_array(MYSQLI_ASSOC);
            unlink('../../img/categoryupload/' . $result['catBackground']);
            header('Location:insert.php');
        } else {
            $var_msg = $connect->connect_error;
            throw new Exception($var_msg);
        }
    }
} catch (Exception $e) {
    echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
    // echo "<br>";
    // echo "<h2 style=\"color:red;\">ERROR_GetCode:</h2> " . "<p>" . $e->getCode() . "</p>";
    // echo "<br>";
    // echo "<h2 style=\"color:red;\">ERROR_ToString:</h2> " . "<p>" . $e->__toString() . "</p>";
}


// ADD MORE RELIGION
if (isset($_POST['religion'])) {
    $relName = $_POST['relName'];
    $sql_addrel = "INSERT INTO religion(relName) VALUES('$relName')";
    if ($connect->query($sql_addrel)) {
        header('Location:insert.php');
    }
}
// DELETE 1 RELIGION
try {
    if (isset($_GET['delrel']) && $_GET['delrel'] == 'del'){
        $id = $_GET['id'];
        $sql_delrel = "DELETE FROM religion WHERE relID = $id";
        if ($connect->query($sql_delrel)) {
        header('Location:insert.php');
        }else {
            $error1 = $connect->connect_error;
            throw new Exception($error1);
        }
    }
} catch (Exception $e) {
    echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
}

// INSERT FESTIVAL INFORMATION
if (isset($_POST['addfest'])) {
    $festName = $_POST['festName'];
    $description = $_POST['description'];
    $catID = $_POST['catID'];
    $relID = $_POST['relID'];
    $nation = $_POST['nation'];
    $month = $_POST['month'];
    if(!empty($festName)&&!empty($description)&&!empty($nation)){
        $sql = "INSERT INTO festival(festName,nation,festDescription,catID,relID,month)
        VALUES('$festName','$nation','$description',$catID,$relID,'$month')";
        echo $sql;
        if ($connect->query($sql)) {
            header('Location:../gallerys/gallery.php');
        } else {
            echo 'error' . $connect->connect_errno;
        }
    }else{
        echo "<h2 style=\"color:red\">You have to fill all the fields</h2>";
        echo "<a href=\"insert.php\" class=\"btn btn-primary\">Back</a>";
    }
}
// DELETE 1 FESTIVAL
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM gallery WHERE festID = $id LIMIT 1";
    $query = $connect->query($sql);
    $results = $query->fetch_all(MYSQLI_ASSOC);
    foreach ($results as $result) {
        unlink('../gallerys/upload/' . $result['imgLink']);
    }
    $sql = "DELETE FROM gallery WHERE festID = $id";
    $connect->query($sql);
    $sql = "DELETE FROM festival WHERE festID = $id";
    $connect->query($sql);
    header('Location:festivalInfor.php');
}
// EDIT FESTIVAL INFORMATION
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = $_GET['id'];
    $name = $_GET['festName'];
    $nation = $GET['nation'];
    $description = $GET['description'];
    $catID = $GET['catID'];
    $relID = $GET['relID'];
    $sql = "INSERT INTO festival(festName,nation,festDescription,catID,relID)
            VALUES ('$name','$nation','$description','$catID','$relID')
            WHERE festID = $id ";
    if ($connect->query($sql)) {
        header('Location:../gallerys/gallery.php');
    } else {
        echo 'error' . $connect->connect_errno;
    }
}
include('../../configs/closeDB.php');
