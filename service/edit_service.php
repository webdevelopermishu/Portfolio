<?php session_start();?>
<?php require '../db.php';?>
<?php

$id = $_POST['id'];

$edit_title = $_POST['title'];
$short_desc = $_POST['short_desc'];


if(!$edit_title){
    $_SESSION['not_changed'] = 'Service not changed!';
    header('location:service.php');
}
else{
    $update = "UPDATE services SET title='$edit_title', short_desc='$short_desc' WHERE id='$id'";
    mysqli_query($db_connect, $update);

    $_SESSION['title_changed'] = 'Service Updated!';
    header('location:service.php');
}


?>