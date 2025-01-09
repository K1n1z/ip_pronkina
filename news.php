<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ИП Пронькина новости">
    <meta name="Keywords" content="ИП Пронькина, Бухгалтер на удаленке, Онлайн бухгалтер, Дистанционный бухгалтер"> 
    <link rel="shortcut icon" href="image/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="mobile.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Новости</title>
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
                <a class="nav-link active" aria-current="page" href="news.php">Новости</a>
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
    <div class="containers">
        <div class="news">
            <div class="two">
                <div class="one_text">Новости</div>
            </div>
        </div>
    </div>

    <div class="cont_news">
        <?php
            require("bd.php");
            $sql_one = "SELECT DISTINCT * FROM news";
            $result_one = mysqli_query($db, $sql_one);
            $dates_one = mysqli_fetch_all($result_one);
            if (isset($dates_one)) {
                foreach ($dates_one as $key) {
                    echo "<div class='newss'>
                    <div class='gtext_news'>".$key[1]."</div>
                    <img src='".$key[3]."' width='100%'>
                    <div class='text_news'>Подробная информаци: ".$key[2]."</div>
                    <div class='text_news'>Дата: ".$key[4]."</div>
                    </div>";
                    $id = $_SESSION['id'];
                    if (isset($id)) {
                    $sql_st = "SELECT * FROM users WHERE id=$id";
                    $result_st = mysqli_query($db, $sql_st);
                    $dates_st = mysqli_fetch_all($result_st);
                    if (isset($dates_st)) {
                        foreach ($dates_st as $value) {
                            $id_status = $value[7];
                        }
                    }
                    if ($id_status == 3) {
                        echo "<form action='delete_news.php' method='POST'>
                        <input type='text' name='del_news' value='".$key[0]."' class='invisible'>
                        <input type='submit' value='Удалить новость' class='regk'>
                        </form>";
                        $sql_info = "SELECT DISTINCT * FROM users WHERE id=$key[5]";
                        $result_info = mysqli_query($db, $sql_info);
                        $dates_info = mysqli_fetch_all($result_info);
                        if (isset($dates_info)) {
                            foreach ($dates_info as $info_users) {
                                echo "<br><div class='text_news'>Создал новость</div>";
                                echo "<div class='text_news'>Имя: ".$info_users[3]."</div>";
                                echo "<div class='text_news'>Фамилия: ".$info_users[4]."</div>";
                                echo "<div class='text_news'>Отчество: ".$info_users[5]."</div>";
                            }
                        }
                    }
    
                    }
                }
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