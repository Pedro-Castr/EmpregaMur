<?php

namespace App\Model;

use Core\Library\ModelMain;

class VagasModel extends ModelMain
{
    protected $table = "vaga";
    protected $primaryKey = "vaga_id";

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

    public function getByEstabelecimentoId($estabelecimentoId)
    {
        return $this->db->where('estabelecimento_id', $estabelecimentoId)->findAll();
    }

    public function listaVagasAbertas($orderby = 'dtInicio', $direction = 'ASC')
    {
        return $this->db
                    ->where('statusVaga', 2)
                    ->orderBy($orderby, $direction)
                    ->prepareSelect();
    }
}
