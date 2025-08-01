<?php

namespace App\Controller;

use App\Model\CargoModel;
use App\Model\CurriculoModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Validator;
use Core\Library\Session;


class Experiencias extends ControllerMain
{

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
    }

    public function form($action, $id)
    {
        $CargoModel = new CargoModel();
        $curriculoModel = new CurriculoModel();

        $pessoaFisicaId = Session::get("pessoa_fisica_id");
        $curriculo = $curriculoModel->getByPessoaFisicaId($pessoaFisicaId);

        $dados = [
            'data' => $this->model->getById($id),
            'aCargos' => $CargoModel->lista("descricao"),
            'curriculum_id' => $curriculo['curriculum_id']
        ];

        return $this->loadView("sistema/formExperiencias", $dados);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();

        // Retira os valores de fim caso a experiência seja atual
        if (isset($post['atual']) && $post['atual']) {
            unset($post['fimMes'], $post['fimAno']);
        }

        if (Validator::make($post, $this->model->validationRules)) {
            Session::set('inputs', $post);
            return Redirect::page($this->controller . "/form/insert/0");
        } else {
            // Verifica se a data de fim é maior que a de início
            if (isset($post['fimMes'], $post['fimAno'])) {
                if ($post['inicioAno'] > $post['fimAno'] ||
                    ($post['inicioAno'] == $post['fimAno'] && $post['inicioMes'] > $post['fimMes'])) {
                    Session::set('inputs', $post);
                    return Redirect::page($this->controller . "/form/insert/0", [
                        "toast" => ["tipo" => "error", "mensagem" => "A data de início deve ser menor que a data de fim"]
                    ]);
                }
            }

            // Remover o campo que não pertence à tabela
            unset($post['atual']);
            if ($this->model->insert($post)) {
                return Redirect::page("perfil", [
                    "toast" => ["tipo" => "success", "mensagem" => "Experiência cadastrada com sucesso"]
                ]);
            } else {
                Session::set('inputs', $post);
                return Redirect::page($this->controller . "/form/insert/0", [
                    "toast" => ["tipo" => "error", "mensagem" => "Erro ao cadastrar Experiência"]
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

        // Retira os valores de fim caso a experiência seja atual
        if (isset($post['atual']) && $post['atual']) {
            $post['fimMes'] = null;
            $post['fimAno'] = null;
        }

        if (Validator::make($post, $this->model->validationRules)) {
            Session::set('inputs', $post);
            return Redirect::page($this->controller . "/form/update/" . $post['curriculum_experiencia_id']);
        } else {
            // Verifica se a data de fim é maior que a de início
            if (isset($post['fimMes'], $post['fimAno'])) {
                if ($post['inicioAno'] > $post['fimAno'] ||
                    ($post['inicioAno'] == $post['fimAno'] && $post['inicioMes'] > $post['fimMes'])) {
                    Session::set('inputs', $post);
                    return Redirect::page($this->controller . "/form/update/" . $post['curriculum_experiencia_id'], [
                        "toast" => ["tipo" => "error", "mensagem" => "A data de início deve ser menor que a data de fim"]
                    ]);
                }
            }

            // Remover o campo que não pertence à tabela
            unset($post['atual']);
            if ($this->model->update($post)) {
                return Redirect::page("perfil", [
                    "toast" => ["tipo" => "success", "mensagem" => "Experiência alterada com sucesso"]
                ]);
            } else {
                return Redirect::page($this->controller . "/form/update/" . $post['curriculum_experiencia_id']);
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
                    "toast" => ["tipo" => "success", "mensagem" => "Experiência excluída com sucesso"]
                ]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}
