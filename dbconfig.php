<?php

require('vendor/autoload.php');

use Doctrine\DBAL\DriverManager;

$connectionParams = array(
    'dbname' => 'db',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql'
);


try {
    $conn = DriverManager::getConnection($connectionParams);
} catch (\Exception $e) {
    echo "what happened";
}