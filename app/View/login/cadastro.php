<?php
use Core\Library\Session;
$formTipo = Session::getDestroy("formTipo");
if (!in_array($formTipo, ['PF', 'PJ'])) {
  $formTipo = 'PF';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="<?= baseUrl(); ?>assets/js/usuario.js"></script>
  <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <style>
  .cadastro-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem 1rem;
  }

  .cadastro-box {
    background: white;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
    width: 100%;
    max-width: 500px;
  }
</style>
</head>
<body>
  <div class="cadastro-wrapper">
    <div class="cadastro-box">
      <h3 class="mb-4 text-center">Cadastro</h3>
      <ul class="nav nav-tabs mb-3" id="cadastroTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link <?= $formTipo == 'PF' ? 'active' : '' ?>" id="pf-tab" data-bs-toggle="tab" data-bs-target="#pf-pane"
          type="button" role="tab" aria-controls="pf-pane" aria-selected="true"
          >
            Pessoa Física
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link <?= $formTipo == 'PJ' ? 'active' : '' ?>" id="pj-tab" data-bs-toggle="tab" data-bs-target="#pj-pane"
          type="button" role="tab" aria-controls="pj-pane" aria-selected="false"
          >
            Empresa
          </button>
        </li>
      </ul>
      <div class="tab-content" id="cadastroTabsContent">
        <!-- Pessoa Física (PF) -->
        <div class="tab-pane fade <?= $formTipo == 'PF' ? 'show active' : '' ?>" id="pf-pane" role="tabpanel" aria-labelledby="pf-tab">
          <form action="/cadastro/signUpPf" method="POST" novalidate>
            <div class="mb-3">
              <label for="nome-pf" class="form-label">Nome Completo</label>
              <input type="text" class="form-control" id="nome-pf" name="nome_pf" value="<?= setValor('nome_pf') ?>" />
              <?= setMsgFilderError('nome_pf') ?>
            </div>
            <div class="mb-3">
              <label for="email-pf" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email-pf" name="email_pf" value="<?= setValor('email_pf') ?>" />
              <?= setMsgFilderError('email_pf') ?>
            </div>
            <div class="mb-3">
              <label for="email-pf" class="form-label">CPF</label>
              <input type="text" class="form-control" id="cpf" name="cpf" value="<?= setValor('cpf') ?>" />
              <?= setMsgFilderError('cpf') ?>
            </div>
            <div class="mb-3">
              <label for="senha-pf" class="form-label">Senha</label>
              <input type="password" class="form-control" id="senha-pf" name="senha_pf"
              onkeyup="checa_segur_senha('senha-pf', 'confirma-senha-pf', 'msgSenha', 'msgConfSenha', 'btnCadastrarPf');" />
              <small id="msgSenha" class="mt-3"></small>
            </div>
            <div class="mb-3">
              <label for="confirma-senha-pf" class="form-label">Confirmar Senha</label>
              <input type="password" class="form-control" id="confirma-senha-pf" name="confirmar_senha_pf"
              onkeyup="checa_segur_senha('senha-pf', 'confirma-senha-pf', 'msgSenha', 'msgConfSenha', 'btnCadastrarPf');" />
              <small id="msgConfSenha" class="mt-3"></small>
            </div>
            <button type="submit" id="btnCadastrarPf" class="btn btn-success w-100" disabled>Cadastrar</button>
            <div class="text-center mt-3">
              <small>Já tem uma conta? <a href="<?= baseUrl() ?>login">Faça login</a></small>
            </div>
          </form>
        </div>

        <!-- Empresa (PJ) -->
        <div class="tab-pane fade <?= $formTipo == 'PJ' ? 'show active' : '' ?>" id="pj-pane" role="tabpanel" aria-labelledby="pj-tab">
          <form action="/cadastro/signUpPj" method="POST" novalidate>
            <div class="mb-3">
              <label for="nome-pj" class="form-label">Nome da Empresa</label>
              <input type="text" class="form-control" id="nome-pj" name="nome_pj" value="<?= setValor('nome_pj') ?>" />
              <?= setMsgFilderError('nome_pj') ?>
            </div>
            <div class="mb-3">
              <label for="email-pj" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email-pj" name="email_pj" value="<?= setValor('email_pj') ?>" />
              <?= setMsgFilderError('email_pj') ?>
            </div>
            <div class="mb-3 row">
              <div class="col-6">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" value="<?= setValor('latitude') ?>" />
                <?= setMsgFilderError('latitude') ?>
              </div>
              <div class="col-6">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" value="<?= setValor('longitude') ?>" />
                <?= setMsgFilderError('longitude') ?>
              </div>
            </div>
            <div class="mb-3">
              <label for="senha-pj" class="form-label">Senha</label>
              <input type="password" class="form-control" id="senha-pj" name="senha_pj"
              onkeyup="checa_segur_senha('senha-pj', 'confirma-senha-pj', 'msgSenha', 'msgConfSenha', 'btnCadastrarPj');" />
              <small id="msgSenha" class="mt-3"></small>
            </div>
            <div class="mb-3">
              <label for="confirma-senha-pj" class="form-label">Confirmar Senha</label>
              <input type="password" class="form-control" id="confirma-senha-pj" name="confirmar_senha_pj"
              onkeyup="checa_segur_senha('senha-pj', 'confirma-senha-pj', 'msgSenha', 'msgConfSenha', 'btnCadastrarPj');" />
              <small id="msgConfSenha" class="mt-3"></small>
            </div>
            <button type="submit" id="btnCadastrarPj" class="btn btn-success w-100" disabled>Cadastrar</button>
            <div class="text-center mt-3">
              <small>Já tem uma conta? <a href="<?= baseUrl() ?>login">Faça login</a></small>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
