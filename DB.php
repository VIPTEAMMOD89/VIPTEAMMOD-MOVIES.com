<?php

if(strpos($_SERVER['REQUEST_URI'],"DB.php")){
    require_once 'Utils.php';
    PlainDie();
}

$conn = new mysqli("localhost", "id21398324_89vipteammodmovies", "Aarun8977000@", "id21398324_vipteammodmovies89");
if($conn->connect_error != null){
    die($conn->connect_error);
}