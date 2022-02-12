<?php

use App\Parts\Model\Db\DbConnect;

$dns = $_ENV['DB_DNS'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];

$dbOption = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
];
try{
    $db = (new DbConnect($dns,$user,$pass))->getDbh();
} catch (PDOException $e) {
    echo $e->getMessage();
}

