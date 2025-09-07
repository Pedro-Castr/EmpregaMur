<?php

use Core\Library\Session;
use Core\Library\Request;

$request = new Request();
$usuarioId = Session::get('userId');
?>

<div class="main-container container py-3">
  <?php if (in_array($this->request->getAction(), ['insert'])): ?>
    <h2 class="my-3 text-center">Tem algo bacana para compartilhar?</h2>
    <p class="text-muted text-center">Publique aqui e deixe que sua mensagem chegue às pessoas certas.</p>
  <?php endif; ?>

  <form method="POST" action="<?= $this->request->formAction() ?>" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">

    <?php if (in_array($this->request->getAction(), ['update'])): ?>
      <input type="hidden" name="postagem_id" id="postagem_id" value="<?= setValor("postagem_id") ?>">
    <?php endif; ?>

    <input type="hidden" name="usuario_id" value="<?= $usuarioId ?>">

    <div class="row">
      <div class="mb-3 col-12">
        <label for="imagem" class="form-label">Imagem</label>
        <input type="file" class="form-control" id="imagem" name="imagem">
      </div>

      <?php if (!empty($dados['imagem'])): ?>
        <div class="mb-3 col-12">
          <h5>Imagem</h5>
          <img src="<?= baseUrl() . 'post.php?id=' . $dados['postagem_id'] ?>" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
        </div>
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <label for="apresentacaoPessoal" class="form-label">Comentário</label>
      <textarea class="form-control" id="comentario" name="comentario" rows="4" placeholder="O que deseja compartilhar hoje?"><?= setValor("comentario") ?></textarea>
      <?= setMsgFilderError("comentario") ?>
    </div>

    <a href="<?= baseUrl() . 'Home' ?>" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-success">Enviar</button>

  </form>
</div>