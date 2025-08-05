<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Redirect;

class Vagas extends ControllerMain
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
        return $this->loadView("sistema\Vagas", $this->model->lista("descricao"));
    }

        public function form($action, $id)
    {
        return $this->loadView("sistema/formVagas", $this->model->getById($id));
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();

        if ($this->model->insert($post)) {
            return Redirect::page($this->controller, [
                "toast" => ["tipo" => "success", "mensagem" => "Registro inserido com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller . "/form/insert/0");
        }
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
