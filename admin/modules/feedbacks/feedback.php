<?php 
include('../../template/header.php');
include('../../configs/connectDB.php');
//SHOW ALL FEEDBACK
$sql = "SELECT * FROM feedback,festival WHERE feedback.festID=festival.festID";
try{
    if($connect->query($sql)){
        $query = $connect->query($sql);
        $results = $query->fetch_all(MYSQLI_ASSOC);
    }else{
        $var_msg = $connect->connect_error;
        throw new Exception($var_msg);
    }
}
catch(Exception $e){
    echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
}
//SHOW ALL CONTACT INFORMATION
$sql1 = "SELECT * FROM contactus";
try{
    if($connect->query($sql1)){
        $query1 = $connect->query($sql1);
        $results1 = $query1->fetch_all(MYSQLI_ASSOC);
    }else{
        $error = $connect->connect_error;
        throw new Exception($error);
    }
}
catch(Exception $e){
    echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
}
 ?>
<h1 class="title"> Feedback Management</h1>
<div class="container my-4">
    <div class="row border border-dark rounded">    
        <div class="col-md-9 text-center border-end" style="overflow-y: scroll; height:580px">
            <h3>Customer's Comment</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Festival Name</th>
                        <th scope="col">Name</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Comment Time</th>
                        <th scope="col">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    foreach($results as $row):
                        $i++;
                    ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $row['festName'] ?></td>
                        <td><?php echo $row['fedName'] ?></td>
                        <td><?php echo $row['comment'] ?></td>
                        <td><?php echo $row['postTime'] ?></td>
                        <td><a href="feedbackcontrol.php?action=delete&fedID=<?php echo $row['fedID'] ?>" class="btn btn-primary">Delete</a></td>
                    </tr>
                    <?php endforeach ?>
            </table>
        </div>
        <div class="col-md-3" style="overflow-y: scroll; height:580px">
            <h3>Contact Information</h3>
            <table class="table">
                <?php 
                $x=0;
                foreach($results1 as $row1): 
                    $x++;
                ?>
                <thead>
                    <th scope="col"><?php echo $x?></th>
                    <th scope="col">Control</th>
                </thead>
                <tbody>
                    <tr>
                        <td>                        
                           <strong>Name: </strong> <?php echo $row1['name']?> <br>
                           <strong>Email: </strong> <?php echo $row1['email']?><br>
                           <strong>Phone: </strong> <?php echo $row1['phone']?><br>
                           <strong>Message: </strong> <br> <?php echo $row1['message']?><br>                          
                        </td>
                        <td><a href="feedbackcontrol.php?action=deleteContact&id=<?php echo $row1['ID'] ?>" class="btn btn-primary btn-sm">Delete</a></td>
                    </tr>
                </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>
<?php include('../../template/footer.php') ?>