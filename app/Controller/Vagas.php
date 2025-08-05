<?php

namespace App\Controller;

use App\Model\CargoModel;
use App\Model\EstabelecimentoModel;
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
        return $this->loadView("sistema/Vagas", $this->model->lista("descricao"));
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

    // início não pode ser antes de hoje
    if ($dtInicio < $hoje) {
        Session::set('inputs', $post);
        return Redirect::page($this->controller . "/form/insert/0", [
            "toast" => ["tipo" => "error", "mensagem" => "A data de início deve ser uma data futura"]
        ]);
    }

    // fim não pode ser antes do início
    if ($dtFim <= $dtInicio) {
        Session::set('inputs', $post);
        return Redirect::page($this->controller . "/form/insert/0", [
            "toast" => ["tipo" => "error", "mensagem" => "A data de fim deve ser posterior à data de início"]
        ]);
    }

    // Puxa o nome do cargo para preencher o campo descricao
    if (!empty($post['cargo_id'])) {
        $cargoModel = new CargoModel();
        $cargo = $cargoModel->getById($post['cargo_id']);

        if (!empty($cargo) && isset($cargo['descricao'])) {
            $post['descricao'] = $cargo['descricao'];
        }
    }

    // Seta statusVaga como pendente
    $post['statusVaga'] = 1;
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

        if ($this->model->update($post)) {
            return Redirect::page($this->controller, [
                "toast" => ["tipo" => "success", "mensagem" => "Registro alterado com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller . "/form/update/" . $post['id']);
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
            return Redirect::page($this->controller, [
                "toast" => ["tipo" => "success", "mensagem" => "Registro excluído com sucesso"]
            ]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}
