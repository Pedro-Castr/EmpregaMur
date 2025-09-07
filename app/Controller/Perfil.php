<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Session;
use App\Model\CurriculoModel;
use App\Model\CidadeModel;
use App\Model\PessoaFisicaModel;
use App\Model\EscolaridadeModel;
use App\Model\NivelEscolaridadeModel;
use App\Model\EXperienciasModel;
use App\Model\CargoModel;
use App\Model\QualificacaoModel;
use App\Model\EstabelecimentoModel;
use App\Model\VagasModel;
use App\Model\PostagemModel;

class Perfil extends ControllerMain
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
        if (!Session::get("userId")) {
            header("Location: " . baseUrl() . "login");
            exit;
        }

        if (Session::get('userTipo') == 'PF') {
            $userId = Session::get("userId");
            $dadosUsuario = $this->model->getByUserId($userId);

            $curriculoModel = new CurriculoModel();
            $pessoaFisicaId = Session::get("pessoa_fisica_id");

            $dadosCurriculo = $curriculoModel->getByPessoaFisicaId($pessoaFisicaId);

            $cidade = null;
            if (!empty($dadosCurriculo) && isset($dadosCurriculo['cidade_id'])) {
                $cidadeModel = new CidadeModel();
                $cidade = $cidadeModel->getById($dadosCurriculo['cidade_id']);
            }

            // Escolaridades
            $nivelEscolaridadeModel = new NivelEscolaridadeModel();
            $escolaridadeModel = new EscolaridadeModel();

            $listaEscolaridades = [];
            if (!empty($dadosCurriculo)) {
                $escolaridades = $escolaridadeModel->getByCurriculumId($dadosCurriculo['curriculum_id']);

                foreach ($escolaridades as $escolaridade) {
                    $detalheEscolaridade = $nivelEscolaridadeModel->getById($escolaridade['escolaridade_id']);
                    $escolaridade['nome_escolaridade'] = $detalheEscolaridade['descricao'] ?? 'Não informado';

                    $listaEscolaridades[] = $escolaridade;
                }
            }

            // Experiências
            $experienciaModel = new ExperienciasModel();
            $cargoModel = new CargoModel();

            $listaExperiencias = [];
            if (!empty($dadosCurriculo)) {
                $experiencias = $experienciaModel->getByCurriculumId($dadosCurriculo['curriculum_id']);

                foreach ($experiencias as $experiencia) {
                    $cargo = $cargoModel->getById($experiencia['cargo_id']);
                    $experiencia['nome_cargo'] = $cargo['descricao'] ?? 'Não informado';

                    $listaExperiencias[] = $experiencia;
                }
            }

            // Qualificações
            $QualificacoesModel = new QualificacaoModel();

            $listaQualificacoes = [];
            if (!empty($dadosCurriculo)) {
                $qualificacoes = $QualificacoesModel->getByCurriculumId($dadosCurriculo['curriculum_id']);

                foreach ($qualificacoes as $qualificacao) {
                    $listaQualificacoes[] = $qualificacao;
                }
            }

            // Postagens
            $PostagemModel = new PostagemModel();
            $postagens = $PostagemModel->getPostagensById($userId);

            $dados = [
                'usuario' => $dadosUsuario,
                'curriculo' => $dadosCurriculo,
                'cidade' => $cidade,
                'escolaridades' => $listaEscolaridades,
                'experiencias' => $listaExperiencias,
                'qualificacoes' => $listaQualificacoes,
                'postagens' => $postagens
            ];

            return $this->loadView("sistema\\Perfil-PF", $dados);
        } else if (Session::get('userTipo') == 'PJ') {
            $userId = Session::get("userId");
            $dadosUsuario = $this->model->getByUserId($userId);

            $EstabelecimentoModel = new EstabelecimentoModel();
            $estabelecimentoId = Session::get("estabelecimento_id");

            $dadosEstabelecimento = $EstabelecimentoModel->getByEstabelecimentoId($estabelecimentoId);

            // Buscar vagas do estabelecimento
            $vagaModel = new VagasModel();
            $cargoModel = new CargoModel();

            $vagas = $vagaModel->getByEstabelecimentoId($estabelecimentoId);

            // Postagens
            $PostagemModel = new PostagemModel();
            $postagens = $PostagemModel->getPostagensById($userId);

            $dados = [
                'usuario' => $dadosUsuario,
                'estabelecimento' => $dadosEstabelecimento,
                'vagas' => $vagas,
                'postagens' => $postagens
            ];

            return $this->loadView("sistema\\Perfil-PJ", $dados);
        }
    }

    public function form($action, $id)
    {
        if (Session::get('userTipo') == 'PF') {
            return $this->loadView("sistema/formPerfil-PF", $this->model->getById($id));
        } else if (Session::get('userTipo') == 'PJ') {
            return $this->loadView("sistema/formPerfil-PJ", $this->model->getById($id));
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

        // Verifica se o usuário quer alterar a senha
        if (!empty($post['novaSenha']) || !empty($post['confirmaNovaSenha'])) {
            $aUser = $this->model->getEmailByUsuarioId($post['usuario_id']);

            // valida a senha atual
            if (empty(trim($post['senhaAtual']))) {
                return Redirect::page($this->controller . "/form/update/" . $post['usuario_id'], [
                    "toast" => ["mensagem" => "Informe sua senha atual", "tipo" => "error"],
                ]);
            }

            if (!password_verify(trim($post["senhaAtual"]), trim($aUser['senha']))) {
                return Redirect::page($this->controller . "/form/update/" . $post['usuario_id'], [
                    "toast" => ["mensagem" => "Senha atual inválida", "tipo" => "error"],
                ]);
            }

            if ($post['novaSenha'] !== $post['confirmaNovaSenha']) {
                return Redirect::page($this->controller . "/form/update/" . $post['usuario_id'], [
                    "toast" => ["mensagem" => "As novas senhas não coincidem", "tipo" => "error"],
                ]);
            }

            // Atualiza nome e nova senha
            $dadosAtualizados = [
                'usuario_id' => $post['usuario_id'],
                'nome' => $post['nome'],
                'senha' => password_hash(trim($post['novaSenha']), PASSWORD_DEFAULT)
            ];
        } else {
            // Atualiza apenas o nome
            $dadosAtualizados = [
                'usuario_id' => $post['usuario_id'],
                'nome' => $post['nome']
            ];
        }

        if ($this->model->update($dadosAtualizados)) {
            return Redirect::page($this->controller, [
                "toast" => ["tipo" => "success", "mensagem" => "Dados alterados com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller . "/form/update/" . $post['usuario_id']);
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

        $pessoaFisicaModel = new PessoaFisicaModel();
        $pessoaFisicaId = Session::get('pessoa_fisica_id');

        if ($this->model->delete($post)) {
            $pessoaFisicaModel->delete(['pessoa_fisica_id' => $pessoaFisicaId]);

            // Chama o método signOut do controller Login
            $loginController = new \App\Controller\Login();
            return $loginController->signOut();
        } else {
            return Redirect::page($this->controller);
        }
    }
}
