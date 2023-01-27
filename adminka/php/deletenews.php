<?php
require_once('connection-db/logic.php');

$data = $_POST['idNews'];

if(isset($data)){
    if($data != "") {
        foreach($data as $idNews) {
            $sql = "DELETE FROM `news` WHERE `News_ID` = ?";
            $res = $pdo -> prepare($sql);
            $res -> execute(array($idNews));
        }
    }
}