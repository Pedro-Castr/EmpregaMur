<?php

use Core\Library\Session;
use Core\Library\Request;

$pessoaFisicaId = Session::get('pessoa_fisica_id');
$request = new Request();
?>

<script src="<?= baseUrl(); ?>assets/js/mascaras.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    aplicarMascaraCEP(document.getElementById('cep'));
    aplicarMascaraCelular(document.getElementById('celular'));
  });
</script>

<div class="main-container container py-3">
  <?php if (in_array($this->request->getAction(), ['insert'])): ?>
    <h2 class="my-3 text-center">Cadastre seu Currículo</h2>
    <p class="text-muted text-center">Preencha as informações abaixo para criar seu currículo e aumentar suas chances de conquistar uma nova oportunidade profissional.</p>
  <?php else: ?>
    <h2 class="my-3 text-center">Atualize seu Currículo</h2>
  <?php endif; ?>

  <form method="POST" action="<?= $this->request->formAction() ?>" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">

    <?php if (in_array($this->request->getAction(), ['update'])): ?>
      <input type="hidden" name="curriculum_id" id="curriculum_id" value="<?= setValor("curriculum_id") ?>">
    <?php endif; ?>

    <input type="hidden" name="pessoa_fisica_id" value="<?= $pessoaFisicaId ?>">

    <div class="row">
      <div class="mb-3 col-12">
        <label for="foto" class="form-label">Foto de Perfil</label>
        <input type="file" class="form-control" id="foto" name="foto">
      </div>

      <?php if (!empty($dados['data']['curriculum_id'])): ?>
        <div class="mb-3 col-12">
          <h5>Imagem</h5>
          <img src="<?= baseUrl() . 'fotoPF.php?id=' . $dados['data']['curriculum_id'] ?>" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
        </div>
      <?php endif; ?>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= setValor("email") ?>">
        <?= setMsgFilderError("email") ?>
      </div>

      <div class="col-md-2 mb-3">
        <label for="celular" class="form-label">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" value="<?= setValor("celular") ?>">
        <?= setMsgFilderError("celular") ?>
      </div>

      <div class="col-md-2 mb-3">
        <label for="sexo" class="form-label">Sexo</label>
        <select class="form-select" id="sexo" name="sexo">
          <option value="">Selecione</option>
          <option value="M" <?= (setValor("sexo") == 'M' ? 'selected' : '') ?>>Masculino</option>
          <option value="F" <?= (setValor("sexo") == 'F' ? 'selected' : '') ?>>Feminino</option>
          <option value="O" <?= (setValor("sexo") == 'O' ? 'selected' : '') ?>>Outro</option>
        </select>
        <?= setMsgFilderError("sexo") ?>
      </div>

      <div class="col-md-2 mb-3">
        <label for="dataNascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?= setValor("dataNascimento") ?>">
        <?= setMsgFilderError("dataNascimento") ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="cidade_id" class="form-label">Cidade</label>
        <select class="form-select" id="cidade_id" name="cidade_id">
          <option value="">Selecione</option>
          <?php foreach ($dados['aCidades'] as $cidade): ?>
            <option value="<?= $cidade['cidade_id'] ?>" <?= ($cidade['cidade_id'] == setValor("cidade_id") ? 'selected' : '') ?>>
              <?= $cidade['cidade'] . '/' . $cidade['uf'] ?>
            </option>
          <?php endforeach; ?>
        </select>
        <?= setMsgFilderError("cidade_id") ?>
      </div>

      <div class="col-md-6 mb-3">
        <label for="cep" class="form-label">CEP</label>
        <input type="text" class="form-control" id="cep" name="cep" value="<?= setValor("cep") ?>">
        <?= setMsgFilderError("cep") ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-5 mb-3">
        <label for="logradouro" class="form-label">Logradouro</label>
        <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?= setValor("logradouro") ?>">
        <?= setMsgFilderError("logradouro") ?>
      </div>

      <div class="col-md-2 mb-3">
        <label for="numero" class="form-label">Número</label>
        <input type="text" class="form-control" id="numero" name="numero" value="<?= setValor("numero") ?>">
        <?= setMsgFilderError("numero") ?>
      </div>

      <div class="col-md-5 mb-3">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="bairro" name="bairro" value="<?= setValor("bairro") ?>">
        <?= setMsgFilderError("bairro") ?>
      </div>
    </div>

    <div class="mb-3">
      <label for="complemento" class="form-label">Complemento</label>
      <input type="text" class="form-control" id="complemento" name="complemento" value="<?= setValor("complemento") ?>">
      <?= setMsgFilderError("complemento") ?>
    </div>

    <div class="mb-3">
      <label for="apresentacaoPessoal" class="form-label">Apresentação Pessoal</label>
      <textarea class="form-control" id="apresentacaoPessoal" name="apresentacaoPessoal" rows="4" placeholder="Fale um pouco sobre você..."><?= setValor("apresentacaoPessoal") ?></textarea>
      <?= setMsgFilderError("apresentacaoPessoal") ?>
    </div>

    <a href="<?= baseUrl() . 'Perfil' ?>" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-success">Enviar</button>

  </form>
</div>