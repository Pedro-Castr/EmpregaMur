<?php
  use Core\Library\Request;
  $request = new Request();
?>

<div class="container py-3">
  <?php if (in_array($this->request->getAction(), ['insert'])): ?>
    <h2 class="my-3 text-center">Cadastre uma Vaga de Emprego</h2>
    <p class="text-muted text-center">Informe os detalhes da vaga para atrair candidatos qualificados e encontrar o profissional ideal para sua empresa.</p>
  <?php else: ?>
    <h2 class="my-3 text-center">Atualize sua Vaga de Emprego</h2>
  <?php endif; ?>

  <form method="POST" action="<?= $this->request->formAction() ?>" class="bg-white p-4 rounded shadow-sm">

    <?php if (in_array($this->request->getAction(), ['update'])): ?>
      <input type="hidden" name="vaga_id" id="vaga_id" value="<?= setValor("vaga_id") ?>">
    <?php endif; ?>

    <input type="hidden" name="estabelecimento_id" value="<?= $dados['estabelecimento_id'] ?>">

    <div class="row">
      <div class="col-md-8 mb-3">
        <label for="cargo_id" class="form-label">Cargo</label>
        <select class="form-select" id="escolaridade_id" name="cargo_id">
          <option value="">Selecione</option>
          <?php foreach ($dados['aCargos'] as $cargos): ?>
            <option value="<?= $cargos['cargo_id'] ?>" <?= ($cargos['cargo_id'] == setValor("cargo_id") ? 'selected' : '') ?>>
              <?= $cargos['descricao'] ?>
            </option>
          <?php endforeach; ?>
        </select>
        <?= setMsgFilderError("cargo_id") ?>
      </div>

      <div class="col-md-2 mb-3">
        <label for="dtInicio" class="form-label">Data de início</label>
        <input type="date" class="form-control" id="dtInicio" name="dtInicio" value="<?= setValor("dtInicio") ?>">
        <?= setMsgFilderError("dtInicio") ?>
      </div>

      <div class="col-md-2 mb-3">
        <label for="dtFim" class="form-label">Data Final</label>
        <input type="date" class="form-control" id="dtFim" name="dtFim" value="<?= setValor("dtFim") ?>">
        <?= setMsgFilderError("dtFim") ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="modalidade" class="form-label">Modalidade</label>
        <select class="form-select" id="modalidade" name="modalidade">
          <option value="">Selecione</option>
          <option value="1" <?= (setValor("modalidade") == '1' ? 'selected' : '') ?>>Presencial</option>
          <option value="2" <?= (setValor("modalidade") == '2' ? 'selected' : '') ?>>Semipresencial</option>
          <option value="3" <?= (setValor("modalidade") == '3' ? 'selected' : '') ?>>Remoto</option>
        </select>
        <?= setMsgFilderError("modalidade") ?>
      </div>

      <div class="col-md-6 mb-3">
        <label for="vinculo" class="form-label">Vínculo</label>
        <select class="form-select" id="vinculo" name="vinculo">
          <option value="">Selecione</option>
          <option value="1" <?= (setValor("vinculo") == '1' ? 'selected' : '') ?>>CLT</option>
          <option value="2" <?= (setValor("vinculo") == '2' ? 'selected' : '') ?>>PJ</option>
          <option value="3" <?= (setValor("vinculo") == '3' ? 'selected' : '') ?>>Estágio</option>
        </select>
        <?= setMsgFilderError("vinculo") ?>
      </div>
    </div>

    <div class="mb-3">
      <label for="sobreaVaga" class="form-label">Sobre a vaga</label>
      <textarea class="form-control" id="sobreaVaga" name="sobreaVaga" rows="4"
      placeholder="Descreva os detalhes da vaga, como atividades a serem realizadas, perfil desejado e diferenciais do cargo."><?= setValor("sobreaVaga") ?></textarea>
      <?= setMsgFilderError("sobreaVaga") ?>
    </div>

    <a href="<?= baseUrl() ?>Vagas/view/<?= $dados['data']['vaga_id'] ?>" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-success">Enviar</button>

  </form>
</div>
