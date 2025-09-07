<?php

use Core\Library\Request;

$request = new Request();
?>

<div class="main-container container py-3">
  <h2 class="my-3 text-center">Atualize seu Perfil</h2>
  <p class="text-muted text-center">Preencha as informações abaixo para que sua empresa chame atenção de possíveis funcionários.</p>

  <form method="POST" action="<?= $this->request->formAction() ?>" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">

    <input type="hidden" name="estabelecimento_id" id="estabelecimento_id" value="<?= setValor("estabelecimento_id") ?>">

    <div class="row">
      <div class="mb-3 col-12">
        <label for="foto" class="form-label">Foto de Perfil</label>
        <input type="file" class="form-control" id="foto" name="foto">
      </div>

      <?php if (!empty($dados['data']['estabelecimento_id'])): ?>
        <div class="mb-3 col-12">
          <h5>Imagem</h5>
          <img src="<?= baseUrl() . 'fotoPJ.php?id=' . $dados['data']['estabelecimento_id'] ?>" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
        </div>
      <?php endif; ?>
    </div>

    <div class="row">
      <div class="col-md-8 mb-3">
        <label for="email" class="form-label">Nome da Empresa</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= setValor("nome") ?>">
        <?= setMsgFilderError("nome") ?>
      </div>

      <div class="col-md-2 mb-3">
        <label for="latitude" class="form-label">Latitude</label>
        <input type="text" class="form-control" id="latitude" name="latitude" value="<?= setValor("latitude") ?>">
        <?= setMsgFilderError("latitude") ?>
      </div>

      <div class="col-md-2 mb-3">
        <label for="longitude" class="form-label">Longitude</label>
        <input type="text" class="form-control" id="longitude" name="longitude" value="<?= setValor("longitude") ?>">
        <?= setMsgFilderError("longitude") ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= setValor("email") ?>">
        <?= setMsgFilderError("email") ?>
      </div>

      <div class="col-md-8 mb-3">
        <label for="endereco" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="endereco" name="endereco" value="<?= setValor("endereco") ?>">
        <?= setMsgFilderError("endereco") ?>
      </div>
    </div>

    <a href="<?= baseUrl() . 'Perfil' ?>" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-success">Enviar</button>

  </form>
</div>