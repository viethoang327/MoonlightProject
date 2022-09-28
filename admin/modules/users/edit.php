<?php 
include('../../template/header.php');
include('../../configs/connectDB.php');
    if(isset($_GET['action'])&&$_GET['action']=='edit'){
        $userID = $_GET['id'];
        try{
            $sql = "SELECT * FROM users WHERE userID = $userID";
            if($connect->query($sql)){
                $query = $connect->query($sql);
                $result = $query->fetch_array(MYSQLI_ASSOC);
            }else{
                echo "<h2 style=\"color:red;\">ERROR_msm:</h2> " . "<p>" . $e->getMessage() . "</p>";
            }
        }
        catch(Exception $e){

        }
    }
include('../../configs/closeDB.php');
 ?>
 <a href="users.php">
    <div class="back">
        <i class="ti-arrow-left"></i>
    </div>
</a>
 <h1 class="title"> Edit Admin's Information </h1>
<div class="container my-5 px-5">
    <form action="usercontrol.php" method="POST">
        <input type="hidden" name="userID" value="<?php echo $userID; ?>">
        <div class="mb-3 row px-5">
            <label for="userName" class="fw-bold">Admin Name</label>
            <input type="text" class="form-control" id="userName" value="<?php echo $result['userName'] ?>" name="userName" placeholder="Admin name" required>                       
        </div>
        <div class="mb-3 row px-5">
            <label for="userPassword" class="fw-bold">Password</label>
            <input type="text" class="form-control" id="userPassword" value="<?php echo $result['userPassword'] ?>" name="userPassword">                      
        </div>
        <div class="mb-3 row px-5">
            <label for="userPhone" class="fw-bold">Phone Number</label>
            <input type="text" class="form-control" id="userPhone" value="<?php echo $result['userPhone'] ?>" name="userPhone">                       
        </div>
        <div class="mb-5 row px-5">
            <label for="userEmail" class="fw-bold">Email</label>
            <input type="text" class="form-control" id="userEmail" value="<?php echo $result['userEmail'] ?>" name="userEmail">                       
        </div>
        <div class="mb-3 row px-5">
            <input type="submit" class="btn btn-primary" name="edit" value="Save">   
        </div>
    </form>
</div>
 <?php include('../../template/footer.php') ?>