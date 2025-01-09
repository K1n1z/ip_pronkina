<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ИП Пронькина личный кабинет">
    <meta name="Keywords" content="ИП Пронькина, Бухгалтер на удаленке, Онлайн бухгалтер, Дистанционный бухгалтер"> 
    <link rel="shortcut icon" href="image/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="mobile.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Личный кабинет</title>
</head>
<body>
    <?php
        session_start();
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

    <div class="lk_form">
        <div class="users">
            Личный кабинет
        </div>
    <?php
        $id = $_SESSION['id'];
        if (isset($id)) {
        require("bd.php"); //Подключение к БД
        $sql = "SELECT * FROM users WHERE id = $id"; //Выполняем запрос к БД и сохраняем ответ
        $result = mysqli_query($db, $sql); //Преобразуем ответ в формат удобный
        $dates = mysqli_fetch_all($result); /* КОМАНДА my_sqli_fetch_all преобразует ответ сервера баз данных в массив, с которым удобно работать */
        if (isset($dates)) {
        foreach ($dates as $value) { /*проходимся по каждому индексу в массиве dates в качестве переменной value*/
            /*Вывод личных данных пользователя с бд*/
        echo '<div class="lk"> 
        <div class="lks">
            <div class="lk_text"> Логин: </div> 
            <div class="lk_texts">'.$value[1].'</div>
        </div> 
        <div class="lks">
            <div class="lk_text"> Имя: </div> 
            <div class="lk_texts">'.$value[3].'</div>
        </div>
        <div class="lks">
            <div class="lk_text"> Фамилия: </div>
            <div class="lk_texts">'.$value[4].'</div>
        </div>
        <div class="lks">
            <div class="lk_text"> Отчество: </div>
            <div class="lk_texts">'.$value[5].'</div>
        </div>
        <div class="lks">
            <div class="lk_text"> Электронная почта: </div>
            <div class="lk_texts">'.$value[6].'</div>
        </div>
        <div class="key_exit">
        <form action="exit.php" method="POST">
        <input class="regk" type="submit" name="exit" value="Выйти">
        </form>
        </div>
        </div>   
        ';
        $id_status = $value[7]; // Нужная переменная для определения статуса пользователя
        } }
        if ($id_status == 1) {
            echo "<br><br><div class='pod'><form action='zajavka.php'><input class='regk' type='submit' value='Подача заявления на ведение бизнеса'></form></div>
            <br><br><br><div class='pod'>Ваши заявления</div>";
        }
        //Вывод заявок пользователя
        $sql_zajavka = "SELECT * FROM task WHERE id_users = $id";
        $result_zajavka = mysqli_query($db, $sql_zajavka);
        $dates_zajavka = mysqli_fetch_all($result_zajavka);
        if (isset($dates_zajavka)) {
            foreach ($dates_zajavka as $info_zajavka) {
                echo '<div class="lk">';
                echo "<div class='lks_text'>Номер заявки: ".$info_zajavka[0]."</div>";
                echo "<div class='lks_text'>Название организации: ".$info_zajavka[2]."</div>";
                $sql_uslugi = "SELECT * FROM uslugi WHERE id=$info_zajavka[3]";
                        $result_uslugi = mysqli_query($db, $sql_uslugi);
                        $dates_uslugi = mysqli_fetch_all($result_uslugi);
                        if (isset($dates_uslugi)) {
                            foreach ($dates_uslugi as $usluga_z) {
                                echo "<div class='lks_text'>Услуга: ".$usluga_z[1]."</div>";
                            }
                        }
                $sql_opf = "SELECT * FROM opfs WHERE id=$info_zajavka[4]";
                        $result_opf = mysqli_query($db, $sql_opf);
                        $dates_opf = mysqli_fetch_all($result_opf);
                        if (isset($dates_opf)) {
                            foreach ($dates_opf as $opf_z) {
                                echo "<div class='lks_text'>Организационно-правовая форма: ".$opf_z[1]."</div>";
                            }
                        }
                    if (!empty($info_zajavka[5])) {
                echo "<div class='lks_text'>Описание: ".$info_zajavka[5]."</div>";
            }
                echo "<div class='lks_text'>Телефон: ".$info_zajavka[6]."</div>";
                $sql_st = "SELECT * FROM status WHERE id=$info_zajavka[7]";
                        $result_st = mysqli_query($db, $sql_st);
                        $dates_st = mysqli_fetch_all($result_st);
                        if (isset($dates_st)) {
                            foreach ($dates_st as $st_z) {
                                echo "<div class='lks_text'>Статус заявки: ".$st_z[1]."</div>";
                            }
                        }
                echo "<div class='key_exit'> <form action='delete_zajavka_users.php' method='POST'>
                <input type='text' name='del_zajav_users' value='".$info_zajavka[0]."' style = 'display:none'>
                <input type='submit' value='Удалить заявку' class='regk'>
                </form> </div></div><br>";
            }
        }
        //Разделение прав пользователей по их статусу
        if ($id_status == 3) {
            echo "<br><br><div class='lks'><form action='users_status_up.php'><input class='regk' type='submit' value='Список всех пользователей'></form></div><br>";
        } 
        if ($id_status == 2 or $id_status == 3) {
            echo "<div class='lks'><form action='form_news.php'><input class='regk' type='submit' value='Создать новость'></form></div><br>";
        } 
        //Проверка заявок пользователей
        if ($id_status > 1) {
            echo "<div class='zak'>
            <div class='lkss'>Заявки пользователей</div>
            </div>";
            $sql_one = "SELECT DISTINCT * FROM task WHERE id_status=1";
            $result_one = mysqli_query($db, $sql_one);
            $dates_one = mysqli_fetch_all($result_one);
            if (isset($dates_one)) {
                foreach ($dates_one as $key) {
                    $id_task = $key[0];
                    $id_users = $key[1];
                    echo "<div class='probel'></div><div class='lk'><div class='lks_text'>Номер заявки: ".$id_task."</div>";
                    
                    
                    $sql_p = "SELECT * FROM users WHERE id=$id_users";
                    $result_p = mysqli_query($db, $sql_p);
                    $dates_p = mysqli_fetch_all($result_p);
                    if (isset($dates_p)) {
                        foreach ($dates_p as $vay) {
                            echo "<div class='lks_text'>Имя пользователя: ".$vay[3]."</div>";
                            echo "<div class='lks_text'>Фамилия пользователя: ".$vay[4]."</div>";
                            echo "<div class='lks_text'>Отчество пользователя: ".$vay[5]."</div>";
                            echo "<div class='lks_text'>Электронная почта: ".$vay[6]."</div>";
                        }
                    }

                    echo "<div class='lks_text'>Номер телефона: ".$key[6]."</div>";
                    echo "<div class='lks_text'>Название организации: ".$key[2]."</div>";

                    $sql_u = "SELECT * FROM uslugi WHERE id=$key[3]";
                    $result_u = mysqli_query($db, $sql_u);
                    $dates_u = mysqli_fetch_all($result_u);
                    if (isset($dates_u)) {
                        foreach ($dates_u as $usluga) {
                            echo "<div class='lks_text'>Услуга: ".$usluga[1]."</div>";
                        }
                    }

                    $sql_o = "SELECT * FROM opfs WHERE id=$key[4]";
                    $result_o = mysqli_query($db, $sql_o);
                    $dates_o = mysqli_fetch_all($result_o);
                    if (isset($dates_o)) {
                        foreach ($dates_o as $opf) {
                            echo "<div class='lks_text'>Организационно-правовая форма: ".$opf[1]."</div>";
                        }
                    }

                    echo "<div class='lks_text'>Описание: ".$key[5]."</div>";

                    echo "<div class='lks_text'>";

                    echo '<form method="post" action="change_status_task.php">';
                    echo '<input type="text" name="id_change_status" value='.$id_task.' class="invisible">';
                    echo '<input class="reg" list="list_one" name="change_status" autocomplete="off"> <datalist id="list_one">';
                        $sql1 = "SELECT * FROM status";
                        $result1 = mysqli_query($db, $sql1);
                        $dates1 = mysqli_fetch_all($result1);
                        foreach ($dates1 as $up_st) {
                        echo "<option value='".$up_st[1]."'></option>";
                        } 
                    echo '</datalist> <input type="submit" class="regk" value="Сменить статус"></form></div></div>';
                }
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