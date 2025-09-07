<?php

namespace App\Model;

use Core\Library\ModelMain;

class EXperienciasModel extends ModelMain
{
    protected $table = "curriculum_experiencia";
    protected $primaryKey = "curriculum_experiencia_id";

    public $validationRules = [
        "inicioMes" => [
            "label" => 'Mês de Início',
            "rules" => 'required'
        ],
        "inicioAno" => [
            "label" => 'Ano de Início',
            "rules" => 'required'
        ],
        "estabelecimento" => [
            "label" => 'Estabelecimento',
            "rules" => 'required|min:5|max:60'
        ],
        "cargo_id" => [
            "label" => 'Cargo',
            "rules" => 'required'
        ]
    ];

    public function listaEscolaridade()
    {
        return $this->db->select("curriculum_escolaridade.*, escolaridade.descricao")
            ->join("escolaridade", "escolaridade.escolaridade_id = curriculum_escolaridade.escolaridade_id")
            ->orderBy("escolaridade.descricao")->findAll();
    }

    public function getByCurriculumId($curriculumId)
    {
        return $this->db->where('curriculum_id', $curriculumId)->findAll();
    }
}
