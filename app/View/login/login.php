<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<style style>
    .form-container {
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
      width: 100%;
      max-width: 400px;
    }
    .nav-tabs .nav-link.active {
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <ul class="nav nav-tabs mb-3" id="formTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Login</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Cadastro</button>
      </li>
    </ul>

    <div class="tab-content" id="formTabsContent">
      <!-- Login -->
      <div class="tab-pane fade show active" id="login" role="tabpanel">
        <form action="login/signIn" method="POST">
          <div class="row">
            <div class="mb-3 col-12">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control border-dark" id="email" name="email" value="<?= setValor("email") ?>" required>
            </div>
            <div class="mb-3 col-12">
              <label for="senha" class="form-label">Senha</label>
              <input type="password" class="form-control border-dark" id="senha" name="senha" required>
            </div>
            <div class="col-12 d-flex justify-content-between mt-3 mb-2">
              <h6><a href="<?= baseUrl() ?>Login/esqueciASenha" class="text-decoration-none">Esqueci minha senha!</a></h6>
            </div>
            <div class="col-12 mb-3">
              <?= exibeAlerta() ?>
            </div>
            <div class="mb-3 col-12 d-flex justify-content-between">
              <div class="col-sm-6 col-lg-4">
                <button class="btn btn-primary">Entrar</button>
              </div>
            </div>
          </div>
        </form>
      </div>

      <!-- Cadastro -->
      <div class="tab-pane fade" id="register" role="tabpanel">
        <form action="<?= baseUrl() ?>Usuario/registraUsuario" method="POST">
          <div class="mb-3 col-12">
            <label for="email" class="form-label">Nome completo</label>
            <input type="text" class="form-control border-dark" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="register-email" class="form-label">CPF</label>
            <input type="email" class="form-control border-dark" id="register-cpf" name="cpf" required>
          </div>
          <div class="mb-3">
            <label for="register-email" class="form-label">E-mail</label>
            <input type="email" class="form-control border-dark" id="register-email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="register-senha" class="form-label">Senha</label>
            <input type="password" class="form-control border-dark" id="register-senha" name="senha" required>
          </div>
          <div class="mb-3">
            <label for="register-senha" class="form-label">Confirme sua senha</label>
            <input type="password" class="form-control border-dark" id="register-confirma-senha" name="confirma-senha" required>
          </div>
          <button type="submit" class="btn btn-success w-100">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
