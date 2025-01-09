<?php
    session_start(); //Начало сессии
    session_destroy(); //Закрытие сессии
    header('Location: /'); //Переадресация на главную страницу
?>