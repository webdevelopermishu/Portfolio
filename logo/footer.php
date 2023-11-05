<?php
session_start();
require '../db.php';


$footer_logo = $_FILES['footer_logo'];
$after_explode = explode('.', $footer_logo['name']);
$extension = end($after_explode);
$allowed_extensions = ['jpeg', 'jpg', 'png'];

$select_logo = "SELECT * FROM logos WHERE id=1";
$select_res = mysqli_query($db_connect, $select_logo);
$after_assoc = mysqli_fetch_assoc($select_res);

if($footer_logo['name'] == NULL){
    $_SESSION['required2'] = 'Select a file first!';
    header('location:logo.php');
}
else{
    if(in_array($extension, $allowed_extensions)){
        if($footer_logo['size'] <= 2000000){
            
            $delete_from = '../uploads/logos/' . $after_assoc['footer_logo'];
            unlink($delete_from);
    
    
            $file_name = 'footer_logo'.  '.' .$extension;
            $new_location = '../uploads/logos/' .$file_name;
            move_uploaded_file($footer_logo['tmp_name'], $new_location);
    
            $update = "UPDATE logos SET footer_logo='$file_name' WHERE id=1";
            mysqli_query($db_connect, $update);
            $_SESSION['updated2'] = 'Footer logo updated successfully!';
            header('location:logo.php');
        }
        else{
            $_SESSION['invalid_format2'] = 'Maximum size should 2MB';
            header('location:logo.php');
        }
    }
    else{
        $_SESSION['invalid_format2'] = "Invalid Format! only 'jpeg' 'jpg' & 'png' are allowed";
        header('location:logo.php');
    }
}

?>