<div class="container my-4 feed-container">
  <?php foreach ($dados['postagem'] as $value): ?>
    <div class="card post mb-4 shadow-sm">
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <!-- Foto de perfil -->
          <div class="text-center">
            <?php if (!empty($value['foto_perfil'])): ?>
              <?php if (!empty($value['pessoa_fisica_id'])): ?>
                <img src="<?= baseUrl() . 'fotoPF.php?id=' . $value['curriculum_id'] ?>" class="rounded-circle perfil me-3">
              <?php else: ?>
                <img src="<?= baseUrl() . 'fotoPJ.php?id=' . $value['estabelecimento_id'] ?>" class="rounded-circle perfil me-3">
              <?php endif; ?>
            <?php else: ?>
              <img src="<?= baseUrl() ?>assets/img/default-profile.png" class="rounded-circle perfil me-3">
            <?php endif; ?>
          </div>

          <!-- Nome e data da postagem -->
          <div>
            <h6 class="mb-0"><?= $value['nome'] ?></h6>
            <small class="text-muted">Postado em <?= date('d/m/Y H:i', strtotime($value['data_criacao'])) ?></small>
          </div>
        </div>

        <!-- Imagem da postagem -->
        <?php if (!empty($value['imagem'])): ?>
          <img src="<?= baseUrl() . 'post.php?id=' . $value['postagem_id'] ?>" class="img-fluid rounded imagem-post mb-3">
        <?php endif; ?>

        <!-- Comentário da postagem -->
        <p><?= $value['comentario'] ?></p>

      </div>
    </div>
  <?php endforeach; ?>
</div>

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
    width: 100%;
    height: 350px;
    object-fit: cover;
    border-radius: 8px;
    display: block;
    margin: 0 auto 1rem auto;
  }
</style>