<div class="container-fluid min-vh-100 d-flex flex-column justify-content-center align-items-center bg-light p-4">
  <div class="w-100" style="max-width: 800px;">
    <?php if (count($dados['curriculo']) < 0): ?>
      <div class="card border-0 rounded-4 p-4 text-center bg-light">
        <div class="card-body">
          <h5 class="card-title mb-3">Currículo não encontrado</h5>
          <p class="card-text text-muted mb-4">
            Você ainda não cadastrou seu currículo no sistema. Com um currículo ativo, suas chances de ser chamado para uma vaga aumentam!
          </p>
          <a href="<?= baseUrl() ?>curriculo/form/insert/0" class="btn btn-primary btn-lg rounded-pill">
            Cadastrar Currículo
          </a>
        </div>
      </div>
    <?php else: ?>

      <div class="card border-0 rounded-4 p-4 bg-light">
        <div class="row g-4 align-items-center">
          <!-- Foto de perfil -->
          <div class="col-md-3 text-center">
            <img src="<?= baseUrl() ?>assets/img/default-profile.png" alt="Foto de perfil" class="img-fluid">
          </div>

          <!-- Dados pessoais -->
          <div class="col-md-9">
            <h4 class="fs-3 mb-1"><?= $dados['usuario']['nome'] ?></h4>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <p class="mb-1"><strong>Email:</strong> <?= $dados['curriculo']['email'] ?></p>
                <p class="mb-1"><strong>Telefone:</strong> <?= $dados['curriculo']['celular'] ?></p>
                <p class="mb-1"><strong>Cidade:</strong> <?= $dados['cidade']['cidade'] ?>/<?= $dados['cidade']['uf'] ?></p>
              </div>
            </div>
          </div>

          <div class="mt-4">
            <div class="px-2 bg-light fs-5">
              <p class="mb-0"><?= $dados['curriculo']['apresentacaoPessoal'] ?></p>
            </div>
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
