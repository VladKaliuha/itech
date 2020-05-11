<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<link rel="stylesheet" href="style.css"> 
<script src="script.js"></script>
</head>
<body>

<div id = "league-div">

  <form name ="leagues">
  <lable>Get all games by league: </lable>
<?php require_once __DIR__ . "/vendor/autoload.php";
  $collection = (new MongoDB\Client) -> dbforlab -> games;
    $cursor = $collection -> find();
    $res = [];
    echo "<select id= 'league'>";
    foreach($cursor as $document){
        echo "<option value = '".$document["league"]."'> ".$document["league"]."</option>";
        
    }
    echo "</select>";
?>
  <input type="button" onclick = "getGamesByLeague()" value="ОК">
  </form> 
  <table style="border: 1px solid">
  <tr><th> Game </th></tr>
  <tr><th> Title </th><th> Winner </th><th> Date </th></tr>
  <tbody id = "league-table"></tbody>
  </table>
  <table style="border: 1px solid"><tr><th> Last request </th></tr>
  <tbody id = "leagueRecent-table"></tbody>
  </table>
</div>


<div id ="teamGames-div">

  <form name ="teamGames">
    <lable>Get games by team: </lable>

<?php require_once __DIR__ . "/vendor/autoload.php";
  $collection = (new MongoDB\Client) -> dbforlab -> teams;
    $cursor = $collection -> find();
    $res = [];
    echo "<select id= 'teamname'>";
    foreach($cursor as $document){
        echo "<option value = '".$document["name"]."'> ".$document["name"]."</option>";
        
    }
    echo "</select>";
?>
    <input type="button" onclick = "getGamesByTeam()" value="ОК">
</form> 


<table style="border: 1px solid">
  <tr><th> Game </th></tr>
  <tr><th> Title </th><th> Winner </th><th> Date </th></tr>
  <tbody id = "teamGames-table"></tbody>
  </table>
  <table style="border: 1px solid"><tr><th> Last request </th></tr>
  <tbody id = "teamGamesRecent-table"></tbody>
  </table>
</div>
</div>

<div id = "team-div">

<form name ="team">
    <lable>Get players by team: </lable>
    <?php require_once __DIR__ . "/vendor/autoload.php";

  $collection = (new MongoDB\Client) -> dbforlab -> teams;
    $cursor = $collection -> find();
    $res = [];
    echo "<select id= 'name'>";
    foreach($cursor as $document){
        echo "<option value = '".$document["name"]."'> ".$document["name"]."</option>";
        
    }
    echo "</select>";
?>
    <input type="button" onclick = "getTeam()" value="ОК">
</form> 

<table style="border: 1px solid"><tr><th> Players </th></tr>
<tbody id = "team-table"></tbody>
</table>

<table style="border: 1px solid"><tr><th> Last request </th></tr>
<tbody id = "teamResent-table"></tbody>
</table>

</div>
</body>
</html>
