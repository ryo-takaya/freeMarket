<?php
require_once dirname(__DIR__, 1). '/vendor/autoload.php';
require_once dirname(__DIR__,1). '/config/routes.php';
require_once dirname(__DIR__,1). '/config/bootstrap.php';

$url = $_SERVER['REQUEST_URI'];
if(!isset($url)){
    throw new RuntimeException('$_SERVER["REQUEST_URI"]が定義されていません');
}

$filePath = Route::resolveFile($url);

require_once dirname(__DIR__,1). "/{$filePath}";