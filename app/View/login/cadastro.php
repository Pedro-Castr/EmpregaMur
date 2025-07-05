<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Toastify -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
    <!-- Toastify -->
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="<?= baseUrl(); ?>assets/js/toastify.js"></script>

  <div class="cadastro-wrapper">
    <div class="cadastro-box">
      <h3 class="mb-4 text-center">Cadastro</h3>
      <div class="col-12 mb-3">
          <?= exibeAlerta() ?>
      </div>
      <ul class="nav nav-tabs mb-3" id="cadastroTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pf-tab" data-bs-toggle="tab" data-bs-target="#pf-pane" type="button" role="tab" aria-controls="pf-pane" aria-selected="true">
            Pessoa Física
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pj-tab" data-bs-toggle="tab" data-bs-target="#pj-pane" type="button" role="tab" aria-controls="pj-pane" aria-selected="false">
            Empresa
          </button>
        </li>
      </ul>
      <div class="tab-content" id="cadastroTabsContent">
        <!-- Pessoa Física (PF) -->
        <div class="tab-pane fade show active" id="pf-pane" role="tabpanel" aria-labelledby="pf-tab">
          <form action="/cadastro/signUpPf" method="POST" novalidate>
            <div class="mb-3">
              <label for="nome-pf" class="form-label">Nome Completo</label>
              <input type="text" class="form-control" id="nome-pf" name="nome" required />
            </div>
            <div class="mb-3">
              <label for="email-pf" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email-pf" name="email" required />
            </div>
            <div class="mb-3">
              <label for="email-pf" class="form-label">CPF</label>
              <input type="text" class="form-control" id="cpf" name="cpf" required />
            </div>
            <div class="mb-3">
              <label for="senha-pf" class="form-label">Senha</label>
              <input type="password" class="form-control" id="senha-pf" name="senha" required />
            </div>
            <div class="mb-3">
              <label for="confirma-senha-pf" class="form-label">Confirmar Senha</label>
              <input type="password" class="form-control" id="confirma-senha-pf" name="confirmar_senha" required />
            </div>
            <button type="submit" class="btn btn-success w-100">Cadastrar</button>
            <div class="text-center mt-3">
              <small>Já tem uma conta? <a href="<?= baseUrl() ?>login">Faça login</a></small>
            </div>
          </form>
        </div>

        <!-- Empresa (PJ) -->
        <div class="tab-pane fade" id="pj-pane" role="tabpanel" aria-labelledby="pj-tab">
          <form action="/cadastro/signUpPj" method="POST" novalidate>
            <div class="mb-3">
              <label for="nome-pj" class="form-label">Nome da Empresa</label>
              <input type="text" class="form-control" id="nome-pj" name="nome_empresa" required />
            </div>
            <div class="mb-3">
              <label for="email-pj" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email-pj" name="email" required />
            </div>
            <div class="mb-3 row">
              <div class="col-6">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" required />
              </div>
              <div class="col-6">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" required />
              </div>
            </div>
            <div class="mb-3">
              <label for="senha-pj" class="form-label">Senha</label>
              <input type="password" class="form-control" id="senha-pj" name="senha" required />
            </div>
            <div class="mb-3">
              <label for="confirma-senha-pj" class="form-label">Confirmar Senha</label>
              <input type="password" class="form-control" id="confirma-senha-pj" name="confirmar_senha" required />
            </div>
            <button type="submit" class="btn btn-success w-100">Cadastrar</button>
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
