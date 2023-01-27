<?php
session_start();
require_once('../connection-db/logic.php');

if (isset($_GET['genre'])) {
    $genreName = $_GET['genre'];
}
$sql = "SELECT * FROM `games`
WHERE `Game_genres`::json->>[0] LIKE %" . $genreName."%";
$getGames = $pdo->query($sql);
$gamesContent = $getGames->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MirOFGames. Игры</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/5dd8e1247e.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">

        <!-- Header content -->

        <? include('../../../header.php'); ?>

        <div class="body">
            <div class="page-title">Игры</div>
            <div class="navigation-block">
                <div class="search__block">
                    <i class="fa-solid fa-magnifying-glass" id="showSearchBlock"></i>
                    <div class="search">
                        <input type="text" id="showGamesBlock" placeholder="Название игры">
                        <ul class="search-menu">
                            <? foreach ($games as $n) : ?>
                                <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>">
                                    <li><?= $n['Game_name'] ?></li>
                                </a>
                            <? endforeach; ?>
                        </ul>
                    </div>
                </div>
                <ul class="sort-menu">
                    <li>
                        <a href="/webpages/games/games.php?sort=date" class="sort-item">по дате выхода
                            <span><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="/webpages/games/games.php?sort=alphabet" class="sort-item">по алфавиту
                            <span><i class="fa-solid fa-arrow-down-a-z"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="/webpages/games/games.php?sort=estimation" class="sort-item">по оценке пользователей
                            <span><i class="fa-solid fa-arrow-down-wide-short"></i></span>
                        </a>
                    </li>
                </ul>
                <div class="genre__block">
                    <div class="genre-btn" id="showGenreBlock">Все жанры
                        <span><i class="fa-solid fa-bars"></i></span>
                    </div>
                    <div class="genre-menu__block">
                        <ul class="genre-menu">
                            <? foreach ($genres as $n) : ?>
                                <a href="/webpages/games/php/genre.php?genre=<?= $n['Genre_ID'] ?>">
                                    <li class="genre-item"><?= $n['Genre_name'] ?></li>
                                </a>
                            <? endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-block">
                <? foreach ($gamesContent as $n) : ?>
                    <a href="/webpages/games/games_view.php?game=<?= $n['Game_ID'] ?>" class="game-block__content">
                        <div class="game-rating"><?= $n['Game_rating'] ?></div>
                        <div class="game-text__block">
                            <div class="game-name"><?= $n['Game_name'] ?></div>
                            <div class="game-text__title">Дата выхода</div>
                            <div class="game-date">
                                <? $date = strtotime($n['Game_date']);
                                echo date("d.m.Y", $date) ?>
                            </div>
                        </div>
                        <img src="<?= $n['Game_preview_img'] ?>" alt="<?= $n['Game_name'] ?>" class="game-img">
                    </a>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</body>
<script src="/js/main.js"></script>
<script src="../js/script.js"></script>

</html>