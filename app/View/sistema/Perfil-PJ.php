<?php
$aModalidade  = ["1" => "Presencial", "2" => "Semipresencial", "3" => "Remoto"];
$aVinculo  = ["1" => "CLT", "2" => "PJ", "3" => "Estágio"];

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

      <ul class="nav nav-tabs mb-3" id="UserTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="vagas-tab" data-bs-toggle="tab" data-bs-target="#vagas" type="button" role="tab" aria-controls="vagas" aria-selected="true">
            Controle de Vagas
          </button>
        </li>

        <?php if (!empty($dados['postagens'])): ?>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="postagem-tab" data-bs-toggle="tab" data-bs-target="#postagem" type="button" role="tab" aria-controls="postagem" aria-selected="false">
              Postagens
            </button>
          </li>
        <?php endif; ?>

        <li class="nav-item" role="presentation">
          <button class="nav-link" id="configuracoes-tab" data-bs-toggle="tab" data-bs-target="#configuracoes" type="button" role="tab" aria-controls="configuracoes" aria-selected="false">
            Configurações
          </button>
        </li>
      </ul>

      <div class="tab-content" id="UserTabsContents">
        <!-- Início aba de vagas -->
        <div class="tab-pane fade show active" id="vagas" role="tabpanel" aria-labelledby="vagas">
          <a href="<?= baseUrl() ?>Vagas/form/insert/0" class="btn btn-success m-2 mb-4">
            <i class="bi bi-plus-lg"></i> Criar Nova Vaga
          </a>

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
                        <small class="text-muted">
                          <?= date('d/m/Y', strtotime($vaga['dtInicio'])) ?> - <?= date('d/m/Y', strtotime($vaga['dtFim'])) ?>
                        </small>
                      </div>
                      <div class="mt-3 mt-md-0 d-flex align-items-start gap-2">
                        <a href="<?= baseUrl() ?>Vagas/view/<?= $vaga['vaga_id'] ?>" class="btn btn-sm btn-outline-success" style="min-width:70px; white-space: nowrap;">
                          <i class="bi bi-gear-fill me-1"></i> Gerenciar
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
        </div> <!-- Fim aba de vagas -->

        <!-- Início aba de postagens -->
        <div class="tab-pane fade" id="postagem" role="tabpanel" aria-labelledby="postagem">
          <div class="container my-4 feed-container">
            <?php foreach ($dados['postagens'] as $value): ?>
              <div class="card post mb-4 shadow-sm">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <!-- Foto de perfil -->
                    <div class="text-center">
                      <?php if (!empty($value['foto_perfil'])): ?>
                        <?php if (!empty($value['pessoa_fisica_id'])): ?>
                          <img src="<?= baseUrl() . 'fotoPF.php?id=' . $value['curriculum_id'] ?>" class="rounded-circle perfil me-3">
                        <?php else: ?>
                          <img src="<?= baseUrl() . 'fotoPJ.php?id=' . $value['estabelecimento_id'] ?>" class="rounded-circle perfil me-3">
                        <?php endif; ?>
                      <?php else: ?>
                        <img src="<?= baseUrl() ?>assets/img/default-profile.png" class="rounded-circle perfil me-3">
                      <?php endif; ?>
                    </div>
                    <!-- Nome e data da postagem -->
                    <div>
                      <h6 class="mb-0"><?= $value['nome'] ?></h6>
                      <small class="text-muted">Postado em <?= date('d/m/Y H:i', strtotime($value['data_criacao'])) ?></small>
                    </div>
                  </div>
                  <!-- Imagem da postagem -->
                  <?php if (!empty($value['imagem'])): ?>
                    <img src="<?= baseUrl() . 'post.php?id=' . $value['postagem_id'] ?>" class="img-fluid rounded imagem-post mb-3">
                  <?php endif; ?>
                  <!-- Comentário da postagem -->
                  <p><?= $value['comentario'] ?></p>
                </div>
                <!-- Botões da postagem -->
                <div class=" p-2 d-flex justify-content-center gap-5">
                  <a href="<?= baseUrl() ?>Postagem/form/update/<?= $value['postagem_id'] ?>" class="btn btn-outline-primary">
                    <i class="bi bi-pencil-fill me-1"></i> Editar
                  </a>
                  <a href="javascript:void(0);"
                    onclick="confirmarExclusao('<?= baseUrl() ?>Postagem/delete', { postagem_id: <?= $value['postagem_id'] ?> })"
                    class="btn btn-outline-danger">
                    <i class="bi bi-trash-fill me-1"></i> Excluir
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div> <!-- Fim aba de postagens -->

        <!-- Início Aba de configurações -->
        <div class="tab-pane fade" id="configuracoes" role="tabpanel" aria-labelledby="configuracoes">
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
        </div> <!-- Fim aba de configurações -->
      </div>
    <?php endif; ?>
  </div>
</div>