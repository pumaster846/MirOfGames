<?php
require_once('connection-db/logic.php');

$dataScreen = $_POST['idScreenshot'];

if(isset($dataScreen)){
    if($dataScreen != "") {
        foreach($dataScreen as $idScreen) {
            $sql = "UPDATE `users_screenshots` SET `Archive` = 1 WHERE `Screenshot_ID` = ?";
            $res = $pdo -> prepare($sql);
            $res -> execute(array($idScreen));
        }
    }
}