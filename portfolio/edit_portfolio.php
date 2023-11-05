<?php session_start();?>
<?php require '../db.php';?>
<?php

$id = $_POST['id'];

$select = "SELECT * FROM portfolios WHERE id=$id";
$select_res = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

$edit_title = $_POST['title'];
$edit_category = $_POST['category'];
$edit_image = $_FILES['image'];

if(!$edit_title && !$edit_category){
    $_SESSION['not_changed'] = 'Portfolio not changed!';
    header('location:portfolio.php');
}
else{
    $after_explode = explode('.', $edit_image['name']);
    $extension = end($after_explode);
    $file_name = 'portfolio'.'-'. rand(1000,3000).'.'.$extension;
    $new_location = '../uploads/portfolios/'.$file_name;
    move_uploaded_file($edit_image['tmp_name'], $new_location);

    $delete = '../uploads/portfolios/'.$after_assoc['image'];
    unlink($delete);

    $update = "UPDATE portfolios SET title='$edit_title', category='$edit_category', image='$file_name' WHERE id='$id'";
    mysqli_query($db_connect, $update);

    $_SESSION['title_changed'] = 'Portfolio Updated!';
    header('location:portfolio.php');
}


?>