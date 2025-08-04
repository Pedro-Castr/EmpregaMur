<?php

namespace App\Model;

use Core\Library\ModelMain;

class EstabelecimentoModel extends ModelMain
{
    protected $table = "estabelecimento";
    protected $primaryKey = "estabelecimento_id";

    public $validationRules = [
        "nome" => [
            "label" => 'Nome',
            "rules" => 'required|min:3|max:50'
        ],
        "endereco" => [
            "label" => 'Endereço',
            "rules" => 'required|min:10|max:200'
        ],
        "latitude" => [
            "label" => "Latitude",
            "rules" => "required|float"
        ],
        "longitude" => [
            "label" => "Longitude",
            "rules" => "required|float"
        ],
        "email" => [
            "label" => 'Email',
            "rules" => 'required|email|max:50'
        ]
    ];

    public function getByEstabelecimentoId($estabelecimentoId)
    {
        return $this->db->where('estabelecimento_id', $estabelecimentoId)->first();
    }
}
