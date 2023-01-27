<?php
require_once('connect.php');

$sql = "SELECT * FROM `users`";
$data = $pdo->query($sql);
$users = $data->fetchAll();

$sql2 = "SELECT * FROM `news`
INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
ORDER BY `News_date` DESC";
$data2 = $pdo->query($sql2);
$news = $data2->fetchAll();

$sql3 = "SELECT * FROM `news`
INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
WHERE `News_tag` = 'Анонсы'
ORDER BY `News_date` DESC";
$data3 = $pdo->query($sql3);
$announces_news = $data3->fetchAll();

$sql4 = "SELECT * FROM `news`
INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
WHERE `News_tag` = 'Индустрия'
ORDER BY `News_date` DESC";
$data4 = $pdo->query($sql4);
$industry_news = $data4->fetchAll();

$sql5 = "SELECT * FROM `news`
INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
WHERE `News_tag` = 'Обновления' ORDER BY `News_date` DESC";
$data5 = $pdo->query($sql5);
$updates_news = $data5->fetchAll();

$sql6 = "SELECT * FROM `news`
INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
WHERE `News_tag` = 'Слухи'
ORDER BY `News_date` DESC";
$data6 = $pdo->query($sql6);
$rumors_news = $data6->fetchAll();

$sql7 = "SELECT * FROM `news`
INNER JOIN `users` ON `news`.`User_ID` = `users`.`User_ID`
INNER JOIN `news_tags` ON `news`.`News_tag_ID` = `news_tags`.`News_tag_ID`
WHERE `News_tag` = 'Технологии'
ORDER BY `News_date` DESC";
$data7 = $pdo->query($sql7);
$tech_news = $data7->fetchAll();
