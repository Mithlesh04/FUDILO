<?php
// error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "FUDILO";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!mysqli_select_db($conn,$dbName)){
    $sql="CREATE DATABASE ".$dbName;
    if($conn->query($sql)===FALSE) {
        die("Error creating database: ".$conn->error);
    }else{
        $conn = mysqli_connect($servername, $username, $password,$dbName);         
    }
} 

$table = "
CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id),
    name   CHAR(100) NOT NULL,
    email  CHAR(100) NOT NULL,
    password  CHAR(100) NOT NULL)
";

if ($conn->query($table) === FALSE) {
    die("Error creating table: " . $conn->error);
  }


?>