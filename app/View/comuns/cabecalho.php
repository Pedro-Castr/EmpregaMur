<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EmpregaMur</title>
  <link href="<?= baseUrl() ?>assets/img/AtomPHP-icone.png" rel="icon" type="image/png">
  <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="d-flex align-items-center" href="#">
        <img src="<?= baseUrl() ?>assets/img/logo6.png" alt="Logo" height="100vh" class="me-2 rounded-circle">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="#">🏠 Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">💼 Empregos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">🔔 Notificações</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">👤 Perfil</a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <!-- Bootstrap JS (com Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

