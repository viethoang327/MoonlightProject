<?php
include('connectDB.php');
// CREATE TABLE category
$sql_cat = "CREATE TABLE category(
    catID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    catName NVARCHAR(50) NOT NULL  
);";
if($connect->query($sql_cat)){
    echo "catalog table has been created successfully <br/>";
}else{
    echo "catalog table has been created failed <br/>";
}
// CREATE TABLE festival
$sql_festival = "CREATE TABLE festival(
    festID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    festName NVARCHAR(150) NOT NULL,
    nation VARCHAR(50) NOT NULL,
    festDescription TEXT NOT NULL,
    catID INT NOT NULL,
    relID INT NOT NULL,
    month VARCHAR(10)
);";
if($connect->query($sql_festival)){
    echo "festival table has been created successfully <br/>";
}else{
    echo "festival table has been created failed <br/>";
}
// CREATE TABLE users
$sql_user = "CREATE TABLE users(
    userID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    userEmail VARCHAR(100) NOT NULL,
    userPassword VARCHAR(20) NOT NULL,
    userName NVARCHAR(100) NOT NULL,
    userPhone VARCHAR(20) NOT NULL
);";
if($connect->query($sql_user)){
    echo "users table has been created successfully <br/>";
}else{
    echo "users table has been created failed <br/>";
}
// CREATE TABLE religion
$sql_religion = "CREATE TABLE religion(
    relID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    relName NVARCHAR(100) NOT NULL
);";
if($connect->query($sql_religion)){
    echo "religion table has been created successfully <br/>";
}else{
    echo "religion table has been created failed <br/>";
}
// CREATE TABLE gallery
$sql_gallery = "CREATE TABLE gallery(
    galID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    festID INT NOT NULL,
    imgDescription VARCHAR(255) NOT NULL,
    imgLink VARCHAR(255) NOT NULL
);";
if($connect->query($sql_gallery)){
    echo "gallery table has been created successfully <br/>";
}else{
    echo "gallery table has been created failed <br/>";
}
// CREATE TABLE feedback
$sql_feedback = "CREATE TABLE feedback(
    fedID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    festID INT,
    comment NVARCHAR(255) NOT NULL
);";
if($connect->query($sql_feedback)){
    echo "feedback table has been created successfully <br/>";
}else{
    echo "feedback table has been created failed <br/>";
}
// CREATE TABLE contactus
$sql_contactus = "CREATE TABLE contactus(
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    question VARCHAR(255) NOT NULL
);";
if($connect->query($sql_contactus)){
    echo "contactus table has been created successfully <br/>";
}else{
    echo "contactus table has been created failed <br/>";
}
// ADD CONSTRAINT 
$sql_addconstraint = 
"ALTER TABLE festival
ADD CONSTRAINT FK_CategoryFestival
FOREIGN KEY (catID) REFERENCES category(catID);

ALTER TABLE festival
ADD CONSTRAINT FK_ReligionFestival
FOREIGN KEY (relID) REFERENCES religion(relID);

ALTER TABLE feedback
ADD CONSTRAINT FK_FeedbackFestival
FOREIGN KEY (festID) REFERENCES festival(festID);

ALTER TABLE gallery
ADD CONSTRAINT FK_FestivalGallery
FOREIGN KEY (festID) REFERENCES festival(festID);
";

include('closeDB.php');