<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Validator;
use Core\Library\Session;

class Postagem extends ControllerMain
{
    protected $files;

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
    }

    public function form($action, $id)
    {
        $dados = $this->model->getById($id);

        return $this->loadView("sistema/formPostagem", $dados);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();

        // Verifica se uma imagem foi enviada
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $fotoTmp = $_FILES['imagem']['tmp_name'];
            $fotoBinaria = file_get_contents($fotoTmp); // lê como binário

            $post['imagem'] = $fotoBinaria;
        } else {
            $post['imagem'] = null;
        }

        if ($this->model->insert($post)) {
            return Redirect::page("Home", [
                "toast" => ["tipo" => "success", "mensagem" => "Postagem feita com sucesso"]
            ]);
        } else {
            Session::set('inputs', $post);
            return Redirect::page($this->controller . "/form/insert/0", [
                "toast" => ["tipo" => "error", "mensagem" => "Erro ao criar postagem"]
            ]);
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
