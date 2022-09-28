<?php 
include('../../template/header.php');
include('../../configs/connectDB.php');
// GET CATEGORY FETCH TO CATEGORY TABLE;
    $sql_cat = "SELECT * FROM category";
    $qr_cat = $connect->query($sql_cat);
    $result_cat = $qr_cat->fetch_all(MYSQLI_ASSOC);
    $i =0;
// GET RELIGION FETCH TO RELIGION TABLE;
    $sql_rel = "SELECT * FROM religion";
    $qr_rel = $connect->query($sql_rel);
    $result_rel = $qr_rel->fetch_all(MYSQLI_ASSOC);
    $x=0;
include('../../configs/closeDB.php');
?>
<a href="festivalInfor.php">
    <div class="back">
        <i class="ti-arrow-left"></i>
    </div>
</a>
<h1 class="title"> Insert Festival Information</h1>
<div class="container my-5">
    <div class="row">
            <div class="col-sm-5" style="overflow-y: scroll; height:550px;">
                <div class="row">
                    <form action="festivalcontrol.php" method="POST" enctype='multipart/form-data'>
                        <label for="Category" class="fw-bold">Category</label>
                        <input type="text" class="form-control" name="catName" placeholder="Category Name">
                        <textarea name="catIntro" placeholder=" Category Introduction" cols="66" rows="3"></textarea>
                        <span class="fw-light">Category Background</span><input type="file" class="form-control" name="catBackground">
                        <input class="btn btn-primary" type="submit" name="category" value="ADD">
                    </form>
                </div>
                <div class="row" style="overflow: scroll; height:200px;">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>STT</th>
                            <th>Category</th>
                            <th>Introduction</th>
                            <th>Background</th>
                            <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($result_cat as $row):
                            $i++;
                         ?>
                            <tr>    
                            <td><?php echo $i ?></td>
                            <td><?php echo $row['catName'] ?></td>
                            <td><?php echo $row['catIntro'] ?></td>
                            <td><img src="../../img/categoryupload/<?php echo $row['catBackground'] ?>" alt="<?php echo $row['catBackground'] ?>" width="100%"></td>
                            <td>
                                <a href="festivalcontrol.php?delcat=del&id=<?php echo $row['catID'] ?>" class="btn btn-primary">Delete</a>
                            </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">-------------------------------------------------------------------------</div>
                <div class="row">
                    <form action="festivalcontrol.php" method="POST">
                        <label for="relName" class="fw-bold">Religion</label>
                        <input type="text" class="form-control" id="relName" name="relName">
                        <input class="btn btn-primary" type="submit" name="religion" value="ADD">
                    </form>
                </div>
                <div class="row" style="overflow: scroll; height:200px;">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>STT</th>
                            <th>Religion</th>
                            <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result_rel as $rrow): $x++;?>
                                
                            <tr>    
                            <td><?php echo $x ?></td>
                            <td><?php echo $rrow['relName'] ?></td>
                            <td>
                                <a href="festivalcontrol.php?delrel=del&id=<?php echo $rrow['relID'] ?>" class="btn btn-primary">Delete</a>
                            </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>                
            </div>
            <div class="col-sm-1"></div>
            <!-- INSERT DATA TO FESTIVAL TABLE -->
            <div class="col" style="overflow-y: scroll; height:550px;">                
                <form action="festivalcontrol.php" method="POST">
                    <div class="mb-3 row">
                        <label for="festName" class="fw-bold">Festival Name</label>
                        <input type="text" class="form-control" id="festName" name="festName">                       
                    </div>
                    <div class="mb-3 row">
                        <label for="nation" class="fw-bold">Nation</label>
                        <input type="text" class="form-control" id="nation" name="nation">                       
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="fw-bold">Description</label>
                        <textarea class="rounded" name="description" id="description" cols="30" rows="7"></textarea>
                    </div>
                    <div class="mb-3 row">
                        <label for="catName" class="fw-bold">CatName</label>
                        <select name="catID" id="catName" class="p-2 rounded">
                            <?php foreach($result_cat as $row): ?>
                                <option value="<?php echo $row['catID'] ?>"><?php echo $row['catName']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3 row">
                            <label for="relID" class="fw-bold">Religion</label>
                            <select name="relID" id="relID" class="p-2 rounded">
                            <?php foreach($result_rel as $rrow): ?>
                                <option value="<?php echo $rrow['relID'] ?>"><?php echo $rrow['relName']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-5 row">
                            <label for="month" class="fw-bold">Month</label>
                            <select name="month" id="month" class="p-2 rounded">
                                <option value="Jan" >January</option>
                                <option value="Feb" >February</option>
                                <option value="Mar" >March</option>
                                <option value="Apr" >April</option>
                                <option value="May" >May</option>
                                <option value="Jun" >June</option>
                                <option value="Jul" >July</option>
                                <option value="Aug" >August</option>
                                <option value="Sep" >September</option>
                                <option value="Oct" >October</option>
                                <option value="Nov" >November</option>
                                <option value="Dec" >December</option>
                            </select>
                    </div>                   
                    <div class="mb-3 row">
                        <input class="btn btn-primary" type="submit" name="addfest" value="ADD">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
<?php include('../../template/footer.php') ?>