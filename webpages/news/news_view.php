<?
session_start();
require_once('connection-db/logic.php');

if (isset($_GET['news'])) {
    $newsID = $_GET['news'];
}
$sql = "SELECT * FROM `news` INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID` WHERE `News_ID` = " . $newsID;
$getNews = $pdo->query($sql);
$newsContent = $getNews->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MirOFGames. Новость</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/css/media.css">
    <script src="https://kit.fontawesome.com/5dd8e1247e.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">

        <!-- Header content -->

        <? include('../../header.php'); ?>

        <div class="body">
            <? foreach ($newsContent as $n) : ?>
                <div class="post-block">
                    <div class="post-header">
                        <a href="#" class="post-autor"><?= $n['Login'] ?></a>
                        &nbsp;|&nbsp;
                        <div class="post-date">
                            <? $date = strtotime($n['News_date']);
                            echo date("d.m.Y", $date) ?>
                        </div>
                        &nbsp;|&nbsp;
                        <a href="news.php" class="post-tag">К другим новостям</a>
                    </div>
                    <h1 class="post-title"><?= $n['News_name'] ?></h1>
                    <img class="post-preview__img" src="/media/news/preview_img/<?= $n['News_preview_img'] ?>" alt="<?= $n['News_name'] ?>">
                    <article class="post-content"><?= $n['News_text'] ?></article>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</body>
<script src="/js/main.js"></script>

</html>