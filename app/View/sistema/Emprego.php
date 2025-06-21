<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Vagas de Emprego</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php if (count($dados) > 0): ?>
  <div class="container py-5">
    <h1 class="mb-4 text-center">Vagas de Emprego</h1>
    <p class="text-center text-muted mb-4">Encontre oportunidades que combinam com o seu perfil profissional</p>

    <div class="row g-4">
      <!-- Card de Vaga -->
      <?php foreach ($dados as $value): ?>
        <div class="col-md-6 col-lg-4">
          <div class="card vaga-card h-100">
            <div class="card-body">
              <h5 class="card-title"><?= $value['descricao'] ?></h5>
              <p class="card-text text-muted small">Empresa XYZ Ltda</p>
              <p class="card-text"><?= $value['sobreaVaga'] ?></p>
              <span class="badge bg-primary me-2">Presencial</span>
              <span class="badge bg-success">CLT</span>
            </div>
            <div class="card-footer bg-transparent text-end">
              <a href="#" class="btn btn-sm btn-outline-success">Candidatar a Vaga</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <?php else: ?>
        <div class="container py-5">
          <div class="text-center p-5 border rounded bg-light">
            <h3 class="mt-3">Nenhuma vaga disponível no momento</h3>
            <p class="text-muted">Estamos atualizando nossas oportunidades. Volte em breve para conferir novas vagas.</p>
            <a href="<?= baseUrl() ?>" class="btn btn-primary mt-3">
              <i class="bi bi-arrow-left"></i> Voltar à página inicial
            </a>
          </div>
        </div>
    <?php endif; ?>
    </div>
  </div>
</body>
</html>
