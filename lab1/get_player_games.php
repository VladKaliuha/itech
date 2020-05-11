<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="post_player_games.php" method="post">
        <?php
            $dbh = include('./conn.php');
            $sql = "SELECT * from player";
            $result = $dbh->query($sql);
            $leng = $result->rowCount();
            echo "<select size={$leng} name='plr'>";
            foreach ($result as $row) {
                $au_name = $row['name'];
                $au_id = $row['id'];
                echo "<option value={$au_id}>{$au_name}</option>";
            }
            echo '</select>';
        ?>
        <br>
        <input type="submit" value="Search">
    </form>
</body>
</html>