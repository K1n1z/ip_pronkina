<?php
    session_start();
    // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
    $id = $_POST['id_users'];
    $status_bd = $_POST['users_status'];
    $result = mysqli_query($db, "SELECT * FROM users_status WHERE status='$status_bd'");
    $id_status_bd = mysqli_fetch_array($result);
    $id_status = $id_status_bd['id'];
    $sql = "UPDATE users SET id_status=$id_status WHERE id=$id";
    mysqli_query($db, $sql);
    header('Location: /users_status_up.php');
?>