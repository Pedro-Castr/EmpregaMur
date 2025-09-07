<?php

use Core\Library\Session;

if (!empty($_SESSION['toast'])): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const toast = <?= json_encode($_SESSION['toast']) ?>;
      showToast(toast.mensagem, toast.tipo);
    });
  </script>
  <?php Session::destroy('toast'); ?>
<?php endif;
?>

<script>
  const baseUrl = "<?= baseUrl() ?>";
</script>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EmpregaMur</title>
  <link href="<?= baseUrl() ?>assets/img/logo5.png" rel="icon" type="image/png">
  <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert -->
  <script type="text/javascript" src="<?= baseUrl(); ?>assets/js/sweetAlert.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Toastify -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

<body>
  <!-- Toastify -->
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="<?= baseUrl(); ?>assets/js/toastify.js"></script>

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
            <a class="nav-link active" href="<?= baseUrl() ?>">🏠 Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= baseUrl() ?>Vagas">💼 Vagas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= baseUrl() ?>Perfil">👤 Perfil</a>
          </li>
        </ul>
        <?php if (!Session::get("userId")): ?>
          <a href="<?= baseUrl() ?>Cadastro" class="btn btn-success ms-2">Cadastre-se</a>
        <?php endif; ?>
        <?php if (Session::get("userId")): ?>
          <a href="<?= baseUrl() ?>Postagem/form/insert" class="btn btn-primary ms-2">Nova publicação</a>
        <?php endif; ?>
      </div>
    </div>
  </header>