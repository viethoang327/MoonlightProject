<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'MoonLight';
//create connection
$connect = new mysqli($host,$username,$password,$database);
if ($connect->connect_error) {
	die('Connection fail: '.$connect->connect_error);
}