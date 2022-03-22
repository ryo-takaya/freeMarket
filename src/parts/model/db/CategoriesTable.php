<?php

namespace App\Parts\Model\Db;
use \PDO;


class CategoriesTable {

    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getListCategories(){
        $sql = 'SELECT * FROM categorys';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
