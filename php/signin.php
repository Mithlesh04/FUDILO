<?php

include_once('db.php');

$email = $_GET['email'];
$pswd = $_GET['pswd'];

if($email&&$pswd){

    $q = $conn->query("SELECT id FROM users WHERE (email='$email' AND password='$pswd')");//change

    if(mysqli_num_rows($q)){
        $r= $q->fetch_assoc();
        if(isset($_COOKIE['_id_'])&&$_COOKIE['_id_']){
            $_COOKIE['_id_'] = $r['id'];
        }else{
            setcookie('_id_',$r['id'],time()+60,'/');
        }
        echo 1;
    }else{
        echo 0;//sign in first
    }
}


?>