<?php

namespace App\Controller;

use App\Model\NivelEscolaridadeModel;
use App\Model\CurriculoModel;
use App\Model\CidadeModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Validator;
use Core\Library\Session;

class Escolaridade extends ControllerMain
{

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
    }

    public function form($action, $id)
    {
        $NivelEscolaridadeModel = new NivelEscolaridadeModel();
        $CidadeModel = new CidadeModel();

        $curriculoModel = new CurriculoModel();
        $pessoaFisicaId = Session::get("pessoa_fisica_id");
        $curriculo = $curriculoModel->getByPessoaFisicaId($pessoaFisicaId);

        $dados = [
            'data' => $this->model->getById($id),
            'aEscolaridade' => $NivelEscolaridadeModel->lista("descricao"),
            'aCidades' => $CidadeModel->lista("cidade"),
            'curriculum_id' => $curriculo['curriculum_id']
        ];

        return $this->loadView("sistema/formEscolaridade", $dados);
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
            // Verifica se a data de fim é maior que a de início
            if (
                $post['inicioAno'] > $post['fimAno'] ||
                ($post['inicioAno'] == $post['fimAno'] && $post['inicioMes'] > $post['fimMes'])
            ) {
                Session::set('inputs', $post);
                return Redirect::page($this->controller . "/form/insert/0", [
                    "toast" => ["tipo" => "error", "mensagem" => "A data de início deve ser menor que a data de fim"]
                ]);
            }

            if ($this->model->insert($post)) {
                return Redirect::page("perfil", [
                    "toast" => ["tipo" => "success", "mensagem" => "Escolaridade cadastrada com sucesso"]
                ]);
            } else {
                Session::set('inputs', $post);
                return Redirect::page($this->controller . "/form/insert/0", [
                    "toast" => ["tipo" => "error", "mensagem" => "Erro ao cadastrar escolaridade"]
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
            // Verifica se a data de fim é maior que a de início
            if (
                $post['inicioAno'] > $post['fimAno'] ||
                ($post['inicioAno'] == $post['fimAno'] && $post['inicioMes'] > $post['fimMes'])
            ) {
                Session::set('inputs', $post);
                return Redirect::page($this->controller . "/form/update/" . $post['curriculum_escolaridade_id'], [
                    "toast" => ["tipo" => "error", "mensagem" => "A data de início deve ser menor que a data de fim"]
                ]);
            }

            if ($this->model->update($post)) {
                return Redirect::page("perfil", [
                    "toast" => ["tipo" => "success", "mensagem" => "Escolaridade alterada com sucesso"]
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
                "toast" => ["tipo" => "success", "mensagem" => "Escolaridade excluída com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}
