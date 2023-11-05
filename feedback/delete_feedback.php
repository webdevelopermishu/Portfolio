<?php 
    session_start();
    require '../db.php';

    $id = $_GET['id'];

    $select = "SELECT * FROM feedbacks WHERE id=$id";
    $select_res = mysqli_query($db_connect, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);

    $delete = '../uploads/feedbacks/'.$after_assoc['image'];
    unlink($delete);


    $delete = "DELETE FROM feedbacks WHERE id=$id";
    mysqli_query($db_connect, $delete);
    $_SESSION['delete_feedback'] = 'Feedback Deleted!';
    header('location:feedback.php');





?>