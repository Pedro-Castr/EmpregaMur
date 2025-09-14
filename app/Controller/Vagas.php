<?php

namespace App\Controller;

use App\Model\CargoModel;
use App\Model\EstabelecimentoModel;
use App\Model\CandidaturaModel;
use App\Model\CurriculoModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Session;

class Vagas extends ControllerMain
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
        $post = $this->request->getPost();

        $pesquisa = $post['pesquisa'] ?? null;
        $filtros = [
            'vinculo'    => $post['vinculo'] ?? [],
            'modalidade' => $post['modalidade'] ?? []
        ];

        $filtros['vinculo'] = array_map('intval', $filtros['vinculo'] ?? []);
        $filtros['modalidade'] = array_map('intval', $filtros['modalidade'] ?? []);

        $vagasAbertas = $this->filtrarVagas($pesquisa);

        $estabelecimentoModel = new EstabelecimentoModel();
        $curriculumModel = new CurriculoModel();
        $candidaturaModel = new CandidaturaModel();

        // Pegando o ID do usuário logado
        $pessoaFisicaId = Session::get('pessoa_fisica_id');

        // Buscando curriculum_id do usuário logado
        $curriculum = $curriculumModel->getByPessoaFisicaId($pessoaFisicaId);
        $curriculumId = $curriculum['curriculum_id'] ?? null;

        $listaEstabelecimentos = [];

        foreach ($vagasAbertas as $vaga) {
            $detalheEstabelecimento = $estabelecimentoModel->getByEstabelecimentoId($vaga['estabelecimento_id']);
            $vaga['nome_estabelecimento'] = $detalheEstabelecimento['nome'] ?? 'Não informado';
            $vaga['foto_estabelecimento'] = $detalheEstabelecimento['foto'] ?? 'Não informado';

            // Verifica se o candidato já se inscreveu na vaga
            $vaga['candidatado'] = false; // padrão

            if ($curriculumId) {
                $vaga['candidatado'] = $candidaturaModel->jaCandidatado($curriculumId, $vaga['vaga_id']);
            }

            $listaEstabelecimentos[] = $vaga;
        }

        $dados = [
            'vagas' => $listaEstabelecimentos,
            'curriculum_id' => $curriculumId,
            'pesquisa' => $pesquisa,
            'filtros' => $filtros
        ];

        return $this->loadView("sistema\\Vagas", $dados);
    }

    public function view($id)
    {
        $vaga = $this->model->getVagaById($id);

        $candidaturaModel = new CandidaturaModel();
        $candidatos = $candidaturaModel->getCandidatosComUsuario($id);

        $dados = [
            'vaga' => $vaga[0],
            'candidatos' => $candidatos
        ];

        return $this->loadView("sistema\\viewVagas", $dados);
    }

    public function form($action, $id)
    {
        $estabelecimentoModel = new EstabelecimentoModel();
        $estabelecimentoId = Session::get("estabelecimento_id");
        $estabelecimento = $estabelecimentoModel->getByEstabelecimentoId($estabelecimentoId);

        $CargoModel = new CargoModel();

        $dados = [
            'data' => $this->model->getById($id),
            'aCargos' => $CargoModel->lista("descricao"),
            'estabelecimento_id' => $estabelecimento['estabelecimento_id'],
        ];

        return $this->loadView("sistema/formVagas", $dados);
    }



    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();

        $hoje = new \DateTime('today');
        $dtInicio = new \DateTime($post['dtInicio']);
        $dtFim = new \DateTime($post['dtFim']);

        if ($dtFim <= $dtInicio) {
            Session::set('inputs', $post);
            return Redirect::page($this->controller . "/form/insert/0", [
                "toast" => ["tipo" => "error", "mensagem" => "A data final deve ser posterior à data de início"]
            ]);
        }

        if ($dtInicio <= $hoje && $dtFim >= $hoje) {
            $post['statusVaga'] = 2; // Seta statusVaga como ativa
        } else if ($dtInicio > $hoje && $dtFim > $hoje) {
            $post['statusVaga'] = 1; // Seta statusVaga como pendente
        } else {
            $post['statusVaga'] = 3; // Seta statusVaga como fechada
        }

        // Puxa o nome do cargo para preencher o campo descricao
        if (!empty($post['cargo_id'])) {
            $cargoModel = new CargoModel();
            $cargo = $cargoModel->getById($post['cargo_id']);

            if (!empty($cargo) && isset($cargo['descricao'])) {
                $post['descricao'] = $cargo['descricao'];
            }
        }

        if ($this->model->insert($post)) {
            return Redirect::page('perfil', [
                "toast" => ["tipo" => "success", "mensagem" => "Vaga cadastrada com sucesso"]
            ]);
        } else {
            Session::set('inputs', $post);
            return Redirect::page($this->controller . "/form/insert/0", [
                "toast" => ["tipo" => "error", "mensagem" => "Erro ao inserir vaga"]
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

        $hoje = new \DateTime('today');
        $dtInicio = new \DateTime($post['dtInicio']);
        $dtFim = new \DateTime($post['dtFim']);

        if ($dtFim <= $dtInicio) {
            Session::set('inputs', $post);
            return Redirect::page($this->controller . "/form/update/" . $post['vaga_id'], [
                "toast" => ["tipo" => "error", "mensagem" => "A data final deve ser posterior à data de início"]
            ]);
        }

        if ($dtInicio <= $hoje && $dtFim >= $hoje) {
            $post['statusVaga'] = 2; // Seta statusVaga como ativa
        } else if ($dtInicio > $hoje && $dtFim > $hoje) {
            $post['statusVaga'] = 1; // Seta statusVaga como pendente
        } else {
            $post['statusVaga'] = 3; // Seta statusVaga como fechada
        }

        // Puxa o nome do cargo para preencher o campo descricao
        if (!empty($post['cargo_id'])) {
            $cargoModel = new CargoModel();
            $cargo = $cargoModel->getById($post['cargo_id']);

            if (!empty($cargo) && isset($cargo['descricao'])) {
                $post['descricao'] = $cargo['descricao'];
            }
        }

        if ($this->model->update($post)) {
            return Redirect::page($this->controller . "/view/" . $post['vaga_id'], [
                "toast" => ["tipo" => "success", "mensagem" => "Vaga alterada com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller . "/form/update/" . $post['vaga_id']);
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
            return Redirect::page('perfil', [
                "toast" => ["tipo" => "success", "mensagem" => "Vaga excluída com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller);
        }
    }

    public function candidatar($vaga_id, $curriculum_id)
    {
        $CandidaturaModel = new CandidaturaModel();

        // Preenche os dados
        $data = [
            'vaga_id'        => $vaga_id,
            'curriculum_id'  => $curriculum_id,
            'dateCandidatura' => date('Y-m-d H:i:s')
        ];

        // Insere
        if ($CandidaturaModel->insert($data)) {
            return Redirect::page('vaga', [
                "toast" => ["tipo" => "success", "mensagem" => "Candidatura enviada com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller);
        }
    }

    public function filtrarVagas($pesquisa = null)
    {
        $post = $this->request->getPost();

        $pesquisa = $post['pesquisa'] ?? null;
        $filtros = [
            'vinculo'    => $post['vinculo'] ?? [],
            'modalidade' => $post['modalidade'] ?? []
        ];

        return $this->model->listaVagasFiltradas($pesquisa, $filtros);
    }
}
