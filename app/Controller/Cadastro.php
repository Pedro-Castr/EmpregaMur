<?php

namespace App\Controller;

use App\Model\UsuarioModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Session;
use Core\Library\Validator;

class Cadastro extends ControllerMain
{
    /**
     * construct
     */
    public function __construct()
    {
        $this->auxiliarConstruct();
        $this->model = new UsuarioModel();
        $this->loadHelper("formHelper");
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return $this->loadView("login/cadastro", []);
    }

    /**
     * singUpPf
     *
     * @return void
     */
    public function signUpPf()
    {
        $post = $this->request->getPost();

        if (Validator::make($post, $this->model->validationRulesPf)) {
            Session::set("formTipo", "PF");
            return Redirect::page("cadastro");
        }

        if ($this->model->getUserEmail($post['email_pf'])) {
            Session::set("msgError", "E-mail já cadastrado.");
            Session::set("inputs", $post);
            return Redirect::page("cadastro");
        }

        // Primeiro: inserir na tabela pessoa_fisica
        $dadosPf = [
            "nome" => $post['nome_pf'],
            "cpf"  => $post['cpf']
        ];
        $idPessoaFisica = $this->model->db->table("pessoa_fisica")->insert($dadosPf);

        if (!$idPessoaFisica) {
            Session::set("msgError", "Erro ao cadastrar pessoa física.");
            return Redirect::page("cadastro");
        }

        // Segundo: inserir na tabela usuario
        $dadosUsuario = [
            "pessoa_fisica_id" => $idPessoaFisica,
            "nome"             => $post['nome_pf'],
            "login"            => $post["email_pf"],
            "senha"            => password_hash($post["senha_pf"], PASSWORD_DEFAULT),
            "tipo"             => "PF"
        ];
        $idUsuario = $this->model->db->table("usuario")->insert($dadosUsuario);

        if (!$idUsuario) {
            Session::set("msgError", "Erro ao cadastrar usuário.");
            return Redirect::page("cadastro");
        }

        return Redirect::page("login", ["msgSucesso" => "Cadastro realizado com sucesso!"]);
    }

        /**
     * singUpPj
     *
     * @return void
     */
    public function signUpPj()
    {
        $post = $this->request->getPost();

        if (Validator::make($post, $this->model->validationRulesPj)) {
            Session::set("formTipo", "PJ");
            return Redirect::page("cadastro");
        }

        if ($this->model->getUserEmail($post['email_pj'])) {
            Session::set("msgError", "E-mail já cadastrado.");
            Session::set("inputs", $post);
            return Redirect::page("cadastro");
        }

        // Primeiro: inserir na tabela estabelecimento
        $dadosPj = [
            "nome"      => $post['nome_pj'],
            "latitude"  => $post['latitude'],
            "longitude" => $post['longitude'],
            "email"     => $post["email_pj"]
        ];
        $idEstabelecimento = $this->model->db->table("estabelecimento")->insert($dadosPj);

        if (!$idEstabelecimento) {
            Session::set("msgError", "Erro ao cadastrar empresa.");
            return Redirect::page("cadastro");
        }

        // Segundo: inserir na tabela usuario
        $dadosUsuario = [
            "estabelecimento_id" => $idEstabelecimento,
            "nome"               => $post['nome_pj'],
            "login"              => $post["email_pj"],
            "senha"              => password_hash($post["senha_pj"], PASSWORD_DEFAULT),
            "tipo"               => "PJ"
        ];
        $idUsuario = $this->model->db->table("usuario")->insert($dadosUsuario);

        if (!$idUsuario) {
            Session::set("msgError", "Erro ao cadastrar usuário.");
            return Redirect::page("cadastro");
        }

        return Redirect::page("login", ["msgSucesso" => "Cadastro realizado com sucesso!"]);
    }

}
