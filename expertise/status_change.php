<?php 

require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM expertises WHERE id=$id";
$after_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($after_res);

if($after_assoc['status']==0){
    $update = "UPDATE expertises SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:expertise.php');
}
else{
    $update = "UPDATE expertises SET status=0 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:expertise.php');
}
?>