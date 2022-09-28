<?php 
include('../../template/header.php');
include('../../configs/connectDB.php');
// GET CATEGORY FETCH TO CATEGORY TABLE;
    $sql_cat = "SELECT * FROM category";
    $qr_cat = $connect->query($sql_cat);
    $result_cat = $qr_cat->fetch_all(MYSQLI_ASSOC);
// GET RELIGION FETCH TO RELIGION TABLE;
    $sql_rel = "SELECT * FROM religion";
    $qr_rel = $connect->query($sql_rel);
    $result_rel = $qr_rel->fetch_all(MYSQLI_ASSOC);
// SUGGEST DATA TO EDIT
if(isset($_GET['action'])&&$_GET['action']=='edit'){
    $festID = $_GET['id'];
    try{
        $sql_fest = "SELECT * FROM festival WHERE festID = $festID";
        if($connect->query($sql_fest)){
            $qr_fest = $connect->query($sql_fest);
            $result_fest = $qr_fest->fetch_array(MYSQLI_ASSOC);
        }else{
            $var_msg = $connect->connect_error;
            throw new Exception($var_msg);
        }
    }catch(Exception $e){
        echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
    }
}
//INSERT EDITED DATA
if(isset($_POST['edit'])&&isset($_GET['action'])&&$_GET['action']=='edit'){
    $festID = $_GET['id'];
    $festName = $_POST['festName'];
    $nation = $_POST['nation'];
    $festDescription = $_POST['description'];
    $catID = $_POST['catID'];
    $relID = $_POST['relID'];
    $month = $_POST['month'];
    try{
        $sql_edit = "UPDATE festival SET festName = '$festName', nation = '$nation', festDescription = '$festDescription', 
                    catID = $catID, relID = $relID, month = '$month' WHERE festID=$festID";
        if($connect->query($sql_edit)){
            header('Location: festivalInfor.php');
        }else{
            $var_msg = $connect->connect_error;
            throw new Exception($var_msg);
        }
    }catch(Exception $e){
        echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
    }
}
include('../../configs/closeDB.php');
?>
 <a href="festivalInfor.php">
    <div class="back">
        <i class="ti-arrow-left"></i>
    </div>
</a>
<h1 class="title"> Edit Festival Information</h1>
<div class="container my-5 mx-5 px-5" style="overflow-y: scroll; height:500px;">                
    <form action="edit.php?action=edit&id=<?php echo $festID ?>" method="POST">
        <div class="mb-3 row">
            <label for="festName" class="fw-bold">Festival Name</label>
            <input type="text" class="form-control" id="festName" value="<?php echo $result_fest['festName']??'' ?>" name="festName">                       
        </div>
        <div class="mb-3 row">
            <label for="nation" class="fw-bold">Nation</label>
            <input type="text" class="form-control" id="nation" value="<?php echo $result_fest['nation'] ??'' ?>" name="nation">                        
        </div>
        <div class="mb-3 row">
            <label for="description" class="fw-bold">Description</label>
            <textarea class="rounded textarea" name="description" id="description">
               <?php echo $result_fest['festDescription']??'' ?>
            </textarea>
        </div>
        <div class="mb-3 row">
            <label for="catName" class="fw-bold">CatName</label>
            <select name="catID" id="catName" class="p-2 rounded">
                <?php foreach($result_cat as $row): ?>
                    <option value="<?php echo $row['catID'] ?>" <?php if($row['catID']==$result_fest['catID']){echo 'selected';} ?> ><?php echo $row['catName']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3 row">
                <label for="relID" class="fw-bold">Religion</label>
                <select name="relID" id="relID" class="p-2 rounded">
                <?php foreach($result_rel as $rrow): ?>
                    <option value="<?php echo $rrow['relID'] ?>" <?php if($rrow['relID']==$result_fest['relID']){echo 'selected';} ?> ><?php echo $rrow['relName']?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-5 row">
                <label for="month" class="fw-bold">Month</label>
                <select name="month" id="month" class="p-2 rounded">
                    <option value="Jan" <?php if($result_fest['month']=='Jan'){echo 'selected';} ?>>January</option>
                    <option value="Feb" <?php if($result_fest['month']=='Feb'){echo 'selected';} ?>>February</option>
                    <option value="Mar" <?php if($result_fest['month']=='Mar'){echo 'selected';} ?>>March</option>
                    <option value="Apr" <?php if($result_fest['month']=='Apr'){echo 'selected';} ?>>April</option>
                    <option value="May" <?php if($result_fest['month']=='May'){echo 'selected';} ?>>May</option>
                    <option value="Jun" <?php if($result_fest['month']=='Jun'){echo 'selected';} ?>>June</option>
                    <option value="Jul" <?php if($result_fest['month']=='Jul'){echo 'selected';} ?>>July</option>
                    <option value="Aug" <?php if($result_fest['month']=='Aug'){echo 'selected';} ?>>August</option>
                    <option value="Sep" <?php if($result_fest['month']=='Sep'){echo 'selected';} ?>>September</option>
                    <option value="Oct" <?php if($result_fest['month']=='Oct'){echo 'selected';} ?>>October</option>
                    <option value="Nov" <?php if($result_fest['month']=='Nov'){echo 'selected';} ?>>November</option>
                    <option value="Dec" <?php if($result_fest['month']=='Dec'){echo 'selected';} ?>>December</option>
                </select>
        </div>                   
        <div class="mb-3 row">
            <input class="btn btn-primary" type="submit" name="edit" value="SAVE">
        </div>
    </form>
</div>
<?php include('../../template/footer.php') ?>