<?php
session_start();
require '../db.php';

$id = $_POST['user_id'];
$name = $_POST['name'];
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);


if(empty($name)){
    $_SESSION['name_required'] = "Name Required";
    header('location:profile.php');
}
else{
    if(empty($password)){
        $update = "UPDATE users SET name='$name' WHERE id='$id'";
        mysqli_query($db_connect, $update);
    
        $_SESSION['update'] = "Profile info updated";
        header('location:profile.php');
    }
    else{
        $update = "UPDATE users SET name='$name', password='$after_hash' WHERE id='$id'";
        mysqli_query($db_connect, $update);
    
        $_SESSION['update'] = "Profile info updated";
        header('location:profile.php');
    }
}
?>