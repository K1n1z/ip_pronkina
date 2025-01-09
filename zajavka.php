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
    <title>Заявление на обслуживание</title>
</head>
<body>
    <?php
        session_start();
        if (empty($_SESSION['id'])) {
            header('Location: /log_in.php');
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
    <div class="regs">Заявление на обслуживание</div>
    <div class="forms">
        <form action="save_z.php" method="POST">
            <div class="forma">
            <div class="formr">
                <div class="reg_text">Название организации</div>
                <div class="form_cont"><input class="reg" type="text" name="name" required></div>
            </div>

            <div class="formr">
                <div class="reg_text">Услуга</div>
                <div class="form_cont"><input class="reg" list="list_one" name="uslugi" autocomplete="off" required>
                <datalist id='list_one'>
                    <?php 
                        require("bd.php");
                        $sql = "SELECT * FROM uslugi";
                        $result = mysqli_query($db, $sql);
                        $dates = mysqli_fetch_all($result);
                        foreach ($dates as $key) {
                        echo "<option value='".$key[1]."'></option>";
                        }
                    ?>
                </datalist> <!-- В поле для паролей (name="password" type="password") пользователь вводит свой пароль --> 
            </div>
            </div>

            <div class="formr">
                <div class="reg_text">Организационно-правовая форма</div>
                <div class="form_cont"><input class="reg" list="list_two" name="opf" autocomplete="off" required>
                <datalist id='list_two'>
                    <?php 
                        require("bd.php");
                        $sql1 = "SELECT * FROM opfs";
                        $result1 = mysqli_query($db, $sql1);
                        $dates1 = mysqli_fetch_all($result1);
                        foreach ($dates1 as $key1) {
                        echo "<option value='".$key1[1]."'></option>";
                        }
                    ?>
            </datalist> <!-- В поле для паролей (name="password" type="password") пользователь вводит свой пароль --> 
            </div>
            </div>

            <div class="formr">
                <div class="reg_text">Описание</div>
                <div class="form_cont"><textarea class="regg" type="text" name="info"></textarea></div>
            </div>

            <div class="formr">
                <div class="reg_text">Номер телефона</div>
                <div class="form_cont"><input class="reg" type="text" name="phone" required></div>
            </div>

            </div>
            <div class="formb">
            <input class="regk" type="submit" name="submit" value="Подать заявление">
            </div>
        </form>
    </div>
</body>
</html>