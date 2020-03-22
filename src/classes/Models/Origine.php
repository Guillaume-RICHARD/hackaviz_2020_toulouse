<?php

namespace App\Models;

use App\Database\DatabaseInterface as DB;

class Origine
{
    protected $db;
    protected $table;

    public function __construct(DB $db) {
         $this->db = $db;
         $this->table = "hack_par_origines";
    }

    /**
     * @return mixed
     */
    public function getCountAll()
    {
        return $this->db->query("SELECT count(`org`) AS total FROM ".$this->table)->fetch(\PDO::FETCH_OBJ);
    }

    /**
     * @return mixed
     */
    public function getOrigineTouriste()
    {
        return $this->db->query("SELECT `org`, sum(`volume`) AS origine FROM ".$this->table." GROUP BY `org` ORDER BY origine DESC LIMIT 10")->fetchAll(\PDO::FETCH_OBJ);
    }


    public function getTopOrigineTouriste()
    {
        return $this->db->query("SELECT `org`, sum(`volume`) AS origine FROM ".$this->table." GROUP BY `org` ORDER BY origine DESC LIMIT 10")->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @return mixed
     */
    public function getDestinationTouriste()
    {
        //
        return $this->db->query("SELECT `dest`, sum(`volume`) AS origine FROM ".$this->table." GROUP BY `dest`")->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Récupère les département d'origine et de destination des touristes
     * @return mixed
     */
    public function getOrgDest()
    {
        return $this->db->query("SELECT `org`, `dest`, sum(`volume`) AS volume FROM  ".$this->table." GROUP BY `org`, `dest`")->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @param $dpt
     * @return mixed
     */
    public function getNuit($dpt)
    {
    	$stmt = $this->db->prepare("SELECT * FROM ".$this->table." WHERE dpt = :dpt");
		$stmt->execute(array(':dpt' => $dpt));
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}