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
        $player_id = (int)$_POST['plr'];
        $sql = "SELECT game.id, game.date, game.place, game.score, game.team1_id, game.team2_id
                FROM game
                WHERE game.team1_id = (SELECT team_id from player where id = $player_id)
                or game.team2_id = (SELECT team_id from player where id = $player_id)";
        $result = $dbh->query($sql);
        foreach ($result as $row) {
            echo '<br>';
                foreach($row as $filed => $value ) {
                    if (gettype($filed) == 'string') {
                        echo "<span>$filed = $value</span><br>";
                    }
                }
            echo '<br>';
        }
    ?>
</body>
</html>