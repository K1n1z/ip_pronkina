<?php
    //подключение к базе данных
    $db = mysqli_connect ("localhost","root","");//("ваш MySQL сервер","логин к этому серверу","пароль к этому серверу")
    mysqli_select_db ($db,'pronkina');//("имя базы, к которой подключаемся",$db)
?>