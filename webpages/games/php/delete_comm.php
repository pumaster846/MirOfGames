<?php
require_once('../connection-db/logic.php');
echo $gameID;
if (isset($_POST['Comment_ID'])) {
    $sql = "DELETE FROM `comments` WHERE `Comm_ID` = ?";
    $del = $pdo->prepare($sql);
    $del->execute(array("$_POST[Comment_ID]"));
}
