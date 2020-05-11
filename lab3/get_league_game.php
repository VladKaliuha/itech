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
		<script src="text_based.js"></script>
</head>
<body>
        <?php
            $dbh = include('./conn.php');
            $sql = "SELECT DISTINCT league from team";
            $result = $dbh->query($sql);
            $leng = $result->rowCount();
            echo "<select size={$leng} id='league'>";
            foreach ($result as $row) {
                $au_name = $row['league'];
                echo "<option value={$au_name}>{$au_name}</option>";
            }
            echo '</select>';
        ?>
        <br>
        <input type="submit" id="submit" value="Search">
		<br>
		<div id="result"></div> 
</body>
</html>