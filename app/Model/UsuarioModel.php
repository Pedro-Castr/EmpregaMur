<?php

namespace App\Model;

use Core\Library\ModelMain;

class UsuarioModel extends ModelMain
{
    protected $table = "usuario";

    public $validationRulesPf = [
        "nome" => [
            "label" => "Nome",
            "rules" => "required|min:3|max:100"
        ],
        "email" => [
            "label" => "E-mail",
            "rules" => "required|email|max:150"
        ],
        "cpf" => [
            "label" => "CPF",
            "rules" => "required|min:11|max:11"
        ],
        "senha" => [
            "label" => "Senha",
            "rules" => "required|min:6|max:100"
        ],
        "confirmar_senha" => [
            "label" => "Confirmação de Senha",
            "rules" => "required|min:6|max:100"
        ]
    ];

    public $validationRulesPj = [
        "nome_empresa" => [
            "label" => "Nome da Empresa",
            "rules" => "required|min:3|max:100"
        ],
        "email" => [
            "label" => "E-mail",
            "rules" => "required|email|max:150"
        ],
        "latitude" => [
            "label" => "Latitude",
            "rules" => "required"
        ],
        "longitude" => [
            "label" => "Longitude",
            "rules" => "required"
        ],
        "senha" => [
            "label" => "Senha",
            "rules" => "required|min:6|max:100"
        ],
        "confirmar_senha" => [
            "label" => "Confirmação de Senha",
            "rules" => "required|min:6|max:100"
        ]
    ];

    /**
     * getUserEmail
     *
     * @param string $email
     * @return array
     */
    public function getUserEmail($email)
    {
        return $this->db->where("login", $email)->first();
    }
}
