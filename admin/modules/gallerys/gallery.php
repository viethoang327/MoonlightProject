<?php 
include('../../template/header.php');
include('../../configs/connectDB.php');
// GET FESTIVAL NAME FROM DB
    $sql_fest = "SELECT festID,festName FROM festival ";
    $qr_fest = $connect->query($sql_fest);
    $rs_fest = $qr_fest->fetch_all(MYSQLI_ASSOC);
// SHOW ALL IMGS
    $sql_gal = "SELECT * FROM gallery";
    $qr_gal = $connect->query($sql_gal);
    $rs_gal = $qr_gal->fetch_all(MYSQLI_ASSOC);
    
include('../../configs/closeDB.php');
 ?>
 <a href="../festival/insert.php">
    <div class="back">
        <i class="ti-arrow-left"></i>
    </div>
</a>
<h1 class="title"> Gallery Management</h1>
    <div class="container my-5">
        <div class="row">
            <div class="col-sm-3">
                <form action="gallerycontrol.php" method="POST" enctype='multipart/form-data'>
                    <div class="row mb-3">
                        <label for="formFileMultiple" class="form-label fw-bold">Chose Images</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="file[]" multiple>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea name="description" id="description" class="rounded" style="height: 200px;" ></textarea>
                    </div>
                    <div class="row mb-3">
                        <label for="festName" class="form-label fw-bold">Festival Name</label>
                        <select name="festID" id="festName" class="p-2 rounded">
                            <?php foreach($rs_fest as $row): ?>
                                <option value="<?php echo $row['festID'] ?>"><?php echo $row['festName']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="row">
                        <button class="btn btn-primary" type="submit" name="submit">
                            ADD
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-sm-1"></div>
            <div class="col scroll" style="height:540px;">
                <table class="table">
                        <thead>
                            <tr>
                            <th>STT</th>
                            <th>Images</th>
                            <th>Description</th>
                            <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                         $i=0;
                         foreach($rs_gal as $rrow):
                            $i++;
                         ?>
                            <tr>    
                            <td><?php echo $i ?></td>
                            <td><img src="upload/<?php echo $rrow['imgLink']?>" alt="<?php $rrow['imgLink'] ?>" height="150px"></td>
                            <td><?php echo $rrow['imgDescription'] ?></td>
                            <td>
                                <a href="gallerycontrol.php?delgal=del&id=<?php echo $rrow['galID'] ?>" class="btn btn-primary">Delete</a>
                            </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
             </div>                   
        </div>
    </div>
<?php include('../../template/footer.php') ?>

           