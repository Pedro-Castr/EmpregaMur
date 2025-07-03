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

    public function validatePfData(array $data): ?string
    {
        // Confirmação de senha
        if ($data['senha'] !== $data['confirmar_senha']) {
            return "As senhas não coincidem.";
        }

        // Validação simples de CPF
        if (!preg_match('/^\d{11}$/', $data['cpf'])) {
            return "CPF inválido. Deve conter apenas números (11 dígitos).";
        }

        return null; // Tudo certo
    }

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

    public function validatePjData(array $data): ?string
    {
        // Confirmação de senha
        if ($data["senha"] !== $data["confirmar_senha"]) {
            return "As senhas não coincidem.";
        }

        // verificar se latitude e longitude são floats válidos
        if (!is_numeric($data["latitude"]) || !is_numeric($data["longitude"])) {
            return "Latitude e Longitude devem ser números válidos.";
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
