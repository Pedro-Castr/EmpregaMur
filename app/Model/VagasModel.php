<?php

namespace App\Model;

use Core\Library\ModelMain;

class VagasModel extends ModelMain
{
    protected $table = "vaga";

    public $validationRules = [
        "dtFim"  => [
            "label" => 'Data Final',
            "rules" => 'required|date'
        ],
        "dtInicio"  => [
            "label" => 'Data de Início',
            "rules" => 'required|date'
        ],
        "modalidade"  => [
            "label" => 'Modalidade',
            "rules" => 'required'
        ],
        "vinculo"  => [
            "label" => 'Vínculo',
            "rules" => 'required'
        ],
        "sobreaVaga"  => [
            "label" => 'Sobre a vaga',
            "rules" => 'required'
        ],
        "cargo_id"  => [
            "label" => 'Cargo',
            "rules" => 'required'
        ]
    ];
}
