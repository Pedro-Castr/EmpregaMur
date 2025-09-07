<?php

namespace App\Model;

use Core\Library\ModelMain;

class CurriculoModel extends ModelMain
{
    protected $table = "curriculum";
    protected $primaryKey = "curriculum_id";

    public $validationRules = [
        "logradouro" => [
            "label" => 'Logradouro',
            "rules" => 'required|min:3|max:60'
        ],
        "numero" => [
            "label" => 'Número',
            "rules" => 'max:10'
        ],
        "complemento" => [
            "label" => 'Complemento',
            "rules" => 'max:20'
        ],
        "bairro" => [
            "label" => 'Bairro',
            "rules" => 'required|min:3|max:50'
        ],
        "cep" => [
            "label" => 'CEP',
            "rules" => 'required|int|cep'
        ],
        "celular" => [
            "label" => 'Celular',
            "rules" => 'required|int|telefone'
        ],
        "dataNascimento" => [
            "label" => 'Nascimento',
            "rules" => 'required|date'
        ],
        "email" => [
            "label" => 'Email',
            "rules" => 'required|min:10|max:50'
        ],
        "cidade_id" => [
            "label" => 'Cidade',
            "rules" => 'required'
        ]
    ];

    /**
     * lista
     *
     * @param string $orderby
     * @return array
     */
    public function listaCidade()
    {
        return $this->db->select("curriculum.*, cidade.cidade, cidade.uf")->join("cidade", "cidade.cidade_id = curriculum.cidade_id")->orderBy("cidade.cidade")->findAll();
    }

    public function getByPessoaFisicaId($pessoaFisicaId)
    {
        return $this->db->where('pessoa_fisica_id', $pessoaFisicaId)->first();
    }
}
