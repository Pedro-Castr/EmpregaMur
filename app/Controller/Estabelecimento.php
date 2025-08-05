<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Redirect;

class Estabelecimento extends ControllerMain
{
    protected $files;

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
    }

    public function form($action, $id)
    {
        $dados = [
            'data' => $this->model->getById($id),
        ];

        return $this->loadView("sistema/formEstabelecimento", $dados);
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
                return Redirect::page($this->controller . "/form/update/" . $post['estabelecimento_id'], [
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
                "toast" => ["tipo" => "success", "mensagem" => "Perfil alterado com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller . "/form/update/" . $post['estabelecimento_id']);
        }
    }
}
