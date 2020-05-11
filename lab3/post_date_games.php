<?php
		header("Content-Type: text/json");
        $dbh = include('./conn.php');
        $startD = (String)$_POST['startD'];
        $endD = (String)$_POST['endD'];
        $sql = "SELECT *
                    FROM game
                    WHERE game.date > '$startD' and game.date < '$endD'";
        $result = $dbh->query($sql);
		$rows = array();
        foreach ($result as $row) {
            $rows[] = $row;
        }
		echo json_encode($rows);
?>