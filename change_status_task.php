<?php
    session_start();
    // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
    $id = $_POST['id_change_status'];
    $status_bd = $_POST['change_status'];
    $result = mysqli_query($db, "SELECT * FROM status WHERE status='$status_bd'");
    $id_status_bd = mysqli_fetch_array($result);
    $id_status = $id_status_bd['id'];
    $sql = "UPDATE task SET id_status=$id_status WHERE id=$id";
    mysqli_query($db, $sql);
    header('Location: /lk.php');
?>