<?php 
include('../../template/header.php');
 ?>
 <a href="users.php">
    <div class="back">
        <i class="ti-arrow-left"></i>
    </div>
</a>
 <h1 class="title"> Add A Admin </h1>
<div class="container my-5 px-5">
    <form action="usercontrol.php" method="POST">
        <div class="mb-3 row px-5">
            <label for="userName" class="fw-bold">Admin Name</label>
            <input type="text" class="form-control" id="userName" name="userName" placeholder="Admin name" required>                       
        </div>
        <div class="mb-3 row px-5">
            <label for="userPassword" class="fw-bold">Password</label>
            <input type="text" class="form-control" id="userPassword" name="userPassword">                      
        </div>
        <div class="mb-3 row px-5">
            <label for="userPhone" class="fw-bold">Phone Number</label>
            <input type="text" class="form-control" id="userPhone" name="userPhone">                       
        </div>
        <div class="mb-5 row px-5">
            <label for="userEmail" class="fw-bold">Email</label>
            <input type="text" class="form-control" id="userEmail" name="userEmail" placeholder="nguyenvana@gmail.com">                       
        </div>
        <div class="mb-3 row px-5">
            <input type="submit" class="btn btn-primary" name="submit" value="Add">   
        </div>
    </form>
</div>
 <?php include('../../template/footer.php') ?>