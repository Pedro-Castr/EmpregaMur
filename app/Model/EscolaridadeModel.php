<?php

namespace App\Model;

use Core\Library\ModelMain;

class EscolaridadeModel extends ModelMain
{
    protected $table = "curriculum_escolaridade";
    protected $primaryKey = "curriculum_escolaridade_id";

    public $validationRules = [
        "inicioMes" => [
            "label" => 'Mês de Início',
            "rules" => 'required'
        ],
        "inicioAno" => [
            "label" => 'Ano de Início',
            "rules" => 'required'
        ],
        "fimMes" => [
            "label" => 'Mês Final',
            "rules" => 'required'
        ],
        "fimAno" => [
            "label" => 'Ano Final',
            "rules" => 'required'
        ],
        "descricao" => [
            "label" => 'Descrição',
            "rules" => 'required|min:5|max:60'
        ],
        "instituicao" => [
            "label" => 'Instituição',
            "rules" => 'required|min:5|max:60'
        ],
        "escolaridade_id" => [
            "label" => 'Escolaridade',
            "rules" => 'required'
        ],
        "cidade_id" => [
            "label" => 'Cidade',
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
