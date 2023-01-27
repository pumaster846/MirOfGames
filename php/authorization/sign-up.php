<?php
require_once('../connection-db/logic.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5dd8e1247e.js" crossorigin="anonymous"></script>
    <title>Регистрация</title>
</head>

<body>
    <div class="authentication-wrapper">
        <div class="authentication-header">
            <a href="/index.php">
                <img src="/media/Logo.png" alt="MirOFGames">
            </a>
            <div class="authentication-block">
                <div class="authentication-header__title">У вас уже есть аккаунт?</div>
                <a href="login.php" class="authentication-link__login"><i class="fa-solid fa-arrow-right-to-bracket"></i>Авторизация</a>
            </div>
        </div>
        <form method="post" class="authentication-form">
            <div class="authentication-form__page-title">Регистрация</div>
            <fieldset>
                <div class="input-block">
                    <span class="autoriz-icon autoriz-icon__user">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" class="authentication-form-control" placeholder="Логин" name="userLogin">
                </div>
                <div class="input-block">
                    <span class="autoriz-icon autoriz-icon__password">
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" class="authentication-form-control" placeholder="Придумайте Пароль" name="userPassword">
                    <input type="password" class="authentication-form-control" placeholder="Повторите Пароль" name="userPasswordRepeat">
                </div>
                <input type="submit" value="Зарегистрироваться" name="btnRegistration" class="btn-autoriz btn-login">
                <?php
                if (isset($_POST['btnRegistration'])) {
                    $Login = $_POST['userLogin'];
                    $Password = md5($_POST['userPassword']);
                    if ($_POST['userLogin'] and $_POST['userPassword'] != '') {
                        if ($_POST['userPassword'] == $_POST['userPasswordRepeat']) {
                            foreach ($users as $n) {
                                if ($_POST['userLogin'] == $n['Login']) {
                                    echo "<div class='subheader err-msg'>Такой Логин уже существует!</div>";
                                    exit;
                                }
                            }
                            $sql = "INSERT INTO `users` SET `Login` = ?, `Password` = ?, `Role` = 'user'";
                            $data = $pdo->prepare($sql);
                            $data->execute(array("$_POST[userLogin]", "$Password"));
                            echo "<script type='text/javascript'>location.href='/php/authorization/login.php'</script>";
                        } else {
                            echo "<div class='subheader err-msg'>Пароли не совпадают!</div";
                        }
                    } else {
                        echo "<div class='subheader err-msg'>Введите Логин или Пароль!</div>";
                    }
                }
                ?>
            </fieldset>
        </form>
    </div>
</body>

</html>