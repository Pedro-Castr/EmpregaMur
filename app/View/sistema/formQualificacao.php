<?php
  use Core\Library\Request;
  $request = new Request();
?>

<div class="container py-3">
  <?php if (in_array($this->request->getAction(), ['insert'])): ?>
    <h2 class="my-3 text-center">Cadastre sua Qualificação</h2>
    <p class="text-muted text-center">Adicione cursos e certificações que complementam sua formação e destacam suas habilidades no mercado de trabalho.</p>
  <?php else: ?>
    <h2 class="my-3 text-center">Atualize sua Qualificação</h2>
  <?php endif; ?>

  <form method="POST" action="<?= $this->request->formAction() ?>" class="bg-white p-4 rounded shadow-sm">

    <?php if (in_array($this->request->getAction(), ['update'])): ?>
      <input type="hidden" name="curriculum_qualificacao_id" id="curriculum_qualificacao_id" value="<?= setValor("curriculum_qualificacao_id") ?>">
    <?php endif; ?>

    <input type="hidden" name="curriculum_id" value="<?= $dados['curriculum_id'] ?>">

    <div class="row">
      <div class="col-md-4 mb-3">
        <label for="estabelecimento" class="form-label">Estabelecimento</label>
        <input type="text" class="form-control" id="estabelecimento" name="estabelecimento" value="<?= setValor("estabelecimento") ?>">
        <?= setMsgFilderError("estabelecimento") ?>
      </div>

      <div class="col-md-3 mb-3">
        <label for="mes" class="form-label">Mês de Término</label>
        <select class="form-select" id="mes" name="mes">
          <option value="">Selecione</option>
          <option value="1" <?= (setValor("mes") == '1' ? 'selected' : '') ?>>Janeiro</option>
          <option value="2" <?= (setValor("mes") == '2' ? 'selected' : '') ?>>Fevereiro</option>
          <option value="3" <?= (setValor("mes") == '3' ? 'selected' : '') ?>>Março</option>
          <option value="4" <?= (setValor("mes") == '4' ? 'selected' : '') ?>>Abril</option>
          <option value="5" <?= (setValor("mes") == '5' ? 'selected' : '') ?>>Maio</option>
          <option value="6" <?= (setValor("mes") == '6' ? 'selected' : '') ?>>Junho</option>
          <option value="7" <?= (setValor("mes") == '7' ? 'selected' : '') ?>>Julho</option>
          <option value="8" <?= (setValor("mes") == '8' ? 'selected' : '') ?>>Agosto</option>
          <option value="9" <?= (setValor("mes") == '9' ? 'selected' : '') ?>>Setembro</option>
          <option value="10" <?= (setValor("mes") == '10' ? 'selected' : '') ?>>Outubro</option>
          <option value="11" <?= (setValor("mes") == '11' ? 'selected' : '') ?>>Novembro</option>
          <option value="12" <?= (setValor("mes") == '12' ? 'selected' : '') ?>>Dezembro</option>
        </select>
        <?= setMsgFilderError("mes") ?>
      </div>

      <div class="col-md-3 mb-3">
        <label for="inicioAno" class="form-label">Ano de Término</label>
        <select class="form-select" id="ano" name="ano">
          <option value="">Selecione</option>
          <?php
            $anoAtual = date('Y');
            for ($ano = $anoAtual; $ano >= 1950; $ano--) {
              $selected = (setValor("ano") == $ano) ? 'selected' : '';
              echo "<option value=\"$ano\" $selected>$ano</option>";
            }
          ?>
        </select>
        <?= setMsgFilderError("ano") ?>
      </div>

      <div class="col-md-2 mb-3">
        <label for="cargaHoraria" class="form-label">Carga Horária</label>
        <input type="text" class="form-control" id="cargaHoraria" name="cargaHoraria" value="<?= setValor("cargaHoraria") ?>">
        <?= setMsgFilderError("cargaHoraria") ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" value="<?= setValor("descricao") ?>">
        <?= setMsgFilderError("descricao") ?>
      </div>
    </div>

    <a href="<?= baseUrl() . 'Perfil' ?>" class="btn btn-secondary">Voltar</a>
    <button type="submit" class="btn btn-success">Enviar</button>

  </form>
</div>
