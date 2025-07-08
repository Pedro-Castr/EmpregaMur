<?php

namespace App\Model;

use Core\Library\ModelMain;

class UsuarioModel extends ModelMain
{
    protected $table = "usuario";

    public $validationRulesPf = [
        "nome_pf" => [
            "label" => "Nome",
            "rules" => "required|min:5|max:150"
        ],
        "email_pf" => [
            "label" => "E-mail",
            "rules" => "required|email|max:50"
        ],
        "cpf" => [
            "label" => "CPF",
            "rules" => "required|cpf"
        ],
        "senha_pf" => [
            "label" => "Senha",
            "rules" => "required|min:8|max:50"
        ],
        "confirmar_senha_pf" => [
            "label" => "Confirmação de Senha",
            "rules" => "required|min:8|max:50"
        ]
    ];

    public function validatePfData(array $data): ?string
    {
        // Confirmação de senha
        if ($data['senha_pf'] !== $data['confirmar_senha_pf']) {
            return "As senhas não coincidem.";
        }
        return null; // Tudo certo
    }

    public $validationRulesPj = [
        "nome_pj" => [
            "label" => "Nome da Empresa",
            "rules" => "required|min:5|max:50"
        ],
        "email_pj" => [
            "label" => "E-mail",
            "rules" => "required|email|max:50"
        ],
        "latitude" => [
            "label" => "Latitude",
            "rules" => "required|float"
        ],
        "longitude" => [
            "label" => "Longitude",
            "rules" => "required|float"
        ],
        "senha_pj" => [
            "label" => "Senha",
            "rules" => "required|min:8|max:50"
        ],
        "confirmar_senha_pj" => [
            "label" => "Confirmação de Senha",
            "rules" => "required|min:8|max:50"
        ]
    ];

    public function validatePjData(array $data): ?string
    {
        // Confirmação de senha
        if ($data["senha_pj"] !== $data["confirmar_senha_pj"]) {
            return "As senhas não coincidem.";
        }
        return null; // Tudo certo
    }

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
