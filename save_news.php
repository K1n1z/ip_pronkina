<?php
    session_start();
    $id_users = $_SESSION['id'];
    $zagolovok = $_POST['zagolovok'];
    $info = $_POST['info'];
    $date = date("Y-m-d H:i:s", time());

    $name = "img/".$_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], $name);

    // подключаемся к базе
    include("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
    // если такого нет, то сохраняем данные
    $sql = "INSERT INTO news (zagolovok, info, link_photo, date, id_users) VALUES('$zagolovok','$info','$name','$date','$id_users')";
    $result = mysqli_query ($db, $sql);
    // Проверяем, есть ли ошибки
    if ($result=='TRUE')
    {
        header('Location: /news.php');
    }
    else {
    echo "Ошибка! Не получилось опубликовать новость, <a href='form_news.php'>назад</a>.";
    }
?>