<?php

require('vendor/autoload.php');
require('src/classes/Round.php');
require('dbconfig.php');

header("Access-Control-Allow-Origin: *");

$json = file_get_contents('php://input');

$obj = json_decode($json);
$scored = $obj->score;
$par = $obj->par_score;
$hole_name = $obj->hole_name;
$hole_number = $obj->hole_number;
$player_name = $obj->player_name;

$diffScore = $scored - $par;
$par_name = "";

switch (true) {
    case $diffScore <= -3:
        $stableford_points = 5;
        $par_name = "Albatros";
        break;
    case $diffScore == -2:
        $stableford_points = 4;
        $par_name = "Eagle";
        break;
    case $diffScore == -1:
        $stableford_points = 3;
        $par_name = "Birdie";
        break;
    case $diffScore == 0:
        $stableford_points = 2;
        $par_name = "Par";
        break;
    case $diffScore == 1:
        $stableford_points = 1;
        $par_name = "Bogey";
        break;
    case 2:
    case $diffScore >= 2:
        $stableford_points = 0;
        $par_name = "Garbage";
        break;
}

$round = new Round($player_name, $scored, $stableford_points, $hole_name, $hole_number, $par, $par_name);

$conn->insert('round', array(
        'player_name' => $round->__getName(),
        'scored' => $round->__getScored(),
        'stableford_points' => $round->__getAllStablefordPoints(),
        'hole_name' => $round->__getHoleName(),
        'hole_number' => $round->__getHoleNumber(),
        'par_score' => $round->__getPAR(),
        'par_name' => $round->__getParName()
    )
);
