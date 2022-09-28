<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbconn = new mysqli($host,$username,$password);
//check connection
if ($dbconn->connect_error) {
	die('Connect was failed: '.$dbconn->connect_error);
}
//create DB
$sql = "CREATE DATABASE MoonLight";
if ($dbconn->query($sql)===TRUE) {
	echo "You have successfully created a database!";
}else{
	echo "You have an error while creating database: ".$dbconn->error;
}
$dbconn->close();