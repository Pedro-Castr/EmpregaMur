<?php
  use Core\Library\Request;
  $request = new Request();
?>

<div class="container py-3">
  <h2 class="my-3 text-center">Cadastre sua Escolaridade</h2>
  <p class="text-muted text-center">Informe seus dados escolares para enriquecer ainda mais seu currículo e mostrar às empresas seu nível de formação e dedicação aos estudos.</p>

  <form method="POST" action="<?= $this->request->formAction() ?>" class="bg-white p-4 rounded shadow-sm">

    <?php if (in_array($this->request->getAction(), ['update'])): ?>
      <input type="hidden" name="curriculum_escolaridade_id" id="curriculum_escolaridade_id" value="<?= setValor("curriculum_escolaridade_id") ?>">
    <?php endif; ?>

    <input type="hidden" name="curriculum_id" value="<?= $dados['curriculum_id'] ?>">

    <div class="row">
      <div class="col-md-4 mb-3">
        <label for="escolaridade_id" class="form-label">Escolaridade</label>
        <select class="form-select" id="escolaridade_id" name="escolaridade_id">
          <option value="">Selecione</option>
          <?php foreach ($dados['aEscolaridade'] as $escolaridade): ?>
            <option value="<?= $escolaridade['escolaridade_id'] ?>" <?= ($escolaridade['escolaridade_id'] == setValor("escolaridade_id") ? 'selected' : '') ?>>
              <?= $escolaridade['descricao'] ?>
            </option>
          <?php endforeach; ?>
        </select>
        <?= setMsgFilderError("escolaridade_id") ?>
      </div>

      <div class="col-md-4 mb-3">
        <label for="instituicao" class="form-label">Instituição</label>
        <input type="text" class="form-control" id="instituicao" name="instituicao" value="<?= setValor("instituicao") ?>">
        <?= setMsgFilderError("instituicao") ?>
      </div>

      <div class="col-md-4 mb-3">
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
