<?php

namespace App\Controller;

use App\Model\CurriculoModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Validator;
use Core\Library\Session;

class Qualificacao extends ControllerMain
{

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
    }

    public function form($action, $id)
    {
        $curriculoModel = new CurriculoModel();
        $pessoaFisicaId = Session::get("pessoa_fisica_id");
        $curriculo = $curriculoModel->getByPessoaFisicaId($pessoaFisicaId);

        $dados = [
            'data' => $this->model->getById($id),
            'curriculum_id' => $curriculo['curriculum_id']
        ];

        return $this->loadView("sistema/formQualificacao", $dados);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();

        if (Validator::make($post, $this->model->validationRules)) {
            Session::set('inputs', $post);
            return Redirect::page($this->controller . "/form/insert/0");
        } else {

            if ($this->model->insert($post)) {
                return Redirect::page("perfil", [
                    "toast" => ["tipo" => "success", "mensagem" => "Qualificação cadastrada com sucesso"]
                ]);
            } else {
                Session::set('inputs', $post);
                return Redirect::page($this->controller . "/form/insert/0", [
                    "toast" => ["tipo" => "error", "mensagem" => "Erro ao cadastrar qualificação"]
                ]);
            }
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

        if (Validator::make($post, $this->model->validationRules)) {
            Session::set('inputs', $post);
            return Redirect::page($this->controller . "/form/update/" . $post['curriculum_escolaridade_id']);
        } else {

            if ($this->model->update($post)) {
                return Redirect::page("perfil", [
                    "toast" => ["tipo" => "success", "mensagem" => "Qualificação alterada com sucesso"]
                ]);
            } else {
                return Redirect::page($this->controller . "/form/update/" . $post['curriculum_escolaridade_id']);
            }
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
            return Redirect::page("perfil", [
                    "toast" => ["tipo" => "success", "mensagem" => "Qualificação excluída com sucesso"]
                ]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}
