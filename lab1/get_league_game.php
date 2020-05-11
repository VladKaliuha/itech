<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="post_league_games.php" method="post">
        <?php
            $dbh = include('./conn.php');
            $sql = "SELECT DISTINCT league from team";
            $result = $dbh->query($sql);
            $leng = $result->rowCount();
            echo "<select size={$leng} name='lg'>";
            foreach ($result as $row) {
                $au_name = $row['league'];
                echo "<option value={$au_name}>{$au_name}</option>";
            }
            echo '</select>';
        ?>
        <br>
        <input type="submit" value="Search">
    </form>
</body>
</html>