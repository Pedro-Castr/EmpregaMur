<?php
  use Core\Library\Request;
  $request = new Request();

  $checked = '';
  if (in_array($this->request->getAction(), ['update']) && empty(setValor('fimMes')) && empty(setValor('fimAno'))) {
      $checked = 'checked';
  }
?>

<div class="container py-3">
  <h2 class="my-3 text-center">Cadastre suas Experiências</h2>
  <p class="text-muted text-center">Compartilhe sua trajetória profissional e mostre às empresas onde você já atuou, suas conquistas e como pode contribuir com novos desafios.</p>

  <form method="POST" action="<?= $this->request->formAction() ?>" class="bg-white p-4 rounded shadow-sm">

    <?php if (in_array($this->request->getAction(), ['update'])): ?>
      <input type="hidden" name="curriculum_experiencia_id" id="curriculum_experiencia_id" value="<?= setValor("curriculum_experiencia_id") ?>">
    <?php endif; ?>

    <input type="hidden" name="curriculum_id" value="<?= $dados['curriculum_id'] ?>">

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="estabelecimento" class="form-label">Estabelecimento</label>
        <input type="text" class="form-control" id="estabelecimento" name="estabelecimento" value="<?= setValor("estabelecimento") ?>">
        <?= setMsgFilderError("estabelecimento") ?>
      </div>

      <div class="col-md-6 mb-3">
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
    </div>

    <div class="row">
      <div class="col-md-3 mb-3">
        <label for="inicioMes" class="form-label">Mês de Início</label>
        <select class="form-select" id="inicioMes" name="inicioMes">
          <option value="">Selecione</option>
          <option value="1" <?= (setValor("inicioMes") == '1' ? 'selected' : '') ?>>Janeiro</option>
          <option value="2" <?= (setValor("inicioMes") == '2' ? 'selected' : '') ?>>Fevereiro</option>
          <option value="3" <?= (setValor("inicioMes") == '3' ? 'selected' : '') ?>>Março</option>
          <option value="4" <?= (setValor("inicioMes") == '4' ? 'selected' : '') ?>>Abril</option>
          <option value="5" <?= (setValor("inicioMes") == '5' ? 'selected' : '') ?>>Maio</option>
          <option value="6" <?= (setValor("inicioMes") == '6' ? 'selected' : '') ?>>Junho</option>
          <option value="7" <?= (setValor("inicioMes") == '7' ? 'selected' : '') ?>>Julho</option>
          <option value="8" <?= (setValor("inicioMes") == '8' ? 'selected' : '') ?>>Agosto</option>
          <option value="9" <?= (setValor("inicioMes") == '9' ? 'selected' : '') ?>>Setembro</option>
          <option value="10" <?= (setValor("inicioMes") == '10' ? 'selected' : '') ?>>Outubro</option>
          <option value="11" <?= (setValor("inicioMes") == '11' ? 'selected' : '') ?>>Novembro</option>
          <option value="12" <?= (setValor("inicioMes") == '12' ? 'selected' : '') ?>>Dezembro</option>
        </select>
        <?= setMsgFilderError("inicioMes") ?>
      </div>

      <div class="col-md-3 mb-3">
        <label for="inicioAno" class="form-label">Ano de Início</label>
        <select class="form-select" id="inicioAno" name="inicioAno">
          <option value="">Selecione</option>
          <?php
            $anoAtual = date('Y');
            for ($ano = $anoAtual; $ano >= 1950; $ano--) {
              $selected = (setValor("inicioAno") == $ano) ? 'selected' : '';
              echo "<option value=\"$ano\" $selected>$ano</option>";
            }
          ?>
        </select>
        <?= setMsgFilderError("inicioAno") ?>
      </div>

      <div class="col-md-3 mb-3">
        <label for="fimMes" class="form-label">Mês Final</label>
        <select class="form-select" id="fimMes" name="fimMes">
          <option value="">Selecione</option>
          <option value="1" <?= (setValor("fimMes") == '1' ? 'selected' : '') ?>>Janeiro</option>
          <option value="2" <?= (setValor("fimMes") == '2' ? 'selected' : '') ?>>Fevereiro</option>
          <option value="3" <?= (setValor("fimMes") == '3' ? 'selected' : '') ?>>Março</option>
          <option value="4" <?= (setValor("fimMes") == '4' ? 'selected' : '') ?>>Abril</option>
          <option value="5" <?= (setValor("fimMes") == '5' ? 'selected' : '') ?>>Maio</option>
          <option value="6" <?= (setValor("fimMes") == '6' ? 'selected' : '') ?>>Junho</option>
          <option value="7" <?= (setValor("fimMes") == '7' ? 'selected' : '') ?>>Julho</option>
          <option value="8" <?= (setValor("fimMes") == '8' ? 'selected' : '') ?>>Agosto</option>
          <option value="9" <?= (setValor("fimMes") == '9' ? 'selected' : '') ?>>Setembro</option>
          <option value="10" <?= (setValor("fimMes") == '10' ? 'selected' : '') ?>>Outubro</option>
          <option value="11" <?= (setValor("fimMes") == '11' ? 'selected' : '') ?>>Novembro</option>
          <option value="12" <?= (setValor("fimMes") == '12' ? 'selected' : '') ?>>Dezembro</option>
        </select>
        <?= setMsgFilderError("fimMes") ?>
      </div>

      <div class="col-md-3 mb-3">
        <label for="fimAno" class="form-label">Ano Final</label>
        <select class="form-select" id="fimAno" name="fimAno">
          <option value="">Selecione</option>
          <?php
            $anoAtual = date('Y');
            for ($ano = $anoAtual; $ano >= 1950; $ano--) {
              $selected = (setValor("fimAno") == $ano) ? 'selected' : '';
              echo "<option value=\"$ano\" $selected>$ano</option>";
            }
          ?>
        </select>
        <?= setMsgFilderError("fimAno") ?>
      </div>
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="atual" name="atual" <?= $checked ?>>
      <label class="form-check-label" for="atual">Essa experiência é atual</label>
    </div>

    <div class="mb-3">
      <label for="atividadesExercidas" class="form-label">Atividades Exercidas</label>
      <textarea class="form-control" id="atividadesExercidas" name="atividadesExercidas" rows="4" placeholder="Fale um pouco sobre as atividades..."><?= setValor("atividadesExercidas") ?></textarea>
      <?= setMsgFilderError("atividadesExercidas") ?>
    </div>

    <a href="<?= baseUrl() . 'Perfil' ?>" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-success">Enviar</button>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
  const atualCheckbox = document.getElementById('atual');
  const fimMes = document.getElementById('fimMes');
  const fimAno = document.getElementById('fimAno');

  function toggleFim() {
    if (atualCheckbox.checked) {
      fimMes.disabled = true;
      fimAno.disabled = true;
      fimMes.value = '';
      fimAno.value = '';
    } else {
      fimMes.disabled = false;
      fimAno.disabled = false;
    }
  }

  atualCheckbox.addEventListener('change', toggleFim);

  // Executa ao carregar a página para manter o estado correto
  toggleFim();
});

</script>
