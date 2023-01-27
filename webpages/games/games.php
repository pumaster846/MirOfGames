<?
session_start();
require_once('connection-db/logic.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MirOFGames. Игры</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/css/media.css">
    <script src="https://kit.fontawesome.com/5dd8e1247e.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">

        <!-- Header content -->

        <? include('../../header.php'); ?>

        <div class="body">
            <div class="page-title">Игры</div>
            <?php
            include('php/sort.php');
            ?>
        </div>
    </div>
    </div>
</body>
<script src="/js/main.js"></script>
<script src="js/script.js"></script>

</html>