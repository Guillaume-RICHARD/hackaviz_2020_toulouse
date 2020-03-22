<?php

namespace App\Models;

use App\Database\DatabaseInterface as DB;

class Departements
{
    protected $db;

    public function __construct(DB $db) {
         $this->db = $db;
    }

    public function getDepartementsList()
    {
        return $this->db->query("SELECT * FROM hack_compl_departement")->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getDepartement($dpt)
    {
    	$stmt = $this->db->prepare("SELECT * FROM hack_compl_departement WHERE dpt = :dpt");
		$stmt->execute(array(':dpt' => $dpt));
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}