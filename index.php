<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ИП Пронькина главная">
    <meta name="Keywords" content="ИП Пронькина, Бухгалтер на удаленке, Онлайн бухгалтер, Дистанционный бухгалтер"> 
    <link rel="shortcut icon" href="image/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="mobile.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Главная</title>
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

    <div class="containers">
        <div class="one">
            <div class="two">
                <div class="one_text">Удаленное бухгалтерское обслуживание</div>
            </div>
        </div>
    </div>
    <div class="warp">
        <div class="warp_text">
            ИП Пронькина - Незаменимый помощник в вашем бизнесе. Можете доверить работу с налогами и кадрами нам. Профессиональный подход к вашей и нашей работе.
        </div>
    </div>
    <div class="plus_info">
        <div class="plus_text_one">Наши преимущества</div>
        <div class="plus_text_two">С нами вы можете быть спокойны по поводу качества и сроков сдачи отчетности</div>
    </div>
    <div class="plus">

        <div class="plus_one">
            <div class="plus_cont">
                <div class="plus_icon"><img width="50px" height="44px"  src="image/lvl.ico"></div>
                <div class="plus_text">
                    <div class="plus_zag">Опыт работы</div>
                    <div class="plus_opis">Опыт работы и знание дела, полученные за годы профессиональной деятельности в разных сферах экономики</div>
                </div>
            </div>
        </div>

        <div class="plus_two">
            <div class="plus_cont">
                <div class="plus_icon"><img width="49px" height="50px"  src="image/money.ico"></div>
                <div class="plus_text">
                    <div class="plus_zag">Уменьшение затрат</div>
                    <div class="plus_opis">Гибкая ценовая политика, что позволит вам сэкономить на содержании штатного сотрудника</div>
                </div>
            </div>
        </div>

        </div>
        <div class="plus">

        <div class="plus_one">
            <div class="plus_cont">
                <div class="plus_icon"><img width="44px" height="44px"  src="image/lypa.ico"></div>
                <div class="plus_text">
                    <div class="plus_zag">Оптимизация налогов</div>
                    <div class="plus_opis">Мы уделяем серьезное внимание налоговой безопасности наших клиентов и минимизируем налоговые риски</div>
                </div>
            </div>
        </div>

        <div class="plus_two">
            <div class="plus_cont">
                <div class="plus_icon"><img width="50px" height="44px"  src="image/graphick.ico"></div>
                <div class="plus_text">
                    <div class="plus_zag">Комплексный подход</div>
                    <div class="plus_opis">Мы берем на себя ведение бухгалтерского, налогового и кадрового учета под ключ</div>
                </div>
            </div>
        </div>

        </div>
        <div class="plus">

        <div class="plus_one">
            <div class="plus_cont">
                <div class="plus_icon"><img width="46px" height="50px"  src="image/doc.ico"></div>
                <div class="plus_text">
                    <div class="plus_zag">Строго в рамках закона</div>
                    <div class="plus_opis">Выполняем работу и все пожелания клиента исключительно в рамках действующего законодательства</div>
                </div>
            </div>
        </div>

        <div class="plus_two">
            <div class="plus_cont">
                <div class="plus_icon"><img width="50px" height="44px"  src="image/phone.ico"></div>
                <div class="plus_text">
                    <div class="plus_zag">Мобильность</div>
                    <div class="plus_opis">Вы можете запросить информацию о состоянии учета вашей компании из любой точки мира и мы в</div>
                </div>
            </div>
        </div>

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