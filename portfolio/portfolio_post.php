<?php 
    session_start();
    require '../db.php';

    $title = $_POST['title'];
    $category = $_POST['category'];
    $image = $_FILES['image'];

$flag = false;
if(!$title){
    $flag=true;
    $_SESSION['portfolio_null'] = 'Please input a portfolio first!';
}
if(!$category){
    $flag=true;
    $_SESSION['portfolio_null'] = 'Please input a category!';
}
if($image['name']==''){
    $flag=true;
    $_SESSION['portfolio_null'] = 'Please input an image!';
}
if($flag){
    header('location:portfolio.php');
}
else{
    $after_explode = explode('.', $image['name']);
    $extension = end($after_explode);
    $file_name = 'portfolio'.'-'.rand(1000, 3000).'.'.$extension;
    $new_location = '../uploads/portfolios/'.$file_name;
    move_uploaded_file($image['tmp_name'], $new_location);

    $insert= "INSERT INTO portfolios(title, category, image)VALUES('$title', '$category', '$file_name')";
    mysqli_query($db_connect, $insert);
    $_SESSION['portfolio_aded'] = 'New portfolio added!';
    header('location:portfolio.php');
}
?>