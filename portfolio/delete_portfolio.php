<?php 
    session_start();
    require '../db.php';

    $id = $_GET['id'];

    $select_photo = "SELECT * FROM portfolios WHERE id=$id";
    $select_res = mysqli_query($db_connect, $select_photo);
    $after_assoc = mysqli_fetch_assoc($select_res);

    $delete = '../uploads/portfolios/'.$after_assoc['image'];
    unlink($delete);


    $delete = "DELETE FROM portfolios WHERE id=$id";
    mysqli_query($db_connect, $delete);
    $_SESSION['delete_portfolio'] = 'Portfolio Deleted!';
    header('location:portfolio.php');





?>