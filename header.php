<div class="header">
    <div class="header-block">
        <a href="/index.php">
            <img src="/media/Logo.png" alt="MirOFGames">
        </a>
    </div>
    <div class="header-block">
        <ul class="header-menu">
            <li class="header-menu__item">
                <a href="/webpages/news/news.php" class="header-menu__link">новости</a>
            </li>
            <li class="header-menu__item">
                <a href="/webpages/games/games.php" class="header-menu__link">игры</a>
            </li>
            <li class="header-menu__item">
                <?
                if ($_SESSION['authorization'] == true) : ?>
                    <span class="header-menu__user-login">
                        <?= $_SESSION['userName']; ?>
                    </span>
                    <a href="/php/authorization/logout.php">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                <? else : ?>
                    <div class="header-menu__link" id="showAutorizBlock">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    </div>
                <? endif; ?>
            </li>
        </ul>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Авторизация</div>
                <div class="modal-body">
                    <form method="post">
                        <fieldset>
                            <div class="input-block">
                                <span class="autoriz-icon autoriz-icon__user">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Логин" name="userLogin">
                            </div>
                            <div class="input-block">
                                <span class="autoriz-icon autoriz-icon__password">
                                    <i class="fa-solid fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" placeholder="Пароль" name="userPassword">
                            </div>
                            <input type="submit" value="войти" name="btnLogin" class="btn-autoriz btn-login">
                            <div class="subheader">Еще нет аккаунта?</div>
                            <a href="/php/authorization/sign-up.php" class="btn-autoriz btn-signup">Зарегестрироваться</a>
                        </fieldset>
                    </form>
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
                </div>
            </div>
        </div>
    </div>
</div>