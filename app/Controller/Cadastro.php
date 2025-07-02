<?php

namespace App\Controller;

use App\Model\UsuarioModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Session;

class Cadastro extends ControllerMain
{
    /**
     * construct
     */
    public function __construct()
    {
        $this->auxiliarConstruct();
        $this->model = new UsuarioModel();
        $this->loadHelper("formHelper");
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return $this->loadView("login/cadastro", []);
    }

    /**
     * signIn
     *
     * @return void
     */
    public function signIn()
    {
        $post   = $this->request->getPost();
        $aUser  = $this->model->getUserEmail($post['email']);

        if (count($aUser) > 0) {

            // validar a senha
            if (!password_verify(trim($post["senha"]), trim($aUser['senha'])) ) {
                return Redirect::page("login", [
                    "msgError" => 'Login ou senha inválido.',
                    'inputs' => ["email" => $post['email']]
                ]);
            }

            //  Criar flag's de usuário logado no sistema
            Session::set("userId"   , $aUser['id']);
            Session::set("userNome" , $aUser['nome']);
            Session::set("userEmail", $aUser['email']);
            Session::set("userNivel", $aUser['nivel']);
            Session::set("userSenha", $aUser['senha']);

            // Direcionar o usuário para página home
            return Redirect::page("sistema");

        } else {
            return Redirect::page("login", [
                "msgError" => 'Login ou senha inválido.',
                'inputs' => ["email" =>$post['email']]
            ]);
        }
    }
}
