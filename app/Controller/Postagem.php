<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Redirect;
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
        $files = $_FILES;

        // Se enviou um arquivo novo
        if (isset($files['imagem']) && $files['imagem']['error'] === UPLOAD_ERR_OK) {
            // Ler o conteúdo binário da imagem
            $imagemBinaria = file_get_contents($files['imagem']['tmp_name']);
            // Adicionar ao $post para atualizar no banco
            $post['imagem'] = $imagemBinaria;
        } else {
            // Se não enviou arquivo novo, remove a imagem do post para não alterar
            unset($post['imagem']);
        }

        if ($this->model->update($post)) {
            return Redirect::page("Perfil", [
                "toast" => ["tipo" => "success", "mensagem" => "Postagem alterada com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller . "/form/update/" . $post['postagem_id']);
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
                "toast" => ["tipo" => "success", "mensagem" => "Postagem excluída com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}
