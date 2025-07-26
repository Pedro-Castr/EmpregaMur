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
          </div>
        </div>
      </div>
    <?php else: ?>

      <div class="card border-0 rounded-4 p-4 bg-light">
        <div class="row g-4 align-items-center">
          <!-- Foto de perfil -->
          <div class="col-md-3 text-center">
            <img src="<?= baseUrl() ?>assets/img/default-profile.png" alt="Foto de perfil" class="img-fluid rounded-3">
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
          <div class="mt-4">
            <div class="p-3">
              <h5 class="fw-semibold mb-2"><i class="bi bi-person-lines-fill me-2"></i>Apresentação Pessoal</h5>
              <p class="mb-0"><?= $dados['curriculo']['apresentacaoPessoal'] ?></p>
            </div>
          </div>

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

      <!-- Escolaridade -->
      <div class="mb-4">
        <h4 class="text-primary mb-3">Escolaridade</h4>

        <div class="card p-3 shadow-sm rounded-4 mb-3">
          <h5 class="mb-1">Ensino Médio</h5>
          <p class="mb-1 text-muted">Escola São Paulo</p>
          <small class="text-muted">Jan/2010 - Dez/2018</small>
        </div>

        <div class="card p-3 shadow-sm rounded-4">
          <h5 class="mb-1">Ensino Superior</h5>
          <p class="mb-1 text-muted">Fasm</p>
          <small class="text-muted">Mar/2020 - Cursando</small>
        </div>
      </div>

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

      <hr class="my-4">

      <!-- Ações da Conta -->
      <div class="d-flex justify-content-between">
        <a href="#" class="btn btn-outline-primary">Editar Conta</a>
        <a href="<?= baseUrl() ?>Login/signOut" class="btn btn-danger">Sair</a>
      </div>
    <?php endif; ?>
  </div>
</div>
