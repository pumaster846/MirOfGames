<?php
session_start();
require_once('connection-db/logic.php');
if (isset($_GET['game'])) {
    $gameID = $_GET['game'];
}
$sql = "SELECT * FROM `games`
WHERE `Game_ID` = " . $gameID;
$getGame = $pdo->query($sql);
$gameContent = $getGame->fetchAll();

$sql2 = "SELECT * FROM `news`
INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
WHERE `Game_ID` = " . $gameID . "
ORDER BY `News_date` DESC LIMIT 4";
$data2 = $pdo->query($sql2);
$gameNews = $data2->fetchAll();

$sql3 = "SELECT * FROM `users_screenshots`
WHERE `Game_ID` = " . $gameID . " AND `Archive` = '1'
ORDER BY `Screenshot_ID` DESC LIMIT 8";
$data3 = $pdo->query($sql3);
$gameScreenshots = $data3->fetchAll();

$sql5 = "SELECT * FROM `comments`
INNER JOIN `games` ON `comments`.`Game_ID` = `games`.`Game_ID`
INNER JOIN `users` ON `comments`.`User_ID` = `users`.`User_ID`
WHERE `games`.`Game_ID` = " . $gameID . "
ORDER BY `Comm_ID` DESC LIMIT 10";
$data5 = $pdo->query($sql5);
$usersComments = $data5->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MirOFGames. Игра</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/css/media.css">
    <script src="https://kit.fontawesome.com/5dd8e1247e.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="/webpages/games/js/jquery.cookies.js"></script>
</head>

