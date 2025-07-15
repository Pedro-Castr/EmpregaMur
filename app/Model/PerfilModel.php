<?php

namespace App\Model;

use Core\Library\ModelMain;

class PerfilModel extends ModelMain
{
    protected $table = "usuario";
    protected $primaryKey = "usuario_id";

    public $validationRules = [
        "nome"  => [
            "label" => 'Nome',
            "rules" => 'required|min:3|max:150'
        ],
        "login"  => [
            "label" => 'Email',
            "rules" => 'required|min:10|max:50'
        ]
    ];

    public function getByUserId($userId)
    {
        return $this->db->where('usuario_id', $userId)->first();
    }
}

