<?php 
include('../../template/header.php');
include('../../configs/connectDB.php');
    // FETCH DATA TO TABLE
    $sql = "SELECT * FROM festival 
    RIGHT JOIN gallery 
    ON festival.festID = gallery.festID
    RIGHT JOIN category
    ON festival.catID = category.catID
    RIGHT JOIN religion
    ON festival.relID = religion.relID
    ORDER BY festival.festID;";
    if($connect->query($sql)){
        $qr = $connect->query($sql);
        $result = $qr->fetch_all(MYSQLI_ASSOC);    
    }
include('../../configs/closeDB.php');
 ?>
<h1 class="title"> Festival Management</h1>
<div class="container my-5">
     <a class="btn btn-primary" href="insert.php"><i class="ti-plus"></i> Add</a>
     <div class="row" style="overflow-y: scroll; height:520px">
        <table class="table table-hover">
        <thead>
            <tr>
            <th>STT</th>
            <th>Festival Name</th>
            <th>Title</th>
            <th>Nation</th>
            <th>Image</th>
            <th>Information</th>
            <th>CatName</th>
            <th>Regilion</th>
            <th>Month</th>
            <th>Control</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=0;
            foreach($result as $row): 
                $i++;
            ?>   
            <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['festName'] ?></td>
            <td><?php echo $row['imgDescription'] ?></td>
            <td><?php echo $row['nation'] ?></td>
            <td>
                <img src="../gallerys/upload/<?php echo $row['imgLink'] ?>" alt="<?php echo $row['imgLink'] ?> " height="100px">
            </td>
            <td><?php echo $row['festDescription'] ?></td>
            <td><?php echo $row['catName'] ?></td>
            <td><?php echo $row['relName']?></td>
            <td><?php echo $row['month']?></td>
            <td>
                <a href="edit.php?action=edit&id=<?php echo $row['festID'] ?>" class="btn btn-primary">Edit</a>
                <a href="festivalcontrol.php?action=delete&id=<?php echo $row['festID'] ?>" class="btn btn-primary">Delete</a>
            </td>
            </tr>
            <?php endforeach ?>
        </tbody>
        </table>
     </div>   
</div>



<?php include('../../template/footer.php') ?>

           