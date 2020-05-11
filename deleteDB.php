<?php

require('vendor/autoload.php');
require('dbconfig.php');

$json = file_get_contents('php://input');

$qb = $conn->createQueryBuilder()->delete('round');
$qb->execute();
