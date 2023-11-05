<?php 
    session_start();
    require '../db.php';

    $topic_name = $_POST['topic_name'];
    $percentage = $_POST['percentage'];

if(!$topic_name){
    $_SESSION['topic_null'] = 'Please input a topic first!';
    header('location:expertise.php');
}
else{
    $insert= "INSERT INTO expertises(topic_name, percentage)VALUES('$topic_name', '$percentage')";
    mysqli_query($db_connect, $insert);
    $_SESSION['topc_update'] = 'New skill added!';
    header('location:expertise.php');
}

?>