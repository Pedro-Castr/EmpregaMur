<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Toastify -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <style>
    .login-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem 1rem;
    }

    .login-box {
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
      width: 100%;
      max-width: 400px;
    }
  </style>
</head>
<body>
  <!-- Toastify -->
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="<?= baseUrl(); ?>assets/js/toastify.js"></script>

  <div class="login-wrapper">
    <div class="login-box">
      <h3 class="text-center mb-4">Acesse sua conta</h3>
      <div class="col-12 mb-3">
          <?= exibeAlerta() ?>
      </div>
      <form action="login/signIn" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-1">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <div class="text-end mb-3">
          <a href="<?= baseUrl() ?>Login/esqueciASenha" class="link-secondary" style="font-size: 0.9rem;">Esqueci minha senha</a>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
      </form>
      <div class="text-center mt-3">
        <small>Não tem uma conta? <a href="<?= baseUrl() ?>cadastro">Cadastre-se</a></small>
      </div>
    </div>
  </div>
</body>
</html>
