<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Session;
use App\Model\CurriculoModel;
use App\Model\CidadeModel;

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

        // Carrega os dados do curriculo
        $curriculoModel = new CurriculoModel();
        $pessoaFisicaId = Session::get("pessoa_fisica_id");

        // Busca os dados do currículo relacionados a esse usuário
        $dadosCurriculo = $curriculoModel->getByPessoaFisicaId($pessoaFisicaId);

        // Carrega os dados da cidade
        $cidadeModel = new CidadeModel();

        $cidadeId = $dadosCurriculo['cidade_id'];
        $cidade = $cidadeModel->getById($cidadeId);

        // Junta os dados em um array para a view
        $dados = [
            'usuario' => $dadosUsuario,
            'curriculo' => $dadosCurriculo,
            'cidade' => $cidade
        ];


        // Carrega a view passando os dados
        return $this->loadView("sistema\\Perfil", $dados);
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $post = $this->request->getPost();

        if ($this->model->update($post)) {
            return Redirect::page($this->controller, [
                "toast" => ["tipo" => "success", "mensagem" => "Registro alterado com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller . "/form/update/" . $post['id']);
        }
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        $post = $this->request->getPost();

        if ($this->model->delete($post)) {
            return Redirect::page($this->controller, [
                "toast" => ["tipo" => "success", "mensagem" => "Registro excluído com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}
