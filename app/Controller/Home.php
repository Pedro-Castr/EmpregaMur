<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use App\Model\PostagemModel;

class Home extends ControllerMain
{
    public function index()
    {
        $PostagemModel = new PostagemModel();

        $post = $this->request->getPost();

        $dados = [
            'postagem' => $PostagemModel->getPostagens(),
        ];

        return $this->loadView("Home", $dados);
    }
}
