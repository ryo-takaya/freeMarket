<?php

namespace App\Parts\Model\Db;
use \PDO;


class ProductsTable {

    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getProduct(string $id){
        $sql = 'SELECT * FROM products WHERE id = :id AND delete_flg = 0';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('email', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUser(int $id){
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}