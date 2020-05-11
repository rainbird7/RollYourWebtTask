<?php

require('vendor/autoload.php');
require('dbconfig.php');

$rounds = array();

try {
    $query = $conn->executeQuery('SELECT * FROM round');
    $result = $query->fetchAll();
} catch(\Exception $e) {
    echo "Something didn't work";
}

foreach($result as $rows){
    array_push($rounds,$rows);
}

echo json_encode($rounds);