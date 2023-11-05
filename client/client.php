<?php
session_start();
require '../db.php';


$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$image = $_FILES['image'];


if(!$name){
    $_SESSION['null'] = 'You should input your name!';
    header('location:../index.php#contact');
}
else{
    if(!$email){
        $_SESSION['null2'] = 'You should input your mail';
        header('location:../index.php#contact');
    }
    else{
        if(!$subject){
            $_SESSION['null3'] = 'Write your subject';
            header('location:../index.php#contact');
        }
        else{
            if(!$message){
                $_SESSION['null4'] = 'Write a message!';
                header('location:../index.php#contact');
            }
            else{
                if($image['name']==''){
                    $_SESSION['null5'] = 'Please insert an image';
                    header('location:../index.php#contact');
                }
                else{
                $after_explode = explode('.', $image['name']);
                $extension = end($after_explode);
                $file_name = 'client'.'-'.rand(1000,2000).'.'.$extension;
                $new_location = '../uploads/clients/'.$file_name;
                move_uploaded_file($image['tmp_name'], $new_location);
                
                $insert = "INSERT INTO messages(name, email, subject, image, message)VALUES('$name', '$email', '$subject', '$file_name', '$message')";
                mysqli_query($db_connect, $insert);
                $_SESSION['success'] = 'Your message has sent!';
                header('location:../index.php#contact');
                }
            }
        }
    }
}


?>