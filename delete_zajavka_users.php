<?php
    session_start();
    // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
    $id = $_POST['del_zajav_users'];
    $sql = "DELETE FROM task WHERE id=$id";
    mysqli_query($db, $sql);
    header('Location: /lk.php');
?>