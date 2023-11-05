<?php
session_start();
require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$after_hash = password_hash($password, PASSWORD_DEFAULT);
$gender = $_POST['gender'];


$flag = false;
if(!$name){
    $flag=true;
    $_SESSION['invalid_in'] = 'Please input somthing';
}
if(!$email){
    $flag=true;
    $_SESSION['invalid_mail']= 'Please input your mail';
}

else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $flag=true;
    $_SESSION['invalid_mail']= 'Please input valid mail';
    }
}
if(!$password){
    $flag=true;
    $_SESSION['invalid_pass']= 'Invalid password';
}
else{
    $upper = preg_match('@[A-Z]@', $password);
    $lower = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $special = preg_match('@[!,$,%,^,&,*,]@', $password);
    if(!$upper){
    $flag=true;
    $_SESSION['invalid_pass']= 'Upper case should input';
    }
    if(!$lower){
    $flag=true;
    $_SESSION['invalid_pass']= 'lower case should input'; 
    }
    if(!$number){
    $flag=true;
    $_SESSION['invalid_pass']= 'Number should input';
    }
    if(!$special){
    $flag=true;
    $_SESSION['invalid_pass']= 'Special charecter should input';
    }
    if(strlen($password) < 8){
       $flag=true;
    $_SESSION['invalid_pass']= 'Minimum 8 charecter should input';
    }
}
if(!$gender){
    $flag=true;
    $_SESSION['invalid_gender']= 'Select your gender';
}
if($flag){
    header('location:Form.php');
}
else{

    $select = "SELECT count(*) as found FROM users WHERE email='$email'";
    $select_query = mysqli_query($db_connect, $select);
    $after_assoc = mysqli_fetch_assoc($select_query);

    if($after_assoc['found'] == 0){
    $insert = "INSERT INTO users(name, email, password, gender)VALUES('$name', '$email', '$after_hash', '$gender')";
    mysqli_query($db_connect, $insert);
    $_SESSION['success'] = 'User registered successfully!';
    header('location:Form.php');
    }
    else{
        $_SESSION['exist'] = 'User info alredy exist!';
        header('location:Form.php');
    }


    
}
?>