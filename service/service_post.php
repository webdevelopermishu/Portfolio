<?php 
    session_start();
    require '../db.php';

    $title = $_POST['title'];
    $short_desc = $_POST['short_desc'];

if(!$title){
    $_SESSION['service_null'] = 'Please input a service first!';
    header('location:service.php');
}
else{
    $insert= "INSERT INTO services(title, short_desc)VALUES('$title', '$short_desc')";
    mysqli_query($db_connect, $insert);
    $_SESSION['service_aded'] = 'New service added!';
    header('location:service.php');
}

?>