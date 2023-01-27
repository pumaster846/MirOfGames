<?
session_start();
require_once('php/connection-db/logic.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MirOFGames</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/css/media.css">
    <script src="https://kit.fontawesome.com/5dd8e1247e.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">

        <!-- Header content -->

        <? include('header.php'); ?>

        <!-- Body content -->

        <div class="body">
            <div class="body-block">
                <div class="main-news">
                    <? foreach ($index_main_news as $n) : ?>
                        <a href="/webpages/news/news_view.php?news=<?= $n['News_ID'] ?>" class="main-news__item">
                            <div class="main-news__title"><?= $n['News_name'] ?></div>
                            <img class="main-news__img" src="/media/news/preview_img/<?= $n['News_preview_img']; ?>">
                        </a>
                    <? endforeach; ?>
                </div>
            </div>
            <div class="body-block">
                <div class="body-block__nav">
                    <div class="body-block__row-navig">
                        <a href="webpages/news/news.php" class="row-navig__title">Новости
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="body-block__slider">
                    <? foreach ($index_news as $n) : ?>
                        <a href="/webpages/news/news_view.php?news=<?= $n['News_ID'] ?>" class="main-news__item">
                            <div class="main-news__title"><?= $n['News_name'] ?></div>
                            <img src="/media/news/preview_img/<?= $n['News_preview_img']; ?>" class="main-news__img">
                        </a>
                    <? endforeach; ?>
                </div>
            </div>
            <div class="body-block">
                <div class="body-block__nav">
                    <div class="body-block__row-navig">
                        <a href="webpages/games/games.php" class="row-navig__title">Игры
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="body-block__row-games">
                    <? foreach ($index_games as $n) : ?>
                        <div class="game-card__block">
                            <img src="<?= $n['Game_preview_img'] ?>" alt="<?= $n['Game_name'] ?>" class="game-card__img">
                            <div class="game-card__title"><?= $n['Game_name'] ?></div>
                            <div class="game-card__date">Дата выхода:<br> <? $date = strtotime($n['Game_date']);
                                                                            echo date("d.m.Y", $date) ?></div>
                            <div class="game-card__rating">Рейтинг: <?= round($n['Game_rating'], 1) ?></div>
                            <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>" class="game-card__show-more">Подробнее</a>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
            <div class="body-block">
                <div class="gallery">
                    <div class="gallery-block__title">галереи пользователей</div>
                    <div class="gallery-block">
                        <? foreach ($users_screenshots as $n) : ?>
                            <div class="gallery-image">
                                <img src="<?= $n['Screenshot_url'] ?>" class="gallery-image__item">
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/main.js"></script>

</html>