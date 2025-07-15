<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Session;

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

        // Busca os dados do usuário no model pelo ID
        $dados = $this->model->getByUserId($userId);

        // Carrega a view passando os dados do usuário
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
