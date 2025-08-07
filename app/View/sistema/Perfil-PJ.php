<?php
  $aModalidade  = ["1" => "Presencial", "2" => "Semipresencial", "3" => "Remoto"];
  $aVinculo  = ["1" => "CLT", "2" => "PJ", "3" => "Estágiario"];

  $vagasPendentes = [];
  $vagasAbertas = [];
  $vagasFechadas = [];

  if (!empty($dados['vagas'])) {
    foreach ($dados['vagas'] as $vaga) {
      switch ($vaga['statusVaga']) {
        case 1:
          $vagasPendentes[] = $vaga;
          break;
        case 2:
          $vagasAbertas[] = $vaga;
          break;
        case 3:
          $vagasFechadas[] = $vaga;
          break;
      }
    }
  }
?>

<div class="container-fluid min-vh-100 d-flex flex-column align-items-center bg-light p-4">
  <div class="w-100" style="max-width: 800px;">
    <?php if (empty($dados['estabelecimento']['endereco'])): ?>
      <div class="card border-0 rounded-4 p-4 text-center bg-light">
        <div class="card-body">
          <h5 class="card-title mb-3">Perfil incompleto!</h5>
          <p class="card-text text-muted mb-4">
            Sua empresa ainda não completou o cadastro no sistema. Ao preencher suas informações, você ganha mais visibilidade e transmite maior confiança aos candidatos!
          </p>

          <!-- Botão Completar Cadastro -->
          <a href="<?= baseUrl() ?>Estabelecimento/form/update/<?= $dados['usuario']['estabelecimento_id'] ?>" class="btn btn-success btn-lg rounded-pill mb-3">
            Completar Cadastro
          </a>

          <!-- Botões Excluir e Sair -->
          <div class="mt-5">
            <a href="javascript:void(0);" onclick="confirmarExclusao('<?= baseUrl() ?>Perfil/delete', { usuario_id: <?= $dados['usuario']['usuario_id'] ?> })"
            class="btn btn-outline-danger me-2 mb-2 mb-md-0">
              <i class="bi bi-trash-fill me-1"></i> Excluir Conta
            </a>

            <a href="javascript:void(0);" onclick="confirmarLogout('<?= baseUrl() ?>Login/signOut')" class="btn btn-outline-dark me-2 mb-2 mb-md-0">
              <i class="bi bi-box-arrow-right"></i> Sair
            </a>
          </div>
        </div>
      </div>
    <?php else: ?>

      <div class="card border-0 rounded-4 p-2 bg-light">
        <div class="g-4 d-flex flex-column justify-content-center align-items-center text-center">
          <!-- Dados Pessoais -->
          <div class="col-md-3 text-center">
            <?php if (!empty($dados['estabelecimento']['foto'])): ?>
              <img src="<?= baseUrl() . 'fotoPJ.php?id=' . $dados['estabelecimento']['estabelecimento_id'] ?>" alt="Foto de perfil" class="img-fluid rounded-3">
            <?php else: ?>
              <img src="<?= baseUrl() ?>assets/img/default-profile.png" alt="Foto de perfil" class="img-fluid rounded-3">
            <?php endif; ?>
          </div>

          <h1 class="mt-3"><?= $dados['estabelecimento']['nome'] ?></h1>
        </div>
      </div>

      <hr class="my-4">

      <div class="row g-4 my-4 align-items-center">
        <h2 class="text-center my-4">Configurações da Conta</h2>

        <div class="col-12">
          <h5>Gerencie suas vagas</h5>
          <a href="<?= baseUrl() ?>Vagas/form/insert/0" class="btn btn-success m-2 mb-4">
            <i class="bi bi-plus-lg"></i> Criar Nova Vaga
          </a>

          <!-- Vagas -->
          <?php if (!empty($dados['vagas'])): ?>
            <!-- Vagas Abertas -->
            <?php if (!empty($vagasAbertas)): ?>
              <h4>Vagas Abertas</h4>
              <?php foreach ($vagasAbertas as $vaga): ?>
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                  <div class="card-body">
                    <div class="d-flex justify-content-between flex-column flex-md-row">
                      <div>
                        <h5 class="card-title mb-1"><?= $vaga['descricao'] ?></h5>
                        <p class="card-title mb-1">
                          <?= $aModalidade[$vaga['modalidade']] ?> - <?= $aVinculo[$vaga['vinculo']] ?>
                        </p>
                        <p class="text-muted mb-1"><?= $vaga['sobreaVaga'] ?></p>
                        <small class="text-muted">
                          <?= date('d/m/Y', strtotime($vaga['dtInicio'])) ?> - <?= date('d/m/Y', strtotime($vaga['dtFim'])) ?>
                        </small>
                      </div>
                      <div class="mt-3 mt-md-0 d-flex align-items-start gap-2">
                        <a href="<?= baseUrl() ?>Vagas/form/update/<?= $vaga['vaga_id'] ?>" class="btn btn-sm btn-outline-primary" style="min-width:70px; white-space: nowrap;">
                          <i class="bi bi-pencil-fill me-1"></i> Editar
                        </a>
                        <a href="javascript:void(0);"
                        onclick="confirmarExclusao('<?= baseUrl() ?>Vagas/delete', { vaga_id: <?= $vaga['vaga_id'] ?> })"
                        class="btn btn-sm btn-outline-danger" style="min-width:70px; white-space: nowrap;">
                          <i class="bi bi-trash-fill me-1"></i> Excluir
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

            <!-- Vagas Pendentes -->
            <?php if (!empty($vagasPendentes)): ?>
              <h4>Vagas Pendentes</h4>
              <?php foreach ($vagasPendentes as $vaga): ?>
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                  <div class="card-body">
                    <div class="d-flex justify-content-between flex-column flex-md-row">
                      <div>
                        <h5 class="card-title mb-1"><?= $vaga['descricao'] ?></h5>
                        <p class="card-title mb-1">
                          <?= $aModalidade[$vaga['modalidade']] ?> - <?= $aVinculo[$vaga['vinculo']] ?>
                        </p>
                        <p class="text-muted mb-1"><?= $vaga['sobreaVaga'] ?></p>
                        <small class="text-muted">
                          <?= date('d/m/Y', strtotime($vaga['dtInicio'])) ?> - <?= date('d/m/Y', strtotime($vaga['dtFim'])) ?>
                        </small>
                      </div>
                      <div class="mt-3 mt-md-0 d-flex align-items-start gap-2">
                        <a href="<?= baseUrl() ?>Vagas/form/update/<?= $vaga['vaga_id'] ?>" class="btn btn-sm btn-outline-primary" style="min-width:70px; white-space: nowrap;">
                          <i class="bi bi-pencil-fill me-1"></i> Editar
                        </a>
                        <a href="javascript:void(0);"
                        onclick="confirmarExclusao('<?= baseUrl() ?>Vagas/delete', { vaga_id: <?= $vaga['vaga_id'] ?> })"
                        class="btn btn-sm btn-outline-danger" style="min-width:70px; white-space: nowrap;">
                          <i class="bi bi-trash-fill me-1"></i> Excluir
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

            <!-- Vagas Fechadas -->
            <?php if (!empty($vagasFechadas)): ?>
              <h4>Vagas Fechadas</h4>
              <?php foreach ($vagasFechadas as $vaga): ?>
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                  <div class="card-body">
                    <div class="d-flex justify-content-between flex-column flex-md-row">
                      <div>
                        <h5 class="card-title mb-1"><?= $vaga['descricao'] ?></h5>
                        <p class="card-title mb-1">
                          <?= $aModalidade[$vaga['modalidade']] ?> - <?= $aVinculo[$vaga['vinculo']] ?>
                        </p>
                        <p class="text-muted mb-1"><?= $vaga['sobreaVaga'] ?></p>
                        <small class="text-muted">
                          <?= date('d/m/Y', strtotime($vaga['dtInicio'])) ?> - <?= date('d/m/Y', strtotime($vaga['dtFim'])) ?>
                        </small>
                      </div>
                      <div class="mt-3 mt-md-0 d-flex align-items-start gap-2">
                        <a href="<?= baseUrl() ?>Vagas/form/update/<?= $vaga['vaga_id'] ?>" class="btn btn-sm btn-outline-primary" style="min-width:70px; white-space: nowrap;">
                          <i class="bi bi-pencil-fill me-1"></i> Editar
                        </a>
                        <a href="javascript:void(0);"
                        onclick="confirmarExclusao('<?= baseUrl() ?>Vagas/delete', { vaga_id: <?= $vaga['vaga_id'] ?> })"
                        class="btn btn-sm btn-outline-danger" style="min-width:70px; white-space: nowrap;">
                          <i class="bi bi-trash-fill me-1"></i> Excluir
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          <?php endif; ?>
        </div>

        <div class="col-12">
          <h5>Edite seu perfil</h5>
          <a href="<?= baseUrl() ?>Estabelecimento/form/update/<?= $dados['usuario']['estabelecimento_id'] ?>" class="btn btn-sm btn-outline-primary m-2">
            <i class="bi bi-pencil-fill me-1"></i> Editar Perfil
          </a>
          <a href="javascript:void(0);" onclick="confirmarExclusao('<?= baseUrl() ?>Perfil/delete', { usuario_id: <?= $dados['usuario']['usuario_id'] ?> })"
          class="btn btn-sm btn-outline-danger m-2">
            <i class="bi bi-trash-fill me-1"></i> Excluir Perfil
          </a>
          <a href="javascript:void(0);" onclick="confirmarLogout('<?= baseUrl() ?>Login/signOut')" class="btn btn-sm btn-outline-dark m-2">
            <i class="bi bi-box-arrow-right"></i> Sair
          </a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
