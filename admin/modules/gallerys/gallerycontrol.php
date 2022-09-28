<?php
include('../../configs/connectDB.php');
// INSERT MULTIPLE PICTURE
if(isset($_POST['submit'])){
    $description = $_POST['description'];
    $festID = $_POST['festID'];
    $fileCount = count($_FILES['file']['name']);
    for($i=0;$i<$fileCount;$i++){
        $fileName = $_FILES['file']['name'][$i];
        $fileName = time() . ' ' . $fileName;
        $sql = "INSERT INTO gallery(imgLink,imgDescription,festID)VALUES('$fileName','$description',$festID)";
        if($connect->query($sql)){
            move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$fileName);
            header('Location:../festival/festivalInfor.php');
        }else{
            echo "ERROR!";
        }
    }   
}
// DELETE 1 PIC
if(isset($_GET['delgal'])&&$_GET['delgal']=='del'){
    $id = $_GET['id'];
    $sql = "SELECT * FROM gallery WHERE galID = '$id' LIMIT 1";
    $query = $connect->query($sql);
    $results = $query->fetch_all(MYSQLI_ASSOC);
    foreach($results as $result){
        unlink('upload/'.$result['imgLink']);
    }
    $sql = "DELETE FROM gallery WHERE galID = $id";
    $connect->query($sql);
    
    header('Location:gallery.php');
}
include('../../configs/closeDB.php');
?>