<?php

namespace App\Parts\Model\Db;

use \PDO;

class DbConnect {
    private $dbh;

    public function __construct(string $dbh, string $user,string $pass, array $option = [] )
    {
        $option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $this->dbh = new PDO($dbh, $user, $pass, $option);
    }

    /**
     * @return PDO
     */
    public function getDbh(): PDO
    {
        return $this->dbh;
    }
}