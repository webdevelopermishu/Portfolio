<?php 

require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM messages WHERE id=$id";
$after_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($after_res);

if($after_assoc['status']==0){
    $update = "UPDATE messages SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:client_info.php');
}
else{
    $update = "UPDATE messages SET status=0 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:client_info.php');
}
?>