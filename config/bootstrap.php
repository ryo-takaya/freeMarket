<?php
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__,1));
$dotenv->load();

require_once dirname(__FILE__). '/initDb.php';
