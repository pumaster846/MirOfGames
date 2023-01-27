<?php
require_once('../connection-db/logic.php');
$gameID = $_POST['gameID'];
$userID = $_POST['sessionUserID'];
$usersComment = $_POST['usersComment'];

if ($usersComment != '') {
    if (!isset($_COOKIE['addcomm'])) {
        $message_of_guest = mb_strtolower($usersComment);
        $mas = array(
            'пизд', 'хуй', 'ебан', 'уеби', 'уёби', 'пидар',
            'пидор', 'пидр', 'бля', 'поху', 'ебал', 'ебли',
            'долбое', 'долбоё', 'долбае', 'долбаё', 'поеба', 'хую',
            'хер', '', '', '', '', '',
            '', '', '', '', '', '', ''
        );
        foreach ($mas as $line) {
            $message_of_guest = str_replace($line, '<i class="fa-solid fa-fire-flame-curved"></i>', $message_of_guest);
        }

        $sql = "INSERT INTO `comments` SET `User_ID` = ?, `Game_ID` = ?, `Comm` = ?, `Comm_date` = ?";
        $insertComm = $pdo->prepare($sql);
        $insertComm->execute(array("$userID", "$gameID", $message_of_guest, date("Y.m.d")));
    } else {
        echo "<span class='err-msg'></span>";
    }
} else {
    echo "<span class='err-msg'></span>";
}