<body>
    <div class="wrapper">

        <!-- Header content -->

        <? include('../../header.php'); ?>

        <div class="body">
            <? foreach ($gameContent as $n) : ?>
                <div class="page__two-colums">
                    <div class="first-column">
                        <div class="game-card">
                            <img src="<?= $n['Game_preview_img'] ?>" alt="<?= $n['Game_name'] ?>">
                            <div class="game-card__info-block">
                                <div class="game-name"><?= $n['Game_name'] ?></div>
                                <div>
                                    <?php
                                        $array = $n['Game_genres'];
                                        $js = json_decode($array);
                                        echo implode(', ', $js);
                                    ?>
                                </div>
                                <div>Дата выхода:
                                    <? $date = strtotime($n['Game_date']);
                                    echo date("d.m.Y", $date) ?>
                                </div>
                                <div>Разработчик: <?= $n['Game_developer'] ?></div>
                                <div>Цены в официальных магазинах:
                                    <div><?= $n['Game_prices']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="info-title">минимальные системные требования</div>
                        <div class="system-requirements">
                            <?= $n['Game_system_requirements'] ?>
                        </div>
                        <div class="video-block">
                            <video controls type="video/mp4">
                                <source src="<?= $n['Game_video'] ?>">
                            </video>
                        </div>
                        <div class="info-title">об игре</div>
                        <div class="game-info"><?= $n['Game_about'] ?></div>
                    </div>
                    <div class=" second-column">
                        <? include('php/game_menu_content.php'); ?>
                        <div class="info-title">обзоры пользователей</div>
                        <div class="rating-block">
                            <div class="rating-total">
                                <div class="rating-header"><?= round($n['Game_rating'], 1) ?></div>
                                <div class="rating-footer">оценка пользователей</div>
                            </div>
                            <div class="rating-user">
                                <div class="rating-header rating-header__user">
                                    <?php
                                    if ($_SESSION['authorization'] == true) {
                                        $sql4 = "SELECT * FROM `ratings`
                                        WHERE `Game_ID` = " . $gameID . " AND `User_ID` = " . $_SESSION['userID'];
                                        $data4 = $pdo->query($sql4);
                                        $ratingUser = $data4->fetchAll();
                                        foreach ($ratingUser as $uRating) {
                                            echo $uRating['User_rating'];
                                        }
                                    } ?>
                                </div>
                                <div class="rating-footer">моя оценка</div>
                            </div>
                        </div>
                        <div class="create-comment">
                            <?php
                            if ($_SESSION['authorization'] == true) : ?>
                                <div class="user-msg__nav" id="showCommentBlock">Оставьте свой обзор<i class="fa-solid fa-angle-down"></i></div>
                                <div class="comment-form">
                                    <div class="rating-area">
                                        <input type="radio" id="star-5" name="rating" value="5">
                                        <label for="star-5" title="Оценка «5»"></label>
                                        <input type="radio" id="star-4" name="rating" value="4">
                                        <label for="star-4" title="Оценка «4»"></label>
                                        <input type="radio" id="star-3" name="rating" value="3">
                                        <label for="star-3" title="Оценка «3»"></label>
                                        <input type="radio" id="star-2" name="rating" value="2">
                                        <label for="star-2" title="Оценка «2»"></label>
                                        <input type="radio" id="star-1" name="rating" value="1">
                                        <label for="star-1" title="Оценка «1»"></label>
                                    </div>
                                    <textarea name="user-comment" maxlength="1000" onkeyup="countLetters();"></textarea>
                                    Всего символов: <span class="count">0</span> из <span>1000</span>
                                    <input type="submit" class="comment-input" name="sendComment" value="Отправить">
                                </div>
                                <span class='err-msg'></span>
                            <? else : ?>
                                <div class="user-msg__nav" id="showCommentBlock">Оставьте свой обзор<i class="fa-solid fa-angle-down"></i></div>
                                <div class="user-msg">Авторизуйтесь, чтобы написать обзор</div>
                            <? endif; ?>
                        </div>
                        <? if (isset($_POST['sendComment'])) {
                            require_once('php/addrating.php');
                            require_once('php/addcomm_sensura.php');
                        }
                        foreach ($usersComments as $comm) : ?>
                            <div class="comments-list">
                                <? if (($_SESSION['userRole'] == "admin") or ($_SESSION['userRole'] == "moder")) : ?>
                                    <div class="comment-block">
                                        <div class="comment__user-block">
                                            <img src="/media/user-avatar.jpg" class="user-img">
                                            <div class="comment-text">
                                                <div class="user-login"><?= $comm['Login'] ?> | <? $date = strtotime($comm['Comm_date']);
                                                                                                echo date("d.m.Y", $date) ?>
                                                </div>
                                                <div class="user-comment"><?= $comm['Comm'] ?></div>
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-xmark" id="btn-del" data-id="<?= $comm['Comm_ID'] ?>"></i>
                                    </div>
                                <? else : ?>
                                    <div class="comment-block">
                                        <div class="comment__user-block">
                                            <img src="/media/user-avatar.jpg" class="user-img">
                                            <div class="comment-text">
                                                <div class="user-login"><?= $comm['Login'] ?> | <? $date = strtotime($comm['Comm_date']);
                                                                                                echo date("d.m.Y", $date) ?>
                                                </div>
                                                <div class="user-comment"><?= $comm['Comm'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <? endif; ?>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</body>
<script src="/js/main.js"></script>
<script>
    const
        $showCommentBloc = $('#showCommentBlock'),
        btnsRadioRating = Array.from(document.querySelectorAll('input[name="rating"]')),
        count = document.querySelector(".count"),
        $btnSendData = $('input[name="sendComment"]'),
        $textarea = $('textarea[name="user-comment"]'),
        $errMsg = $('.err-msg'),
        btnDelComm = document.querySelectorAll('#btn-del');

    $showCommentBloc.on('click', () => {
        $('.comment-form').toggleClass('active');
        $('.user-msg').toggleClass('active');
        $('.fa-angle-down').toggleClass('transform');
    });

    function countLetters() {
        const text = $textarea.val();
        const textlength = $textarea.val().length;
        count.innerText = `${textlength}`;
    }

    $btnSendData.on('click', () => {
        var $usersComment = $textarea.val();
        if ($usersComment != '') {
            const date = new Date();
            if ($.cookie('name') == null) {
                date.setTime(date.getTime() + (10000));
                $.cookie('name', 'true', {
                    expires: date
                });
                $.ajax({
                    url: "php/addcomm_sensura.php",
                    type: 'POST',
                    data: {
                        'usersComment': $usersComment,
                        'gameID': <?= $gameID ?>,
                        'sessionUserID': <?= $_SESSION['userID'] ?>
                    },
                    success: function() {
                        location.reload();
                    }
                })
            } else {
                $errMsg.html('Вы уже отправили комментарий, повторите попытку позже');
            }
        } else {
            $errMsg.html('Напишите комментарий');
        }
    });

    btnsRadioRating.forEach((item, i) => { // проходимся по каждому тригеру
        item.addEventListener('click', () => { // ставим на него слушатель события клика
            var rating = item.value;
            $.ajax({
                url: "php/addrating.php",
                type: 'POST',
                data: {
                    'rating': rating,
                    'gameID': <?= $gameID ?>,
                    'sessionUserID': <?= $_SESSION['userID'] ?>
                },
                success: function() {
                    location.reload();
                }
            })
        });
    });

    btnDelComm.forEach(el => {
        el.addEventListener('click', (e) => {
            let self = e.currentTarget;
            let parent = self.closest('.comment-block');
            let commId = parent.querySelector('#btn-del').getAttribute('data-id');

            if (confirm("Вы уверены, что хотите удалить комментарий?")) {
                $.ajax({
                    url: "php/delete_comm.php",
                    type: 'POST',
                    data: {
                        'Comment_ID': commId
                    },
                    success: function() {
                        location.reload();
                    }
                })
            }
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        var a = document.getElementsByTagName('video')[0]
        a.volume = 0.1
    });
</script>

</html>