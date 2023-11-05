<?php 
    session_start();
    require '../db.php';

    $id = $_GET['id'];

    $select = "SELECT * FROM messages WHERE id=$id";
    $select_res = mysqli_query($db_connect, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);

    $delete = '../uploads/clients/'.$after_assoc['image'];
    unlink($delete);


    $delete = "DELETE FROM messages WHERE id=$id";
    mysqli_query($db_connect, $delete);
    $_SESSION['delete_message'] = 'Message Deleted!';
    header('location:client_info.php');





?>