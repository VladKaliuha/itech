<?php 
 require_once __DIR__ . "/vendor/autoload.php";
 $collection = (new MongoDB\Client) -> dbforlab -> games;

$name = $_GET["name"];

$cursor = $collection -> find();
$res = [];
foreach($cursor as $document){
    
    foreach ($document["teams"] as $key) {
        if($key === $name){
            array_push($res, $document);
        }
    }        
}
    echo json_encode($res);
?>