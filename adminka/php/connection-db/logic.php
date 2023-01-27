<?php
require_once('connect.php');

$sql = "SELECT * FROM `news`
INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
ORDER BY `News_date` DESC";
$data = $pdo->query($sql);
$news = $data->fetchAll();

$sql1 = "SELECT * FROM `news_tags`";
$data1 = $pdo->query($sql1);
$news_tags = $data1->fetchAll();

$sql2 = "SELECT `Game_ID`, `Game_name` FROM `games`";
$data2 = $pdo->query($sql2);
$selectGames = $data2->fetchAll();

$sql3 = "SELECT * FROM `games`
ORDER BY `Game_date` DESC";
$data3 = $pdo->query($sql3);
$games = $data3->fetchAll();

$sql4 = "SELECT * FROM `games_genres`";
$data4 = $pdo->query($sql4);
$gamesGenres = $data4->fetchAll();

$sql5 = "SELECT * FROM `users_screenshots`
INNER JOIN `users` ON `users_screenshots`.`User_ID` = `users`.`User_ID`
INNER JOIN `games` ON `users_screenshots`.`Game_ID` = `games`.`Game_ID`
ORDER BY `Screenshot_ID` DESC";
$data5 = $pdo->query($sql5);
$Screenshots = $data5->fetchAll();

$sql6 = "SELECT * FROM `users`";
$data6 = $pdo->query($sql6);
$users = $data6->fetchAll();