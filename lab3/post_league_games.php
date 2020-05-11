<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $dbh = include('./conn.php');
        $league = (String)$_POST['lg'];
        $sql = "SELECT game.id, game.date, game.place, game.score, game.team1_id, game.team2_id
                    FROM game
                    LEFT JOIN team ON game.team1_id = team.id
                    WHERE team.league = '$league'";
        $result = $dbh->query($sql);
		$returnValue = '';
        foreach ($result as $row) {
            $returnValue .= '<br>';
                foreach($row as $filed => $value ) {
                    if (gettype($filed) == 'string') {
                        $returnValue .= "<span>$filed = $value</span><br>";
                    }
                }
            $returnValue .= '<br>';
        }
		if($value == ''){
			echo 'There are no match';
		}else{
			echo $returnValue;
		}
    ?>
</body>
</html>