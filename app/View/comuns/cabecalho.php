<?php
  use Core\Library\Session;

  if (!empty($_SESSION['toast'])): ?>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const toast = <?= json_encode($_SESSION['toast']) ?>;
        showToast(toast.mensagem, toast.tipo);
      });
    </script>
    <?php Session::destroy('toast'); ?>
  <?php endif;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EmpregaMur</title>
  <link href="<?= baseUrl() ?>assets/img/logo5.png" rel="icon" type="image/png">
  <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Toastify -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
  <!-- Toastify -->
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="<?= baseUrl(); ?>assets/js/toastify.js"></script>
  <?= exibeAlerta() ?>

  <header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="<?= baseUrl() ?>">
      <img src="<?= baseUrl() ?>assets/img/logo6.png" alt="Logo" height="100vh" class="me-2">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="<?= baseUrl()?>">🏠 Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= baseUrl() ?>Emprego">💼 Empregos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">🔔 Notificações</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= baseUrl() ?>Perfil">👤 Perfil</a>
        </li>
      </ul>
    </div>
    <?php if (!Session::get("userId")): ?>
      <a href="<?= baseUrl() ?>Login" class="btn btn-primary ms-2">Faça login</a>
    <?php endif; ?>
  </div>
</header>

  <!-- Bootstrap JS (com Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
