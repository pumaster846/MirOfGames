<?php
session_start();
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
    <title>Авторизация</title>
</head>

<body>
    <div class="authentication-wrapper">
        <div class="authentication-header">
            <a href="/index.php">
                <img src="/media/Logo.png" alt="MirOFGames">
            </a>
            <div class="authentication-block">
                <div class="authentication-header__title">У вас еще нет аккаунта?</div>
                <a href="sign-up.php" class="authentication-link__login"><i class="fa-solid fa-arrow-right-to-bracket"></i>Регистрация</a>
            </div>
        </div>
        <form method="post" class="authentication-form">
            <div class="authentication-form__page-title">Авторизация</div>
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
                    <input type="password" class="authentication-form-control" placeholder="Пароль" name="userPassword">
                </div>
                <input type="submit" value="Войти" name="btnLogin" class="btn-autoriz btn-login">
                <?php
                if (isset($_POST['btnLogin'])) {
                    $Login = $_POST['userLogin'];
                    $Password = md5($_POST['userPassword']);
                    if ($_POST['userLogin'] and $_POST['userPassword'] != '') {
                        foreach ($users as $n) {
                            if (($n['Login'] == $Login) and ($n['Password'] == $Password)) {
                                $_SESSION['authorization'] = true;
                                $_SESSION['userID'] = $n['User_ID'];
                                $_SESSION['userName'] = $n['Login'];
                                $_SESSION['userRole'] = $n['Role'];
                                echo '<script type="text/javascript">location.href="/index.php"</script>';
                                exit;
                            } else {
                                $_SESSION['authorization'] = false;
                                continue;
                            }
                        }
                        echo "<div class='subheader err-msg'>Неверный Логин или Пароль!</div>";
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