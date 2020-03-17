<?php

namespace App\Models;

use App\Database\DatabaseInterface as DB;

class Capacities
{
    protected $db;

    public function __construct(DB $db) {
         $this->db = $db;
    }

    public function getPlaceList()
    {
        return $this->db->query("SELECT * FROM capacities")->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getPlace($dpt)
    {
    	$stmt = $this->db->prepare("SELECT * FROM capacities WHERE dpt = :dpt");
		$stmt->execute(array(':dpt' => $dpt));
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}