<?php

namespace App\Model;

use Core\Library\ModelMain;

class EmpregoModel extends ModelMain
{
    protected $table = "vaga";

    public $validationRules = [
        "descricao"  => [
            "label" => 'Descrição',
            "rules" => 'required|min:3|max:50'
        ],
        "sobreaVaga"  => [
            "label" => 'Sobre a Vaga',
            "rules" => 'required|min:10|max:150'
        ],
        "modalidade"  => [
            "label" => 'Modalidade',
            "rules" => 'required|int'
        ],
        "vinculo"  => [
            "label" => 'Vínculo',
            "rules" => 'required|int'
        ]
    ];
}
