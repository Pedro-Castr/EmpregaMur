<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Feed de Postagens</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .feed-container {
      max-width: 600px;
      margin: auto;
    }
    .post img.perfil {
      width: 50px;
      height: 50px;
      object-fit: cover;
    }
    .post .imagem-post {
      max-height: 400px;
      object-fit: cover;
    }
  </style>
</head>
<body class="bg-light">
  <div class="container my-4 feed-container">
    <!-- Postagem 1 -->
    <div class="card post mb-4 shadow-sm">
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle perfil me-3" alt="Perfil">
          <div>
            <h6 class="mb-0">João Silva</h6>
            <small class="text-muted">Postado em 18/06/2025 10:30</small>
          </div>
        </div>
        <p>Estou animado com as novas oportunidades! 🚀</p>
        <img src="https://picsum.photos/600/300?random=1" class="img-fluid rounded imagem-post mb-3" alt="Imagem do post">
        <div class="d-flex justify-content-around">
          <button class="btn btn-outline-primary btn-sm">👍 Curtir</button>
          <button class="btn btn-outline-danger btn-sm">❤️ Amei</button>
          <button class="btn btn-outline-warning btn-sm">😂 Haha</button>
          <button class="btn btn-outline-success btn-sm">⭐ Estrela</button>
        </div>
      </div>
    </div>

    <!-- Postagem 2 -->
    <div class="card post mb-4 shadow-sm">
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <img src="https://randomuser.me/api/portraits/women/65.jpg" class="rounded-circle perfil me-3" alt="Perfil">
          <div>
            <h6 class="mb-0">Mariana Torres</h6>
            <small class="text-muted">Postado em 17/06/2025 19:12</small>
          </div>
        </div>
        <p>Mais um projeto finalizado com sucesso! 💻✨</p>
        <img src="https://picsum.photos/600/300?random=2" class="img-fluid rounded imagem-post mb-3" alt="Imagem do post">
        <div class="d-flex justify-content-around">
          <button class="btn btn-outline-primary btn-sm">👍 Curtir</button>
          <button class="btn btn-outline-danger btn-sm">❤️ Amei</button>
          <button class="btn btn-outline-warning btn-sm">😂 Haha</button>
          <button class="btn btn-outline-success btn-sm">⭐ Estrela</button>
        </div>
      </div>
    </div>

    <!-- Postagem 3 -->
    <div class="card post mb-4 shadow-sm">
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <img src="https://randomuser.me/api/portraits/men/18.jpg" class="rounded-circle perfil me-3" alt="Perfil">
          <div>
            <h6 class="mb-0">Carlos Mendes</h6>
            <small class="text-muted">Postado em 16/06/2025 08:47</small>
          </div>
        </div>
        <p>Alguém tem dicas de cursos gratuitos online? Estou buscando me atualizar.</p>
        <img src="https://picsum.photos/600/300?random=3" class="img-fluid rounded imagem-post mb-3" alt="Imagem do post">
        <div class="d-flex justify-content-around">
          <button class="btn btn-outline-primary btn-sm">👍 Curtir</button>
          <button class="btn btn-outline-danger btn-sm">❤️ Amei</button>
          <button class="btn btn-outline-warning btn-sm">😂 Haha</button>
          <button class="btn btn-outline-success btn-sm">⭐ Estrela</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
