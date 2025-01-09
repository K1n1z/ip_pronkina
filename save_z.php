<?php
    session_start();
    $id_user = $_SESSION["id"];
    $id_status = 1;
    if (isset($_POST['name'])) { $name = $_POST['name']; if ($name == '') { unset($name);} } //заносим введенный пользователем логин в переменную $name, если он пустой, то уничтожаем переменную
    if (isset($_POST['uslugi'])) { $uslugi=$_POST['uslugi']; if ($uslugi =='') { unset($uslugi);} } //заносим введенный пользователем пароль в переменную $uslugi, если он пустой, то уничтожаем переменную
    if (isset($_POST['opf'])) { $opf = $_POST['opf']; if ($opf =='') { unset($opf);} } //заносим введенный пользователем пароль в переменную $forma, если он пустой, то уничтожаем переменную
    if (isset($_POST['info'])) { $info = $_POST['info']; if ($info =='') { unset($info);} } //заносим введенный пользователем пароль в переменную $info, если он пустой, то уничтожаем переменную
    if (isset($_POST['phone'])) { $phone = $_POST['phone']; if ($phone =='') { unset($phone);} } //заносим введенный пользователем пароль в переменную $phone, если он пустой, то уничтожаем переменную
    
    if (empty($name) or empty($uslugi) or empty($opf) or empty($phone)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь <a href='zajavka.php'>назад</a> и заполните все поля!");
    } 

    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $uslugi = stripslashes($uslugi);
    $uslugi = htmlspecialchars($uslugi);
    $opf = stripslashes($opf);
    $opf = htmlspecialchars($opf);
    $info = stripslashes($info);
    $info = htmlspecialchars($info);

    //удаляем лишние пробелы
    $name = trim($name);
    $uslugi = trim($uslugi);
    $opf = trim($opf);
    $info = trim($info);

    // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

    $result_opf = mysqli_query($db, "SELECT * FROM opfs WHERE forma='$opf'");
    $id_opf_bd = mysqli_fetch_array($result_opf);
    $id_opf = $id_opf_bd['id'];

    $result_uslugi = mysqli_query($db, "SELECT * FROM uslugi WHERE name='$uslugi'");
    $id_uslugi_bd = mysqli_fetch_array($result_uslugi);
    $id_uslugi = $id_uslugi_bd['id'];

    // проверка на существование пользователя с таким же логином
    $result = mysqli_query($db,"SELECT id FROM task WHERE name='$name'");
    if(!$result){
    exit ("Извините, с таким названием организация уже подало заявление или уже обслуживается. Проверте, правильно ли вы написали название организации, <a href='zajavka.php'>назад</a>.");
    }
    // если такого нет, то сохраняем данные
    $result2 = mysqli_query($db,"INSERT INTO task (id_users, name, id_uslugi, id_opf, info, phone, id_status) VALUES('$id_user','$name','$id_uslugi','$id_opf','$info','$phone','$id_status')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
        header('Location: /lk.php');
    }
    else {
    echo "Ошибка! Ваша заявка не зарегистрирована, <a href='zajavka.php'>назад</a>.";
    }
?>