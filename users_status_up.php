<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ИП Пронькина">
    <meta name="Keywords" content="ИП Пронькина, Бухгалтер на удаленке, Онлайн бухгалтер, Дистанционный бухгалтер"> 
    <link rel="shortcut icon" href="image/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="mobile.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Список пользователей</title>
</head>
<body>
<?php
        session_start();
        $id = $_SESSION['id'];
        if (empty($id)) {
            header('Location: /log_in.php');
        }
        require("bd.php"); //Подключение к БД
        $result = mysqli_query($db,"SELECT * FROM users WHERE id = $id");
        $id_status_bd = mysqli_fetch_array($result);
        $id_status = $id_status_bd['id_status'];
        if ($id_status == 1) {
            header('Location: /lk.php');
        } 
        if ($id_status == 2) {
            header('Location: /lk.php');
        } 
    ?>
    <script src="/js/bootstrap.js"></script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        <img src="/image/logo.png" alt="logo" width="27" height="30" class="d-inline-block align-text-top">ИП Пронькина</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="services.php">Услуги</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="news.php">Новости</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="contacts.php">Контакты</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about_us.php">О нас</a>
                </li>
            </ul>
            <?php
                if (empty($_SESSION['login']) or empty($_SESSION['id']))
                {
                // Если пусты, то мы не выводим ссылку
                    echo '<a href="log_in.php"><button class="btn btn-outline-secondary" type="submit">Вход/Регистрация</button></a>';   // <!-- кнопка входа и регистарации -->
                }
                else
                {
                // Если не пусты, то мы выводим ссылку и кнопку выхода из сессии 
                echo '<a href="lk.php"><button class="btn btn-outline-secondary" type="submit">Личный кабинет</button></a>';
            }
            ?>
            </div>
        </div>
        </nav>
    <div class="users">Список пользователей</div>
    <div class="zaks">
    <?php
        require("bd.php"); //Подключение к БД
        if (isset($id)) {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($db, $sql);
        $dates = mysqli_fetch_all($result);
        if (isset($dates)) {
            foreach ($dates as $value) {
                echo '<div class="users_cont">';
                echo '<div class="lks_text">Номер пользователя: '.$value[0].'</div>';
                echo '<div class="lks_text">Логин пользователя: '.$value[1].'</div>';
                echo '<div class="lks_text">Имя пользователя: '.$value[3].'</div>';
                echo '<div class="lks_text">Фамилия пользователя: '.$value[4].'</div>';
                echo '<div class="lks_text">Отчество пользователя: '.$value[5].'</div>';
                echo '<div class="lks_text">Почта пользователя: '.$value[6].'</div>';

                $sql_st = "SELECT * FROM users_status WHERE id=$value[7]";
                $result_st = mysqli_query($db, $sql_st);
                $dates_st = mysqli_fetch_all($result_st);
                if (isset($dates_st)) {
                    foreach ($dates_st as $users_st) {
                        echo '<div class="lks_text">Статус пользователя: '.$users_st[1].'</div>';
                    }
                }
                
                echo '<div class="lks_text">';
                echo '<form method="post" action="change_users_status_up.php">';
                echo '<input type="text" name="id_users" value='.$value[0].' class="invisible">';
                echo '<input class="reg" list="list_one" name="users_status" autocomplete="off"> <datalist id="list_one">';
                $sql_st_up = "SELECT * FROM users_status";
                $result_st_up = mysqli_query($db, $sql_st_up);
                $dates_st_up = mysqli_fetch_all($result_st_up);
                    foreach ($dates_st_up as $users_st_up) {
                        echo '<option value='.$users_st_up[1].'></option>';
                    } 
                echo '</datalist> <input type="submit" class="regk" value="Сменить статус"></form></div>';
                echo '</div>';
            }
        }
    } else {
        header('Location: /log_in.php');
    }
    ?>
    </div>

    <footer>
        <div class="info_footer">
            <div>
            <div><a href="index.php">ИП Пронькина</a></div>
            </div>
            <div>
                Почта: Natalya.Pronkina@bk.ru <br> 
                Тел. +7 (909) 840-16-47 <br> 
                г.Хабаровск, ул.Уссурийская 7
            </div>
            <div>
                <a href="services.php">Услуги</a><br>
                <a href="news.php">Новости</a><br>
                <a href="contacts.php">Контакты</a><br>
                <a href="about_us.php">О нас</a>
            </div>
        </div>
        <div class="prav_footer">
            <div>© ИП ПРОНЬКИНА 2022</div>
        </div>
    </footer>
</body>
</html>