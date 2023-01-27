<?php
require_once('../connection-db/logic.php');
$gameID = $_POST['gameID'];
$userID = $_POST['sessionUserID'];
$userRating = $_POST['rating'];

$sql2 = "SELECT * FROM `ratings`
WHERE `Game_ID` = " . $gameID . " AND `User_ID` = " . $userID;
$data2 = $pdo->query($sql2);
$addratings = $data2->fetchAll();

if (isset($_POST['rating'])) {
    if (count($addratings) <= 0) {
        $sql3 = "INSERT INTO `ratings` SET `Game_ID` = ?, `User_ID` = ?, `User_rating` = ?, `Count_1` = 0, `Count_2` = 0, `Count_3` = 0, `Count_4` = 0, `Count_5` = 0";
        $insertRating = $pdo->prepare($sql3);
        $insertRating->execute(array("$gameID", "$userID", "$_POST[rating]"));

        switch ($_POST['rating']) {
            case '1':
                $sql = "UPDATE `ratings` SET `Count_1` = 1, `Count_2` = 0, `Count_3` = 0, `Count_4` = 0, `Count_5` = 0 WHERE `User_rating` = ? AND `Game_ID` = ? AND `User_ID` = ?";
                $updateRating = $pdo->prepare($sql);
                $updateRating->execute(array("$_POST[rating]", "$gameID", "$userID"));
                break;
            case '2':
                $sql = "UPDATE `ratings` SET `Count_1` = 0, `Count_2` = 1, `Count_3` = 0, `Count_4` = 0, `Count_5` = 0 WHERE `User_rating` = ? AND `Game_ID` = ? AND `User_ID` = ?";
                $updateRating = $pdo->prepare($sql);
                $updateRating->execute(array("$_POST[rating]", "$gameID", "$userID"));
                break;
            case '3':
                $sql = "UPDATE `ratings` SET `Count_1` = 0, `Count_2` = 0, `Count_3` = 1, `Count_4` = 0, `Count_5` = 0 WHERE `User_rating` = ? AND `Game_ID` = ? AND `User_ID` = ?";
                $updateRating = $pdo->prepare($sql);
                $updateRating->execute(array("$_POST[rating]", "$gameID", "$userID"));
                break;
            case '4':
                $sql = "UPDATE `ratings` SET `Count_1` = 0, `Count_2` = 0, `Count_3` = 0, `Count_4` = 1, `Count_5` = 0 WHERE `User_rating` = ? AND `Game_ID` = ? AND `User_ID` = ?";
                $updateRating = $pdo->prepare($sql);
                $updateRating->execute(array("$_POST[rating]", "$gameID", "$userID"));
                break;
            case '5':
                $sql = "UPDATE `ratings` SET `Count_1` = 0, `Count_2` = 0, `Count_3` = 0, `Count_4` = 0, `Count_5` = 1 WHERE `User_rating` = ? AND `Game_ID` = ? AND `User_ID` = ?";
                $updateRating = $pdo->prepare($sql);
                $updateRating->execute(array("$_POST[rating]", "$gameID", "$userID"));
                break;
        }

        $sql8 = "SELECT SUM(`Count_1`) as bal1, SUM(`Count_2`) as bal2, SUM(`Count_3`) as bal3,
                            SUM(`Count_4`) as bal4, SUM(`Count_5`) as bal5
                            FROM `ratings`
                            WHERE `Game_ID` = " . $gameID;
        $data8 = $pdo->query($sql8);
        $totalRating = $data8->fetchAll();
        foreach ($totalRating as $tot) {
            $formulaTotal = (5 * $tot['bal5'] + 4 * $tot['bal4'] + 3 * $tot['bal3'] + 2 * $tot['bal2'] + 1 * $tot['bal1']) / ($tot['bal5'] + $tot['bal4'] + $tot['bal3'] + $tot['bal2'] + $tot['bal1']);
        }
        $gameTotalRating = round($formulaTotal, 1);
        $sql9 = "UPDATE `games` SET `Game_rating` = ? WHERE `games`.`Game_ID` = ?";
        $updateTotalRating = $pdo->prepare($sql9);
        $updateTotalRating->execute(array("$gameTotalRating", "$gameID"));
    } else {
        foreach ($ratings as $n) {
            if ($gameID == $n['Game_ID'] && $userID == $n['User_ID']) {
                switch ($_POST['rating']) {
                    case '1':
                        $sql = "UPDATE `ratings` SET `User_rating` = ?, `Count_1` = 1, `Count_2` = 0, `Count_3` = 0, `Count_4` = 0, `Count_5` = 0 WHERE `Game_ID` = ? AND `User_ID` = ?";
                        $updateRating = $pdo->prepare($sql);
                        $updateRating->execute(array("$_POST[rating]", "$gameID", "$userID"));
                        break;
                    case '2':
                        $sql = "UPDATE `ratings` SET `User_rating` = ?, `Count_1` = 0, `Count_2` = 1, `Count_3` = 0, `Count_4` = 0, `Count_5` = 0 WHERE `Game_ID` = ? AND `User_ID` = ?";
                        $updateRating = $pdo->prepare($sql);
                        $updateRating->execute(array("$_POST[rating]", "$gameID", "$userID"));
                        break;
                    case '3':
                        $sql = "UPDATE `ratings` SET `User_rating` = ?, `Count_1` = 0, `Count_2` = 0, `Count_3` = 1, `Count_4` = 0, `Count_5` = 0 WHERE `Game_ID` = ? AND `User_ID` = ?";
                        $updateRating = $pdo->prepare($sql);
                        $updateRating->execute(array("$_POST[rating]", "$gameID", "$userID"));
                        break;
                    case '4':
                        $sql = "UPDATE `ratings` SET `User_rating` = ?, `Count_1` = 0, `Count_2` = 0, `Count_3` = 0, `Count_4` = 1, `Count_5` = 0 WHERE `Game_ID` = ? AND `User_ID` = ?";
                        $updateRating = $pdo->prepare($sql);
                        $updateRating->execute(array("$_POST[rating]", "$gameID", "$userID"));
                        break;
                    case '5':
                        $sql = "UPDATE `ratings` SET `User_rating` = ?, `Count_1` = 0, `Count_2` = 0, `Count_3` = 0, `Count_4` = 0, `Count_5` = 1 WHERE `Game_ID` = ? AND `User_ID` = ?";
                        $updateRating = $pdo->prepare($sql);
                        $updateRating->execute(array("$_POST[rating]", "$gameID", "$userID"));
                        break;
                }
            }
        }

        $sql10 = "SELECT SUM(`Count_1`) as bal1, SUM(`Count_2`) as bal2, SUM(`Count_3`) as bal3,
                            SUM(`Count_4`) as bal4, SUM(`Count_5`) as bal5
                            FROM `ratings`
                            WHERE `Game_ID` = " . $gameID;
        $data10 = $pdo->query($sql10);
        $totalRating1 = $data10->fetchAll();
        foreach ($totalRating1 as $tot) {
            $formulaTotal = (5 * $tot['bal5'] + 4 * $tot['bal4'] + 3 * $tot['bal3'] + 2 * $tot['bal2'] + 1 * $tot['bal1']) / ($tot['bal5'] + $tot['bal4'] + $tot['bal3'] + $tot['bal2'] + $tot['bal1']);
        }
        $gameTotalRating1 = round($formulaTotal, 1);
        $sql11 = "UPDATE `games` SET `Game_rating` = ? WHERE `games`.`Game_ID` = ?";
        $updateTotalRating1 = $pdo->prepare($sql11);
        $updateTotalRating1->execute(array("$gameTotalRating1", "$gameID"));
    }
}
