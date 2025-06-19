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

  <div class="container py-5">
    <h1 class="mb-4 text-center">Vagas de Emprego</h1>
    <p class="text-center text-muted mb-4">Encontre oportunidades que combinam com o seu perfil profissional</p>
    <div class="row g-4">
      <!-- Card de Vaga -->
      <div class="col-md-6 col-lg-4">
        <div class="card vaga-card h-100">
          <div class="card-body">
            <h5 class="card-title">Auxiliar Administrativo</h5>
            <p class="card-text text-muted small">Empresa XYZ Ltda</p>
            <p class="card-text">Atendimento ao público, organização de documentos e auxílio nas rotinas administrativas.</p>
            <span class="badge bg-primary me-2">Presencial</span>
            <span class="badge bg-success">CLT</span>
          </div>
          <div class="card-footer bg-transparent text-end">
            <a href="#" class="btn btn-sm btn-outline-primary">Ver detalhes</a>
          </div>
        </div>
      </div>

      <!-- Outro Card de Vaga -->
      <div class="col-md-6 col-lg-4">
        <div class="card vaga-card h-100">
          <div class="card-body">
            <h5 class="card-title">Desenvolvedor Front-End</h5>
            <p class="card-text text-muted small">TechSoft Solutions</p>
            <p class="card-text">Desenvolvimento de interfaces responsivas com foco em experiência do usuário.</p>
            <span class="badge bg-secondary me-2">Remoto</span>
            <span class="badge bg-warning text-dark">PJ</span>
          </div>
          <div class="card-footer bg-transparent text-end">
            <a href="#" class="btn btn-sm btn-outline-primary">Ver detalhes</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
