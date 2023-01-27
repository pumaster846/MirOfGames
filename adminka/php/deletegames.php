<?php
require_once('connection-db/logic.php');

$dataGame = $_POST['idGame'];

if(isset($dataGame)){
    if($dataGame != "") {
        foreach($dataGame as $idGame) {
            $sql = "DELETE FROM `games` WHERE `Game_ID` = ?";
            $res = $pdo -> prepare($sql);
            $res -> execute(array($idGame));

            $sql1 = "DELETE FROM `users_screenshots` WHERE `Game_ID` = ?";
            $res1 = $pdo -> prepare($sql1);
            $res1 -> execute(array($idGame));
        }
    }
}