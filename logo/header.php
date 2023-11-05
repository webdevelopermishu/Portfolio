<?php
session_start();
require '../db.php';


$header_logo = $_FILES['header_logo'];
$after_explode = explode('.', $header_logo['name']);
$extension = end($after_explode);
$allowed_extensions = ['jpeg', 'jpg', 'png'];

$select_logo = "SELECT * FROM logos WHERE id=1";
$select_res = mysqli_query($db_connect, $select_logo);
$after_assoc = mysqli_fetch_assoc($select_res);

if($header_logo['name'] == NULL){
    $_SESSION['required'] = 'Select a file first!';
    header('location:logo.php');
}
else{
    if(in_array($extension, $allowed_extensions)){
        if($header_logo['size'] <= 2000000){
            
            $delete_from = '../uploads/logos/' . $after_assoc['header_logo'];
            unlink($delete_from);
    
    
            $file_name = 'header_logo'.  '.' .$extension;
            $new_location = '../uploads/logos/' .$file_name;
            move_uploaded_file($header_logo['tmp_name'], $new_location);
    
            $update = "UPDATE logos SET header_logo='$file_name' WHERE id=1";
            mysqli_query($db_connect, $update);
            $_SESSION['updated'] = 'Header logo updated successfully!';
            header('location:logo.php');
        }
        else{
            $_SESSION['invalid_format'] = 'Maximum size should 2MB';
            header('location:logo.php');
        }
    }
    else{
        $_SESSION['invalid_format'] = "Invalid Format! only 'jpeg' 'jpg' & 'png' are allowed";
        header('location:logo.php');
    }
}

?>