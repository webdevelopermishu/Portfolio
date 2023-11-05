<?php 
session_start();
require '../db.php';

$id = $_POST['user_id'];
$image = $_FILES['image'];
$after_explode = explode('.',$image['name']);
$extension = end($after_explode);
$allowed_extensions = ['jpeg', 'jpg', 'png'];
$user = "SELECT * FROM users WHERE id=$id";
$user_pi = mysqli_query($db_connect, $user);
$after_assoc = mysqli_fetch_assoc($user_pi);

if($after_assoc['image'] == NULL){
    if(in_array($extension, $allowed_extensions)){
        if($image['size'] <= 2000000){
            $file_name = $id.  '.' .$extension;
            $new_location = '../uploads/users/' .$file_name;
            move_uploaded_file($image['tmp_name'], $new_location);
    
            $update = "UPDATE users SET image='$file_name' WHERE id=$id";
            mysqli_query($db_connect, $update);
            $_SESSION['updated'] = 'Image updated successfully!';
            header('location:profile.php');
        }
        else{
            $_SESSION['invalid_format'] = 'Maximum size should 2MB';
            header('location:profile.php');
        }
    }
    else{
        $_SESSION['invalid_format'] = "Select an Image first!";
        header('location:profile.php');
    }
}
else{
    

    if(in_array($extension, $allowed_extensions)){
        if($image['size'] <= 2000000){
            
            $delete_from = '../uploads/users/'.$after_assoc['image'];
            unlink($delete_from);


            $file_name = $id.  '.' .$extension;
            $new_location = '../uploads/users/' .$file_name;
            move_uploaded_file($image['tmp_name'], $new_location);
    
            $update = "UPDATE users SET image='$file_name' WHERE id=$id";
            mysqli_query($db_connect, $update);
            $_SESSION['updated'] = 'Image updated successfully!';
            header('location:profile.php');
        }
        else{
            $_SESSION['invalid_format'] = 'Maximum size should 2MB';
            header('location:profile.php');
        }
    }
    else{
        $_SESSION['invalid_format'] = "Invalid Format! only 'jpeg' 'jpg' & 'png' are allowed";
        header('location:profile.php');
    }
    
}





?> 