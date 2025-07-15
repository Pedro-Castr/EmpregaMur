<div class="container py-3">
  <h2 class="my-3 text-center">Cadastre seu Currículo</h2>
  <p class="text-muted mx-3">Preencha as informações abaixo para criar seu currículo e aumentar suas chances de conquistar uma nova oportunidade profissional.</p>

  <form method="POST" action="<?= $this->request->formAction() ?>" class="bg-white p-4 rounded shadow-sm" novalidate>

    <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">

    <div class="row">
      <div class="col-md-8 mb-3">
        <label for="nome" class="form-label">Nome completo</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= setValor("nome") ?>">
        <?= setMsgFilderError("nome") ?>
      </div>

      <div class="col-md-4 mb-3">
        <label for="dataNascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" value="<?= setValor("dataNascimento") ?>">
        <?= setMsgFilderError("dataNascimento") ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="celular" class="form-label">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" placeholder="(99) 99999-9999" value="<?= setValor("celular") ?>">
        <?= setMsgFilderError("celular") ?>
      </div>

      <div class="col-md-6 mb-3">
        <label for="sexo" class="form-label">Sexo</label>
        <select class="form-select" id="sexo" name="sexo">
          <option value="">Selecione</option>
          <option value="M" <?= (setValor("sexo") == 'M' ? 'selected' : '') ?>>Masculino</option>
          <option value="F" <?= (setValor("sexo") == 'F' ? 'selected' : '') ?>>Feminino</option>
          <option value="O" <?= (setValor("sexo") == 'O' ? 'selected' : '') ?>>Outro</option>
        </select>
        <?= setMsgFilderError("sexo") ?>
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
        <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000" maxlength="9" value="<?= setValor("cep") ?>">
        <?= setMsgFilderError("cep") ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-5 mb-3">
        <label for="logradouro" class="form-label">Logradouro</label>
        <input type="text" class="form-control" id="logradouro" name="logradouro" maxlength="80" value="<?= setValor("logradouro") ?>">
        <?= setMsgFilderError("logradouro") ?>
      </div>

      <div class="col-md-2 mb-3">
        <label for="numero" class="form-label">Número</label>
        <input type="text" class="form-control" id="numero" name="numero" maxlength="10" value="<?= setValor("numero") ?>">
        <?= setMsgFilderError("numero") ?>
      </div>

      <div class="col-md-5 mb-3">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="bairro" name="bairro" maxlength="50" value="<?= setValor("bairro") ?>">
        <?= setMsgFilderError("bairro") ?>
      </div>
    </div>

    <div class="mb-3">
      <label for="complemento" class="form-label">Complemento</label>
      <input type="text" class="form-control" id="complemento" name="complemento" maxlength="50" value="<?= setValor("complemento") ?>">
      <?= setMsgFilderError("complemento") ?>
    </div>

    <div class="mb-3">
      <label for="apresentacaoPessoal" class="form-label">Apresentação Pessoal</label>
      <textarea class="form-control" id="apresentacaoPessoal" name="apresentacaoPessoal" rows="4" maxlength="1000" placeholder="Fale um pouco sobre você..."><?= setValor("apresentacaoPessoal") ?></textarea>
      <?= setMsgFilderError("apresentacaoPessoal") ?>
    </div>

    <?= formButton() ?>

  </form>
</div>
