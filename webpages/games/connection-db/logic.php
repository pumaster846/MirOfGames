<?php
require_once('connect.php');

$sql = "SELECT * FROM `users`";
$data = $pdo->query($sql);
$users = $data->fetchAll();

$sql2 = "SELECT * FROM `games`";
$data2 = $pdo->query($sql2);
$games = $data2->fetchAll();

$sql3 = "SELECT * FROM `games`
ORDER BY `Game_date` DESC";
$data3 = $pdo->query($sql3);
$games_sort_date = $data3->fetchAll();

$sql4 = "SELECT * FROM `games`
ORDER BY `Game_name` ASC";
$data4 = $pdo->query($sql4);
$games_sort_alphabet = $data4->fetchAll();

$sql5 = "SELECT * FROM `games`
ORDER BY `Game_rating` DESC";
$data5 = $pdo->query($sql5);
$games_sort_estimation = $data5->fetchAll();

$sql6 = "SELECT * FROM `games_genres`";
$data6 = $pdo->query($sql6);
$genres = $data6->fetchAll();

$sql7 = "SELECT * FROM `ratings`";
$data7 = $pdo->query($sql7);
$ratings = $data7->fetchAll();
