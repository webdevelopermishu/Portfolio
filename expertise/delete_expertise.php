<?php 
    session_start();
    require '../db.php';

    $id = $_GET['id'];


    $delete = "DELETE FROM expertises WHERE id=$id";
    mysqli_query($db_connect, $delete);
    $_SESSION['delete_skill'] = 'Skill Deleted!';
    header('location:expertise.php');





?>