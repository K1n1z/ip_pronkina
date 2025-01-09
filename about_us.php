<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ИП Пронькина о нас">
    <meta name="Keywords" content="ИП Пронькина, Бухгалтер на удаленке, Онлайн бухгалтер, Дистанционный бухгалтер"> 
    <link rel="shortcut icon" href="image/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="mobile.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>О нас</title>
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
                <a class="nav-link active" aria-current="page" href="about_us.php">О нас</a>
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
        <div class="about_us">
            <div class="two">
                <div class="one_text">О нас</div>
            </div>
        </div>
    </div>
    <div class="warp_about">
        <div class="warp_text_about">
            Наша цель — забрать ваши ежедневные задачи, которые отнимают время, и привести учёт и документы к безупречному состоянию. 
            Возьмём на себя всю бухгалтерию, налоги и подготовим отчётность точно в срок. 
            Будем вести кадровый учёт и расчёты с сотрудниками. 
            Подготовим первичку, документы для налоговой и снизим налоги для вашего бизнеса.
        </div>
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