<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<script
		src="https://code.jquery.com/jquery-1.12.3.min.js"
		integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
		crossorigin="anonymous"></script>
		<script src="xml_based.js"></script>
</head>
<body>
        <?php
            $dbh = include('./conn.php');
            $sql = "SELECT * from player";
            $result = $dbh->query($sql);
            $leng = $result->rowCount();
            echo "<select size={$leng} id='plr'>";
            foreach ($result as $row) {
                $au_name = $row['name'];
                $au_id = $row['id'];
                echo "<option value={$au_id}>{$au_name}</option>";
            }
            echo '</select>';
        ?>
        <br>
        <input type="submit" id="submit" value="Search">
		
		<div id='result'></div>
</body>
</html>