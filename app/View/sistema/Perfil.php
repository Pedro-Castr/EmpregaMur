<div class="container-fluid min-vh-100 d-flex flex-column justify-content-center align-items-center bg-light p-4">
  <div class="w-100" style="max-width: 800px;">

    <!-- Foto e Informações Pessoais -->
    <div class="d-flex flex-column flex-md-row align-items-center gap-4 mb-4">
      <img src="https://randomuser.me/api/portraits/men/35.jpg" class="rounded-1 shadow" alt="Foto de Perfil" width="150" height="150">
      <div>
        <h2 class="text-primary mb-2"><?= $dados['nome'] ?></h2>
        <p class="fs-5 mb-1"><strong>Email:</strong> <?= $dados['login'] ?></p>
        <p class="fs-5 mb-1"><strong>Telefone:</strong> (11) 91234-5678</p>
        <p class="fs-5"><strong>Cidade:</strong> Mogi das Cruzes - SP</p>
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

    <!-- Botões de Cadastro -->
    <div class="mb-5">
      <h4 class="text-primary mb-3">Cadastrar Informações</h4>
      <div class="d-flex flex-wrap gap-2">
        <a href="<?= baseUrl() ?>curriculo/form/insert/0" class="btn btn-outline-secondary">Cadastrar Currículo</a>
        <a href="#" class="btn btn-outline-secondary">Cadastrar Escolaridade</a>
        <!-- Experiência já cadastrada, botão oculto -->
        <a href="#" class="btn btn-outline-secondary">Cadastrar Qualificação</a>
      </div>
    </div>

    <hr class="my-4">

    <!-- Ações da Conta -->
    <div class="d-flex justify-content-between">
      <a href="#" class="btn btn-outline-primary">Editar Conta</a>
      <a href="<?= baseUrl() ?>Login/signOut" class="btn btn-danger">Sair</a>
    </div>

  </div>
</div>
