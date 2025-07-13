<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recuperar Senha</title>
  <link rel="stylesheet" href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css">
  <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Toastify -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="<?= baseUrl() ?>assets/js/toastify.js"></script>
  <style>
    .recuperar-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem 1rem;
    }

    .recuperar-box {
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
  <div class="recuperar-wrapper">
    <div class="recuperar-box">
      <h3 class="mb-4 text-center">🔒 Esqueci minha senha</h3>

      <div class="col-12 mb-3">
        <?= exibeAlerta() ?>
      </div>

      <form action="<?= baseUrl() ?>login/esqueciASenhaEnvio" method="POST" novalidate>
        <div class="mb-3">
          <label for="email" class="form-label">Informe seu e-mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@email.com" value="<?= setValor('email') ?>" required>
          <?= setMsgFilderError('email') ?>
        </div>
        <button type="submit" class="btn btn-primary w-100">Enviar link de recuperação</button>

        <div class="text-center mt-3">
          <small><a href="<?= baseUrl() ?>login">Voltar para o login</a></small>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
