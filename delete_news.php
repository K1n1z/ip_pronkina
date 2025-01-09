<?php
    session_start();
    // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
    $id = $_POST['del_news'];
    $sql = "DELETE FROM news WHERE id=$id";
    mysqli_query($db, $sql);
    header('Location: /news.php');
?>