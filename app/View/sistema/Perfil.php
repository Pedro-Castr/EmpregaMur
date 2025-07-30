<?php
  $meses = [
    1 => 'Jan', 2 => 'Fev', 3 => 'Mar', 4 => 'Abr',
    5 => 'Mai', 6 => 'Jun', 7 => 'Jul', 8 => 'Ago',
    9 => 'Set', 10 => 'Out', 11 => 'Nov', 12 => 'Dez'
  ];
?>

<div class="container-fluid min-vh-100 d-flex flex-column justify-content-center align-items-center bg-light p-4">
  <div class="w-100" style="max-width: 800px;">
    <?php if (empty($dados['curriculo'])): ?>
      <div class="card border-0 rounded-4 p-4 text-center bg-light">
        <div class="card-body">
          <h5 class="card-title mb-3">Currículo não encontrado!</h5>
          <p class="card-text text-muted mb-4">
            Você ainda não cadastrou seu currículo no sistema. Com um currículo ativo, suas chances de ser chamado para uma vaga aumentam!
          </p>

          <!-- Botão Cadastrar Currículo -->
          <a href="<?= baseUrl() ?>curriculo/form/insert/0" class="btn btn-success btn-lg rounded-pill mb-3">
            Cadastrar Currículo
          </a>

          <!-- Botões Editar e Excluir -->
          <div class="mt-5">
            <a href="<?= baseUrl() ?>Perfil/form/update/<?= $dados['usuario']['usuario_id'] ?>" class="btn btn-outline-primary me-2 mb-2 mb-md-0">
              <i class="bi bi-pencil-fill me-1"></i> Editar Perfil
            </a>
            <a href="javascript:void(0);" onclick="confirmarExclusao('<?= baseUrl() ?>Perfil/delete', { usuario_id: <?= $dados['usuario']['usuario_id'] ?> })"
            class="btn btn-outline-danger me-2 mb-2 mb-md-0">
              <i class="bi bi-trash-fill me-1"></i> Excluir Conta
            </a>

            <a href="javascript:void(0);" onclick="confirmarLogout('<?= baseUrl() ?>Login/signOut')" class="btn btn-outline-danger me-2 mb-2 mb-md-0">
              <i class="bi bi-box-arrow-right"></i> Sair
            </a>
          </div>
        </div>
      </div>
    <?php else: ?>

      <div class="card border-0 rounded-4 p-4 bg-light">
        <div class="row g-4 align-items-center">
          <!-- Foto de perfil -->
          <div class="col-md-3 text-center">
            <?php if (!empty($dados['curriculo']['foto'])): ?>
              <img src="<?= baseUrl() . 'foto.php?id=' . $dados['curriculo']['curriculum_id'] ?>" alt="Foto de perfil" class="img-fluid rounded-3">
            <?php else: ?>
              <img src="<?= baseUrl() ?>assets/img/default-profile.png" alt="Foto de perfil" class="img-fluid rounded-3">
            <?php endif; ?>
          </div>

          <!-- Dados pessoais -->
          <div class="col-md-9">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
              <h4 class="fs-3 mb-3 mb-md-0"><?= $dados['usuario']['nome'] ?></h4>

              <!-- Botões perfil -->
              <div>
                <a href="<?= baseUrl() ?>Perfil/form/update/<?= $dados['usuario']['usuario_id'] ?>" class="btn btn-sm btn-outline-primary me-2 mb-2 mb-md-0">
                  <i class="bi bi-pencil-fill me-1"></i> Editar
                </a>
                <a href="javascript:void(0);" onclick="confirmarExclusao('<?= baseUrl() ?>Perfil/delete', { usuario_id: <?= $dados['usuario']['usuario_id'] ?> })"
                class="btn btn-sm btn-outline-danger me-2 mb-2 mb-md-0">
                  <i class="bi bi-trash-fill me-1"></i> Excluir
                </a>
                <a href="javascript:void(0);" onclick="confirmarLogout('<?= baseUrl() ?>Login/signOut')" class="btn btn-sm btn-outline-danger me-2 mb-2 mb-md-0">
                  <i class="bi bi-box-arrow-right"></i> Sair
                </a>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-md-12">
                <p class="mb-1"><strong>Email:</strong> <?= $dados['curriculo']['email'] ?></p>
                <p class="mb-1"><strong>Telefone:</strong> <?= $dados['curriculo']['celular'] ?></p>
                <p class="mb-1"><strong>Cidade:</strong> <?= $dados['cidade']['cidade'] ?>/<?= $dados['cidade']['uf'] ?></p>
              </div>
            </div>
          </div>

          <!-- Apresentação Pessoal -->
          <?php if (!empty($dados['curriculo']['apresentacaoPessoal'])): ?>
            <div class="mt-4">
              <div class="p-3">
                <h5 class="fw-semibold mb-2"><i class="bi bi-person-lines-fill me-2"></i>Apresentação Pessoal</h5>
                <p class="mb-0"><?= $dados['curriculo']['apresentacaoPessoal'] ?></p>
              </div>
            </div>
          <?php endif; ?>

          <!-- Botões currículo -->
          <div class="col-12 mt-3">
            <a href="#" class="btn btn-sm btn-outline-success m-2">
              <i class="bi bi-eye-fill me-1"></i> Visualizar Currículo
            </a>
            <a href="<?= baseUrl() ?>Curriculo/form/update/<?= $dados['curriculo']['curriculum_id'] ?>" class="btn btn-sm btn-outline-primary m-2">
              <i class="bi bi-pencil-fill me-1"></i> Editar Currículo
            </a>
            <a href="javascript:void(0);" onclick="confirmarExclusao('<?= baseUrl() ?>Curriculo/delete', { curriculum_id: <?= $dados['curriculo']['curriculum_id'] ?> })"
            class="btn btn-sm btn-outline-danger m-2">
              <i class="bi bi-trash-fill me-1"></i> Deletar Currículo
            </a>
          </div>

        </div>
      </div>

      <hr class="my-4">

      <div class="container my-4">
        <a href="<?= baseUrl() ?>escolaridade/form/insert/0" class="btn btn-success m-2">
          <i class="bi bi-plus-lg"></i> Cadastrar Escolaridade
        </a>

        <a href="<?= baseUrl() ?>Curriculo/form/update/<?= $dados['curriculo']['curriculum_id'] ?>" class="btn btn-success m-2">
          <i class="bi bi-plus-lg"></i> Cadastrar Experiências
        </a>
      </div>

      <!-- Escolaridade -->
      <?php if (!empty($dados['escolaridades'])): ?>
        <div class="mb-4">
          <h4 class="text-primary mb-4">Escolaridades</h4>
          <?php foreach ($dados['escolaridades'] as $escolaridade): ?>
            <div class="card shadow-sm border-0 rounded-4 mb-3">
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
                  <div class="mt-3 mt-md-0 d-flex align-items-start gap-2">
                    <a href="<?= baseUrl() ?>Escolaridade/form/update/<?= $escolaridade['curriculum_escolaridade_id'] ?>" class="btn btn-sm btn-outline-primary">
                      <i class="bi bi-pencil-fill me-1"></i> Editar
                    </a>
                    <a href="javascript:void(0);"
                    onclick="confirmarExclusao('<?= baseUrl() ?>Escolaridade/delete', { curriculum_escolaridade_id: <?= $escolaridade['curriculum_escolaridade_id'] ?> })"
                    class="btn btn-sm btn-outline-danger">
                      <i class="bi bi-trash-fill me-1"></i> Excluir
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <hr class="my-4">

      <!-- Experiências -->
      <div class="mb-4">
        <h4 class="text-primary mb-3">Experiências</h4>

        <div class="card p-3 shadow-sm rounded-4 mb-3">
          <h5 class="mb-1">Desenvolvedor PHP</h5>
          <p class="mb-1 text-muted">Tech Solutions</p>
          <small class="text-muted">Jan/2023 - Atual</small>
        </div>

        <div class="card p-3 shadow-sm rounded-4">
          <h5 class="mb-1">Estagiário em TI</h5>
          <p class="mb-1 text-muted">SoftCorp</p>
          <small class="text-muted">Mar/2022 - Dez/2022</small>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
