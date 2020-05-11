<?php 
 require_once __DIR__ . "/vendor/autoload.php";
 $collection = (new MongoDB\Client) -> dbforlab -> teams;

$name = $_GET["name"];

    $cond = array("name" => $name);
    $cursor = $collection -> find($cond);
    $res=[];
    foreach($cursor as $team){
       $res[0] = $team["team"];
    }
    echo json_encode($res);
?>