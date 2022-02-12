<?php

namespace App\Parts\Model\Db;
use \PDO;


class UsersTable {

    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function isUniqueEmail(string $email){
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('email', $email);
        $stmt->execute();
        $result = $stmt->fetch();
        return !!$result;
    }
}
