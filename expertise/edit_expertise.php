<?php session_start();?>
<?php require '../db.php';?>
<?php

$id = $_POST['id'];

$edit_topic_name = $_POST['topic_name'];
$edit_percentage = $_POST['percentage'];


if(!$edit_topic_name){
    $_SESSION['not_changed'] = 'Skill not changed!';
    header('location:expertise.php');
}
else{
    $update = "UPDATE expertises SET topic_name='$edit_topic_name', percentage='$edit_percentage' WHERE id='$id'";
    mysqli_query($db_connect, $update);

    $_SESSION['topic_changed'] = 'skill Updated!';
    header('location:expertise.php');
}


?>