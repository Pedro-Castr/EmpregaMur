<?php

namespace App\Model;

use Core\Library\ModelMain;

class TermoUsoModel extends ModelMain
{
    protected $table = "termodeuso";
    protected $primaryKey = 'termodeuso_id';

    public function getTermodeuso_id()
    {
        $row = $this->db->select("termodeuso_id")->where('statusRegistro', 1)->first();

        return $row['termodeuso_id'] ?? null;
    }
}
