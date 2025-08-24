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

    public function getVagaById($vagaId)
    {
        return $this->db->where('vaga_id', $vagaId)->prepareSelect();
    }

    public function listaVagasFiltradas($pesquisa = null, $filtros = [])
    {
        $query = $this->db->where('statusVaga', 2);

        if (!empty($pesquisa)) {
            $query->whereLike('descricao', $pesquisa);
        }

        if (!empty($filtros['vinculo'])) {
            $query->whereIn('vinculo', $filtros['vinculo']);
        }

        if (!empty($filtros['modalidade'])) {
            $query->whereIn('modalidade', $filtros['modalidade']);
        }

        return $query->orderBy('dtInicio', 'ASC')->prepareSelect();
    }
}
