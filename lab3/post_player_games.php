<?php
		header("Content-Type: text/xml");
		$doc = new DOMDocument('1.0', 'UTF-8');
		$games = $doc->createElement('games');

		$dbh = include('./conn.php');
        $player_id = (int)$_POST['plr'];
        $sql = "SELECT game.id, game.date, game.place, game.score, game.team1_id, game.team2_id
                FROM game
                WHERE game.team1_id = (SELECT team_id from player where id = $player_id)
                or game.team2_id = (SELECT team_id from player where id = $player_id)";
        $result = $dbh->query($sql);
		foreach ($result as $row) {
			    $entry = $doc->createElement('game');
                foreach($row as $filed => $value ) {
                    if (gettype($filed) == 'string') {
                        $entry->appendChild($doc->createElement($filed, $value));
                    }
                }
				 $games->appendChild($entry);
        }
		$doc->appendChild($games);
		echo $doc->saveXML();
?>