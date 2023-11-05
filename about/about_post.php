<?php 
    session_start();

    require '../db.php';

    $nick_name = $_POST['nick_name'];
    $full_name = $_POST['full_name'];
    $designation = $_POST['designation'];
    $short_desc = $_POST['short_desc'];
    $image = $_FILES['image'];


    if($image['name'] == ''){
        $update = "UPDATE abouts SET nick_name='$nick_name', full_name='$full_name', designation='$designation', short_desc='$short_desc' WHERE id=1";
        $update_res = mysqli_query($db_connect, $update);
        $_SESSION['updated2'] = 'Informations updated successfully!';
        header('location:about.php');
    }
    else{
        $image = $_FILES['image'];
        $after_explode = explode('.', $image['name']);
        $extension = end($after_explode);
        $allowed_extensions = ['jpeg', 'jpg', 'png'];

        $select_image = "SELECT * FROM abouts WHERE id=1";
        $image_select_res = mysqli_query($db_connect, $select_image);
        $image_after_assoc = mysqli_fetch_assoc($image_select_res);

        if(in_array($extension, $allowed_extensions)){
            if($image['size'] <= 2000000){
                
                $delete_from = '../uploads/abouts/' . $image_after_assoc['image'];
                unlink($delete_from);
        
        
                $file_name = 'image'.  '.' .$extension;
                $new_location = '../uploads/abouts/' .$file_name;
                move_uploaded_file($image['tmp_name'], $new_location);
        
                $update = "UPDATE abouts SET nick_name='$nick_name', full_name='$full_name', designation='$designation', short_desc='$short_desc', image='$file_name' WHERE id=1";
                mysqli_query($db_connect, $update);
                $_SESSION['updated2'] = 'Informations & Image updated successfully!';
                header('location:about.php');
            }
            else{
                $_SESSION['invalid_format2'] = 'Maximum size should 2MB';
                header('location:about.php');
            }
        }
        else{
            $_SESSION['invalid_format2'] = "Invalid Format! only 'jpeg' 'jpg' & 'png' are allowed";
            header('location:about.php');
        } 
    }

?>