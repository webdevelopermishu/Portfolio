<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$user_photo = "SELECT * FROM users WHERE id=$id";
$photo_res = mysqli_query($db_connect, $user_photo);
$after_assoc = mysqli_fetch_assoc($photo_res);

$delete = '../uploads/users/'.$after_assoc['image'];
unlink($delete);

$delete = "DELETE FROM users WHERE id=$id";
mysqli_query($db_connect, $delete);
$_SESSION['user_delete']='User Deleted';
header('location:user_list.php');

?>