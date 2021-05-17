<?php

include_once('db.php');

$name = $_GET['name'];
$email = $_GET['email'];
$pswd = $_GET['pswd'];


if($name&&$email&&$pswd){

    $q = $conn->query("SELECT email FROM users WHERE email='$email'");
    if(!mysqli_num_rows($q)){
        $q = $conn->query("INSERT INTO users(name,email,password) VALUES ('$name','$email','$pswd')");
        if($q){
            setcookie('_id_',$conn->insert_id,time()+60,'/');
            echo 1;//success
        }else{
            echo 102;//fail
        }
    }else{
        echo 101;//email already exists
    }
}


?>