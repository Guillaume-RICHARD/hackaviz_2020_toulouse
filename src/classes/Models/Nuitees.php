<?php

namespace App\Models;

use App\Database\DatabaseInterface as DB;

class Nuitees
{
    protected $db;

    public function __construct(DB $db) {
         $this->db = $db;
    }

    public function getNuitsList()
    {
        return $this->db->query("SELECT * FROM hack_nuitees LIMIT 10")->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getNuit($dpt)
    {
    	$stmt = $this->db->prepare("SELECT * FROM hack_nuitees WHERE dpt = :dpt");
		$stmt->execute(array(':dpt' => $dpt));
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}