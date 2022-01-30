<?php
require_once dirname(__DIR__, 1). '/vendor/autoload.php';
require_once dirname(__DIR__,1). '/config/routes.php';

$url = $_SERVER['REQUEST_URI'];
if(!isset($url)){
    throw new RuntimeException('$_SERVER["REQUEST_URI"]が定義されていません');
}

