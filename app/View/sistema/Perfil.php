<?php
use Core\Library\Session;

// Redireciona se o usuário não estiver logado
if (!Session::get("userId")) {
    header("Location: " . baseUrl() . "login");
    exit;
}

$nome  = Session::get("userNome");
$email = Session::get("userEmail");
$tipo  = Session::get("userTipo");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Meu Perfil - EmpregaMur</title>
  <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="card shadow p-4">
      <h2 class="mb-3">👤 Meu Perfil</h2>
      <p><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></p>
      <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
      <p><strong>Tipo de Usuário:</strong> <?= htmlspecialchars($tipo) ?></p>

      <a href="<?= baseUrl() ?>Login/signOut" class="btn btn-danger mt-3">🚪 Sair</a>
    </div>
  </div>
</body>
</html>
