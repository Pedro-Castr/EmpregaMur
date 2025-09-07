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

<div class="main-container container-fluid min-vh-100 d-flex flex-column align-items-center bg-light p-4">
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

            <a href="javascript:void(0);" onclick="confirmarLogout('<?= baseUrl() ?>Login/signOut')" class="btn btn-outline-dark me-2 mb-2 mb-md-0">
              <i class="bi bi-box-arrow-right"></i> Sair
            </a>
          </div>
        </div>
      </div>
    <?php else: ?>

      <div class="card border-0 rounded-4 p-2 bg-light">
        <div class="row g-4 align-items-center">
          <!-- Foto de perfil -->
          <div class="col-md-3 text-center">
            <?php if (!empty($dados['curriculo']['foto'])): ?>
              <img src="<?= baseUrl() . 'fotoPF.php?id=' . $dados['curriculo']['curriculum_id'] ?>" alt="Foto de perfil" class="img-fluid rounded-3">
            <?php else: ?>
              <img src="<?= baseUrl() ?>assets/img/default-profile.png" alt="Foto de perfil" class="img-fluid rounded-3">
            <?php endif; ?>
          </div>

          <!-- Dados pessoais -->
          <div class="col-md-9">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
              <h4 class="fs-3 mb-3 mb-md-0"><?= $dados['usuario']['nome'] ?></h4>
            </div>

            <hr>

            <div class="row">
              <div class="col-md-12">
                <p class="mb-1"><strong>Email:</strong> <?= $dados['curriculo']['email'] ?></p>
                <strong>Telefone:</strong> <span id="celular-exibicao"><?= $dados['curriculo']['celular'] ?></span>
                <p class="mb-1"><strong>Cidade:</strong> <?= $dados['cidade']['cidade'] ?>/<?= $dados['cidade']['uf'] ?></p>
              </div>
            </div>
          </div>

          <!-- Apresentação Pessoal -->
          <?php if (!empty($dados['curriculo']['apresentacaoPessoal'])): ?>
            <div class="mt-2">
              <div class="p-3">
                <h5 class="fw-semibold mb-2"><i class="bi bi-person-lines-fill me-2"></i>Apresentação Pessoal</h5>
                <p class="mb-0"><?= $dados['curriculo']['apresentacaoPessoal'] ?></p>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <hr class="my-4">

      <!-- Controle de abas -->
      <ul class="nav nav-tabs mb-3" id="UserTabs" role="tablist">
        <?php if (!empty($dados['escolaridades']) || !empty($dados['experiencias']) || !empty($dados['qualificacoes'])): ?>
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="dados-tab" data-bs-toggle="tab" data-bs-target="#dados" type="button" role="tab" aria-controls="dados" aria-selected="true">
              Dados do Usuário
            </button>
          </li>
        <?php endif; ?>

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
        <!-- Início aba de dados -->
        <div class="tab-pane fade show active" id="dados" role="tabpanel" aria-labelledby="dados">
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
          <!-- Experiências -->
          <?php if (!empty($dados['experiencias'])): ?>
            <div class="mb-4">
              <h4 class="text-primary mb-4">Expêriencias</h4>
              <?php foreach ($dados['experiencias'] as $experiencias): ?>
                <div class="card shadow-sm border-0 rounded-4 mb-3">
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
                      <div class="mt-3 mt-md-0 d-flex align-items-start gap-2">
                        <a href="<?= baseUrl() ?>Experiencias/form/update/<?= $experiencias['curriculum_experiencia_id'] ?>" class="btn btn-sm btn-outline-primary">
                          <i class="bi bi-pencil-fill me-1"></i> Editar
                        </a>
                        <a href="javascript:void(0);"
                          onclick="confirmarExclusao('<?= baseUrl() ?>Experiencias/delete', { curriculum_experiencia_id: <?= $experiencias['curriculum_experiencia_id'] ?> })"
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
          <!-- Qualificações -->
          <?php if (!empty($dados['qualificacoes'])): ?>
            <div class="mb-4">
              <h4 class="text-primary mb-4">Qualificações</h4>
              <?php foreach ($dados['qualificacoes'] as $qualificacao): ?>
                <div class="card shadow-sm border-0 rounded-4 mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between flex-column flex-md-row">
                      <div>
                        <h5 class="card-title mb-1"><?= $qualificacao['descricao'] ?></h5>
                        <p class="text-muted mb-1"><?= $qualificacao['estabelecimento'] ?></p>
                        <small class="text-muted">
                          <?= $meses[(int)$qualificacao['mes']] ?>/<?= $qualificacao['ano'] ?>
                        </small>
                      </div>
                      <div class="mt-3 mt-md-0 d-flex align-items-start gap-2">
                        <a href="<?= baseUrl() ?>Qualificacao/form/update/<?= $qualificacao['curriculum_qualificacao_id'] ?>" class="btn btn-sm btn-outline-primary">
                          <i class="bi bi-pencil-fill me-1"></i> Editar
                        </a>
                        <a href="javascript:void(0);"
                          onclick="confirmarExclusao('<?= baseUrl() ?>Qualificacao/delete', { curriculum_qualificacao_id: <?= $qualificacao['curriculum_qualificacao_id'] ?> })"
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
        </div> <!-- Fim aba de dados -->

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

        <!-- Início aba de configurações -->
        <div class="tab-pane fade" id="configuracoes" role="tabpanel" aria-labelledby="configuracoes">
          <div class="row g-4 my-4 align-items-center">
            <h2 class="text-center my-4">Configurações da Conta</h2>

            <div class="container my-2">
              <h5>Cadastre novas conquistas</h5>

              <a href="<?= baseUrl() ?>Escolaridade/form/insert/0" class="btn btn-outline-success m-2">
                <i class="bi bi-plus-lg"></i> Cadastrar Escolaridade
              </a>

              <a href="<?= baseUrl() ?>Experiencias/form/insert/0" class="btn btn-outline-success m-2">
                <i class="bi bi-plus-lg"></i> Cadastrar Experiências
              </a>

              <a href="<?= baseUrl() ?>Qualificacao/form/insert/0" class="btn btn-outline-success m-2">
                <i class="bi bi-plus-lg"></i> Cadastrar Qualificações
              </a>
            </div>

            <hr>

            <div class="col-12 my-2">
              <h5>Edite seu currículo</h5>
              <a href="<?= baseUrl() ?>Curriculo/form/update/<?= $dados['curriculo']['curriculum_id'] ?>" class="btn btn-sm btn-outline-primary m-2">
                <i class="bi bi-pencil-fill me-1"></i> Editar Currículo
              </a>
              <a href="javascript:void(0);" onclick="confirmarExclusao('<?= baseUrl() ?>Curriculo/delete', { curriculum_id: <?= $dados['curriculo']['curriculum_id'] ?> })"
                class="btn btn-sm btn-outline-danger m-2">
                <i class="bi bi-trash-fill me-1"></i> Deletar Currículo
              </a>
              <a href="<?= baseUrl() ?>Curriculo/view/<?= $dados['curriculo']['curriculum_id'] ?>" class="btn btn-sm btn-outline-success m-2">
                <i class="bi bi-eye-fill me-1"></i> Visualizar Currículo
              </a>
            </div>

            <hr>

            <div class="col-12">
              <h5>Edite seu perfil</h5>
              <a href="<?= baseUrl() ?>Perfil/form/update/<?= $dados['usuario']['usuario_id'] ?>" class="btn btn-sm btn-outline-primary m-2">
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
        </div> <!-- Fim aba de configurações -->
      </div>
    <?php endif; ?>
  </div>
</div>