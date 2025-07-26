<?php

namespace App\Controller;

use App\Model\CidadeModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Validator;

class Curriculo extends ControllerMain
{
    protected $files;

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
    }

    public function form($action, $id)
    {
        $CidadeModel = new CidadeModel();

        $dados = [
            'data' => $this->model->getById($id),
            'aCidades' => $CidadeModel->lista("cidade")
        ];

        return $this->loadView("sistema/formCurriculo", $dados);
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
            return Redirect::page($this->controller . "/form/insert/0");
        } else {
            // Verifica se uma imagem foi enviada
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $fotoTmp = $_FILES['foto']['tmp_name'];
                $fotoBinaria = file_get_contents($fotoTmp); // lê como binário

                $post['foto'] = $fotoBinaria;
            } else {
                $post['foto'] = null;
            }

            if ($this->model->insert($post)) {
                return Redirect::page("perfil", [
                    "toast" => ["tipo" => "success", "mensagem" => "Currículo cadastrado com sucesso"]
                ]);
            } else {
                return Redirect::page($this->controller . "/form/insert/0");
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
        $files = $_FILES;

        // Se enviou um arquivo novo
        if (isset($files['foto']) && $files['foto']['error'] === UPLOAD_ERR_OK) {

            if (in_array($files['foto']['type'], FILE_ALLOWEDTYPES)) {
                // Ler o conteúdo binário da imagem
                $imagemBinaria = file_get_contents($files['foto']['tmp_name']);
                // Adicionar ao $post para atualizar no banco
                $post['foto'] = $imagemBinaria;
            } else {
                return Redirect::page($this->controller . "/form/update/" . $post['curriculum_id'], [
                    "toast" => ["tipo" => "error", "mensagem" => "Tipo de arquivo inválido para imagem"]
                ]);
            }
        } else {
            // Se não enviou arquivo novo, remover o índice 'foto' do post para não alterar
            unset($post['foto']);
        }

        // Agora atualiza com o $post (com ou sem campo 'foto' novo)
        if ($this->model->update($post)) {
            return Redirect::page("perfil", [
                "toast" => ["tipo" => "success", "mensagem" => "Currículo alterado com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller . "/form/update/" . $post['curriculum_id']);
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
                    "toast" => ["tipo" => "success", "mensagem" => "Currículo excluído com sucesso"]
                ]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}
