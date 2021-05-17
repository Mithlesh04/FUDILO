<?php

include_once('db.php');

if(isset($_COOKIE['_id_'])&&$_COOKIE['_id_']){
    $id = $_COOKIE['_id_'];
    $q = $conn->query("SELECT * FROM users WHERE id='$id'");//change

    if(mysqli_num_rows($q)){
        $d = $q->fetch_assoc();
        unset($d['id']);
        unset($d['password']);
        $d['status']=true;
        echo json_encode($d);
    }else{
        echo json_encode(array('status'=>false));//sign in first
    }
}


?>