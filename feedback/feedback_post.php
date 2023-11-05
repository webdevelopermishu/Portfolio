<?php 
    session_start();
    require '../db.php';

    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $feedback = $_POST['feedback'];
    $image = $_FILES['image'];

$flag = false;
if(!$name){
    $flag=true;
    $_SESSION['feedback_null'] = 'Please input a feedback first!';
}
if(!$designation){
    $flag=true;
    $_SESSION['feedback_null'] = 'Please input your designation!';
}
if(!$feedback){
    $flag=true;
    $_SESSION['feedback_null'] = 'Please input your feedback!';
}
if($image['name']==''){
    $flag=true;
    $_SESSION['feedback_null'] = 'Please input an image!';
}
if($flag){
    header('location:feedback.php');
}
else{
    
    $after_explode = explode('.', $image['name']);
    $extension = end($after_explode);
    $file_name = 'profile'.'-'.rand(1000, 3000).'.'.$extension;
    $new_location = '../uploads/feedbacks/'.$file_name;
    move_uploaded_file($image['tmp_name'], $new_location);

    $insert= "INSERT INTO feedbacks(name, designation, image, feedback)VALUES('$name', '$designation', '$file_name', '$feedback')";
    mysqli_query($db_connect, $insert);
    $_SESSION['feedback_aded'] = 'New feedback added!';
    header('location:feedback.php');
}
?>