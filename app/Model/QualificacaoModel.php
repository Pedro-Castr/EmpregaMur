<?php

namespace App\Model;

use Core\Library\ModelMain;

class QualificacaoModel extends ModelMain
{
    protected $table = "curriculum_qualificacao";
    protected $primaryKey = "curriculum_qualificacao_id";

    public $validationRules = [
        "mes" => [
            "label" => 'Mês',
            "rules" => 'required'
        ],
        "ano" => [
            "label" => 'Ano',
            "rules" => 'required'
        ],
        "cargaHoraria" => [
            "label" => 'Carga Horária',
            "rules" => 'required|int'
        ],
        "descricao" => [
            "label" => 'Descrição',
            "rules" => 'required|min:3|max:60'
        ],
        "estabelecimento" => [
            "label" => 'Estabelecimento',
            "rules" => 'required|min:3|max:60'
        ]
    ];

    public function getByCurriculumId($curriculumId)
    {
        return $this->db->where('curriculum_id', $curriculumId)->findAll();
    }
}
