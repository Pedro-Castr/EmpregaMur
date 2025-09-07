<?php
$meses = [
  1 => 'Jan',
  2 => 'Fev',
  3 => 'Mar',
  4 => 'Abr',
  5 => 'Mai',
  6 => 'Jun',
  7 => 'Jul',
  8 => 'Ago',
  9 => 'Set',
  10 => 'Out',
  11 => 'Nov',
  12 => 'Dez'
];
?>

<script src="<?= baseUrl(); ?>assets/js/mascaras.js"></script>

<div class="main-container container py-4">
  <div class="card border-0 rounded-4 shadow-sm">
    <div class="card-body">

      <!-- Título -->
      <h2 class="text-center mb-4">Currículo de <?= $dados['perfil']['nome'] ?></h2>

      <!-- Foto de Perfil (maior) -->
      <div class="text-center mb-4">
        <?php if (!empty($dados['curriculo']['foto'])): ?>
          <img src="<?= baseUrl() . 'fotoPF.php?id=' . $dados['curriculo']['curriculum_id'] ?>" alt="Foto de perfil" class="img-thumbnail rounded-3"
            style="width: 250px; height: 250px; object-fit: cover;">
        <?php else: ?>
          <img src="<?= baseUrl() ?>assets/img/default-profile.png" alt="Sem foto" class="img-thumbnail rounded-3" style="width: 250px; height: 250px; object-fit: cover;">
        <?php endif; ?>
      </div>

      <!-- Informações Pessoais -->
      <h4 class="mb-3"><i class="bi bi-chat-left-text-fill me-2"></i>Informações Pessoais</h4>
      <hr>
      <div class="row gx-4 gy-3">
        <div class="col-md-6">
          <strong>Email</strong>
          <p><?= $dados['curriculo']['email'] ?></p>
        </div>
        <div class="col-md-6">
          <strong>Celular</strong>
          <p id="celular-exibicao"><?= $dados['curriculo']['celular'] ?></p>
        </div>
        <div class="col-md-6">
          <strong>Sexo</strong>
          <p>
            <?php
            switch ($dados['curriculo']['sexo']) {
              case 'M':
                echo 'Masculino';
                break;
              case 'F':
                echo 'Feminino';
                break;
              case 'O':
                echo 'Outro';
                break;
              default:
                echo '-';
            }
            ?>
          </p>
        </div>
        <div class="col-md-6">
          <strong>Data de Nascimento</strong>
          <p><?= date('d/m/Y', strtotime($dados['curriculo']['dataNascimento'])) ?></p>
        </div>
      </div>

      <!-- Endereço -->
      <h4 class="mt-4 mb-3"><i class="bi bi-house-door-fill me-2"></i>Endereço</h4>
      <hr>
      <div class="row gx-4 gy-3">
        <div class="col-md-6">
          <strong>Cidade</strong>
          <p><?= $dados['cidade']['cidade'] ?>/<?= $dados['cidade']['uf'] ?></p>
        </div>
        <div class="col-md-6">
          <strong>CEP</strong>
          <p id="cep-exibicao"><?= $dados['curriculo']['cep'] ?></p>
        </div>
        <div class="col-md-6">
          <strong>Logradouro</strong>
          <p><?= $dados['curriculo']['logradouro'] ?></p>
        </div>
        <div class="col-md-2">
          <strong>Número</strong>
          <p><?= $dados['curriculo']['numero'] ?></p>
        </div>
        <div class="col-md-6">
          <strong>Bairro</strong>
          <p><?= $dados['curriculo']['bairro'] ?></p>
        </div>
        <?php if (!empty($dados['curriculo']['complemento'])): ?>
          <div class="col-6">
            <strong>Complemento</strong>
            <p><?= $dados['curriculo']['complemento'] ?></p>
          </div>
        <?php endif; ?>
      </div>

      <!-- Apresentação Pessoal -->
      <?php if (!empty($dados['curriculo']['apresentacaoPessoal'])): ?>
        <h5 class="mt-4 mb-2">Apresentação Pessoal</h5>
        <p class="mb-5"><?= nl2br($dados['curriculo']['apresentacaoPessoal']) ?></p>
      <?php endif; ?>

      <!-- Escolaridade -->
      <?php if (!empty($dados['escolaridades'])): ?>
        <h4 class="mt-4 mb-3"><i class="bi bi-mortarboard-fill me-2"></i>Escolaridade</h4>
        <hr>
        <?php foreach ($dados['escolaridades'] as $escolaridade): ?>
          <div class="card-body">
            <div class="d-flex justify-content-between flex-column flex-md-row">
              <div>
                <h5 class="card-title mb-1"><?= $escolaridade['nome_escolaridade'] ?></h5>
                <p class="text-muted mb-1"><?= $escolaridade['instituicao'] ?></p>
                <small class="text-muted">
                  <?= $meses[(int)$escolaridade['inicioMes']] ?>/<?= $escolaridade['inicioAno'] ?> –
                  <?= $meses[(int)$escolaridade['fimMes']] ?>/<?= $escolaridade['fimAno'] ?>
                </small>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <!-- Experiências -->
      <?php if (!empty($dados['experiencias'])): ?>
        <h4 class="mt-4 mb-3"><i class="bi bi-bar-chart-fill me-2"></i>Experiências</h4>
        <hr>
        <?php foreach ($dados['experiencias'] as $experiencias): ?>
          <div class="card-body">
            <div class="d-flex justify-content-between flex-column flex-md-row">
              <div>
                <h5 class="card-title mb-1"><?= $experiencias['nome_cargo'] ?></h5>
                <p class="text-muted mb-1"><?= $experiencias['estabelecimento'] ?></p>
                <small class="text-muted">
                  <?= $meses[(int)$experiencias['inicioMes']] ?>/<?= $experiencias['inicioAno'] ?> –
                  <?php if (!empty($experiencias['fimMes']) && !empty($experiencias['fimAno'])): ?>
                    <?= $meses[(int)$experiencias['fimMes']] ?>/<?= $experiencias['fimAno'] ?>
                  <?php else: ?>
                    Atual
                  <?php endif; ?>
                </small>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <!-- Qualificação -->
      <?php if (!empty($dados['qualificacoes'])): ?>
        <h4 class="mt-4 mb-3"><i class="bi bi-award-fill me-2"></i>Qualificações</h4>
        <hr>
        <?php foreach ($dados['qualificacoes'] as $qualificacao): ?>
          <div class="card-body">
            <div class="d-flex justify-content-between flex-column flex-md-row">
              <div>
                <h5 class="card-title mb-1"><?= $qualificacao['descricao'] ?></h5>
                <p class="text-muted mb-1"><?= $qualificacao['estabelecimento'] ?></p>
                <small class="text-muted">
                  <?= $meses[(int)$qualificacao['mes']] ?>/<?= $qualificacao['ano'] ?>
                </small>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <!-- Botão Voltar -->
      <div class="text-center mt-4">
        <a href="<?= baseUrl() . 'Perfil' ?>" class="btn btn-secondary">Voltar</a>
      </div>

    </div>
  </div>
</div>