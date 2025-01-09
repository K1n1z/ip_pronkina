<?php
    session_start();
    if (isset($_POST['captcha'])) { $captcha = $_POST['captcha']; if ($captcha == '') { unset($captcha);} } //заносим введенный пользователем логин в переменную $captcha, если он пустой, то уничтожаем переменную
    
    if ($_SESSION['rand'] != $captcha) {
        exit("Ошибка! Вы ввели не правильную капчу, <a href='registrations.php'>назад</a>.");
    }

    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} } //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (isset($_POST['first_name'])) { $first_name = $_POST['first_name']; if ($first_name =='') { unset($first_name);} } //заносим введенный пользователем имя в переменную $first_name, если он пустой, то уничтожаем переменную
    if (isset($_POST['last_name'])) { $last_name = $_POST['last_name']; if ($last_name =='') { unset($last_name);} } //заносим введенный пользователем фамилию в переменную $last_name, если он пустой, то уничтожаем переменную
    if (isset($_POST['second_name'])) { $second_name = $_POST['second_name']; if ($second_name =='') { unset($second_name);} } //заносим введенный пользователем отчество в переменную $second_name, если он пустой, то уничтожаем переменную
    if (isset($_POST['email'])) { $email = $_POST['email']; if ($email =='') { unset($email);} } //заносим введенный пользователем почту в переменную $email, если он пустой, то уничтожаем переменную

    if (empty($login) or empty($password) or empty($first_name) or empty($last_name) or empty($second_name) or empty($email) or empty($captcha)) //если пользователь ничего не вел, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь <a href='registrations.php'>назад</a> и заполните все поля!");
    }

    $id_status = 1;

    //если все введенно, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $first_name = stripslashes($first_name);
    $first_name = htmlspecialchars($first_name);
    $last_name = stripslashes($last_name);
    $last_name = htmlspecialchars($last_name);
    $second_name = stripslashes($second_name);
    $second_name = htmlspecialchars($second_name);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);

    //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    $first_name = trim($first_name);
    $last_name = trim($last_name);
    $second_name = trim($second_name);
    $email = trim($email);

    //добавляем проверку на длину логина и пароля
    if (strlen($login) < 5 or strlen($login) > 16) {
        exit    ("Логин должен состоять не менее чем из 5 символов и не более чем из 15, вернитесь <a href='registrations.php'>назад</a>.");
    }
    if    (strlen($password) < 5 or strlen($password) > 31) {
        exit    ("Пароль должен состоять не менее чем из 5 символов и не более чем из 30, вернитесь <a href='registrations.php'>назад</a>.");
    }          

    // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
    // проверка на существование пользователя с таким же логином
    $result = mysqli_query($db,"SELECT id FROM users WHERE login='$login'");
    if(!$result){
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин, <a href='registrations.php'>назад</a>");
    }
    // если такого нет, то сохраняем данные
    $result2 = mysqli_query ($db,"INSERT INTO users (login, password, first_name, last_name, second_name, email, id_status) VALUES('$login','$password','$first_name','$last_name','$second_name','$email','$id_status')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
        header('Location: /log_in.php');
    }
    else {
    echo "Ошибка! Вы не зарегистрированы, <a href='registrations.php'>назад</a>.";
    }
    
?>