<?php
session_start();
require'db.php';

$email = $_POST['email'];
$password = $_POST['password'];


$select = "SELECT count(*) as found FROM users WHERE email='$email'";
$select_query = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_query);

if($after_assoc['found']==1){
    $user = "SELECT * FROM users WHERE  email='$email'";
    $user_query = mysqli_query($db_connect, $user);
    $after_assoc_user = mysqli_fetch_assoc($user_query);
    $password_verify = password_verify($password, $after_assoc_user['password']);

    if($password_verify){
        $_SESSION['loged_in'] = 'User loged in';
        $_SESSION['user_id'] = $after_assoc_user['id'];
        header('location:admin.php');
    }
    else{
        $_SESSION['wrong'] = 'Wrong Password';
        header('location:login.php');
    }
}
else{
    $_SESSION['invalid_user'] = 'Invalid user';
    header('location:login.php');
}
if(empty($password)){
    $_SESSION['wrong'] = 'Wrong Password';
    header('location:login.php');
}
if(!$password_verify){
    $_SESSION['wrong'] = 'Wrong Password';
}
?>