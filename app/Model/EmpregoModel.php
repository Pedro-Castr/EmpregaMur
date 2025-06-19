<?php

namespace App\Model;

use Core\Library\ModelMain;

class EmpregoModel extends ModelMain
{
    protected $table = "vaga";

    public $validationRules = [
        "nome"  => [
            "label" => 'Nome',
            "rules" => 'required|min:3|max:50'
        ],
        "codIBGE"  => [
            "label" => 'Código do IBGE',
            "rules" => 'required|min:7|max:7'
        ],
        "uf_id"  => [
            "label" => 'UF',
            "rules" => 'required|int'
        ]
    ];
}
