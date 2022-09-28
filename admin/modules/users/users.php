<?php 
include('../../template/header.php');
include('../../configs/connectDB.php');
    $sql = "SELECT * FROM users";
    $qr = $connect->query($sql);
    $result = $qr->fetch_all(MYSQLI_ASSOC);
include('../../configs/closeDB.php');
 ?>
<h1 class="title"> Member Management</h1>
<div class="container my-5">
     <a class="btn btn-primary" href="insert.php"><i class="ti-plus"></i>  Admin</a>
    <table class="table">
    <thead>
        <tr>
        <th>STT</th>
        <th>Admin Name</th>
        <th>Admin ID</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Email</th>
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
        <td><?php echo $row['userName']?></td>
        <td><?php echo $row['userID'] ?></td>
        <td><?php echo $row['userPassword'] ?></td>
        <td><?php echo $row['userPhone']?></td>
        <td><?php echo $row['userEmail']?></td>
        <td>
            <a href="edit.php?action=edit&id=<?php echo $row['userID'] ?>" class="btn btn-primary">Edit</a>
            <a href="usercontrol.php?action=delete&id=<?php echo $row['userID'] ?>" class="btn btn-primary">Delete</a>
        </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
</div>
<?php include('../../template/footer.php') ?>

           