<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Session;
use App\Model\CurriculoModel;
use App\Model\CidadeModel;
use Core\Library\Validator;

class Perfil extends ControllerMain
{
    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        // Verifica se usuário está logado
        if (!Session::get("userId")) {
            header("Location: " . baseUrl() . "login");
            exit;
        }

        // Pega o ID do usuário logado
        $userId = Session::get("userId");

        // Busca os dados do usuário
        $dadosUsuario = $this->model->getByUserId($userId);

        // Instancia o model do currículo
        $curriculoModel = new CurriculoModel();
        $pessoaFisicaId = Session::get("pessoa_fisica_id");

        // Busca o currículo (pode vir null)
        $dadosCurriculo = $curriculoModel->getByPessoaFisicaId($pessoaFisicaId);

        // Inicializa $cidade como null
        $cidade = null;

        // Só tenta buscar a cidade se o currículo existir e tiver cidade_id
        if (!empty($dadosCurriculo) && isset($dadosCurriculo['cidade_id'])) {
            $cidadeModel = new CidadeModel();
            $cidade = $cidadeModel->getById($dadosCurriculo['cidade_id']);
        }

        // Prepara os dados para a view
        $dados = [
            'usuario' => $dadosUsuario,
            'curriculo' => $dadosCurriculo,
            'cidade' => $cidade
        ];

        // Carrega a view
        return $this->loadView("sistema\\Perfil", $dados);
    }

    public function form($action, $id)
    {
        return $this->loadView("sistema/formPerfil", $this->model->getById($id));
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $post = $this->request->getPost();

        // Verifica se o usuário quer alterar a senha
        if (!empty($post['novaSenha']) || !empty($post['confirmaNovaSenha'])) {
            $aUser = $this->model->getEmailByUsuarioId($post['usuario_id']);

            // valida a senha atual
            if (empty(trim($post['senhaAtual']))) {
                return Redirect::page($this->controller . "/form/update/" . $post['usuario_id'], [
                    "toast" => ["mensagem" => "Informe sua senha atual", "tipo" => "error"],
                ]);
            }

            if (!password_verify(trim($post["senhaAtual"]), trim($aUser['senha']))) {
                return Redirect::page($this->controller . "/form/update/" . $post['usuario_id'], [
                    "toast" => ["mensagem" => "Senha atual inválida", "tipo" => "error"],
                ]);
            }

            if ($post['novaSenha'] !== $post['confirmaNovaSenha']) {
                return Redirect::page($this->controller . "/form/update/" . $post['usuario_id'], [
                    "toast" => ["mensagem" => "As novas senhas não coincidem", "tipo" => "error"],
                ]);
            }

            // Atualiza nome e nova senha
            $dadosAtualizados = [
                'usuario_id' => $post['usuario_id'],
                'nome' => $post['nome'],
                'senha' => password_hash(trim($post['novaSenha']), PASSWORD_DEFAULT)
            ];
        } else {
            // Atualiza apenas o nome
            $dadosAtualizados = [
                'usuario_id' => $post['usuario_id'],
                'nome' => $post['nome']
            ];
        }

        if ($this->model->update($dadosAtualizados)) {
            return Redirect::page($this->controller, [
                "toast" => ["tipo" => "success", "mensagem" => "Dados alterados com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller . "/form/update/" . $post['usuario_id']);
        }
    }
}
