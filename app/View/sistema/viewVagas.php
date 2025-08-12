<div class="container py-4">
  <div class="card border-0 rounded-4 shadow-sm">
    <div class="card-body">
      <!-- Nome e botões de configuração -->
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center m-3">
        <h4 class="mb-3 mb-md-0"><?= $dados['vaga']['descricao'] ?></h4>

        <div>
          <a href="<?= baseUrl() ?>Vagas/form/update/<?= $dados['vaga']['vaga_id'] ?>"class="btn btn-sm btn-outline-primary me-2 mb-2 mb-md-0">
            <i class="bi bi-pencil-fill me-1"></i> Editar Vaga
          </a>

          <a href="javascript:void(0);" onclick="confirmarExclusao('<?= baseUrl() ?>Vagas/delete', { vaga_id: <?= $dados['vaga']['vaga_id'] ?> })"
            class="btn btn-sm btn-outline-danger me-2 mb-2 mb-md-0">
            <i class="bi bi-trash-fill me-1"></i> Excluir Vaga
          </a>
        </div>
      </div>

      <hr>

      <!-- Dados da Vaga -->
      <div class="row gx-4 gy-3">
        <div class="col-md-12">
          <strong>Sobre a Vaga</strong>
          <p class="text-muted m-2"><?= $dados['vaga']['sobreaVaga'] ?></p>
        </div>

        <div class="col-md-3">
          <strong>Modalidade</strong>
          <p>
            <?php
              switch ($dados['vaga']['modalidade']) {
                case '1': echo 'Presencial'; break;
                case '2': echo 'Semipresencial'; break;
                case '3': echo 'Remoto'; break;
                default:  echo '-';
              }
            ?>
          </p>
        </div>

        <div class="col-md-3">
          <strong>Vínculo</strong>
          <p>
            <?php
              switch ($dados['vaga']['vinculo']) {
                case '1': echo 'CLT'; break;
                case '2': echo 'PJ'; break;
                case '3': echo 'Estágio'; break;
                default:  echo '-';
              }
            ?>
          </p>
        </div>

        <div class="col-md-2">
          <strong>Data de Início</strong>
          <p><?= date('d/m/Y', strtotime($dados['vaga']['dtInicio'])) ?></p>
        </div>

        <div class="col-md-2">
          <strong>Data Final</strong>
          <p><?= date('d/m/Y', strtotime($dados['vaga']['dtFim'])) ?></p>
        </div>

        <div class="col-md-2">
          <strong>Status</strong>
          <p>
            <?php
              switch ($dados['vaga']['statusVaga']) {
                case '1': echo 'Pendente'; break;
                case '2': echo 'Ativa'; break;
                case '3': echo 'Fehcada'; break;
                default:  echo '-';
              }
            ?>
          </p>
        </div>
      </div>

      <hr>

      <h4 class="mb-3 mb-md-0">Candidatos inscritos:</h4>
      <div class="container my-4">
        <ul class="list-group list-group-flush">
          <?php foreach ($dados['candidatos'] as $candidato): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">

              <!-- Foto, nome e data -->
              <div class="d-flex align-items-center">
                <?php if (!empty($candidato['foto'])): ?>
                  <img src="<?= baseUrl() . 'fotoPF.php?id=' . $candidato['curriculum_id'] ?>" alt="Foto de perfil" class="rounded-circle me-3"
                    style="width: 50px; height: 50px; object-fit: cover;">
                <?php else: ?>
                  <img src="<?= baseUrl() ?>assets/img/default-profile.png" alt="Sem foto" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                <?php endif; ?>

                <div>
                  <strong><?= $candidato['nome'] ?></strong><br>
                  <small class="text-muted">
                    <?= date('d/m/Y H:i', strtotime($candidato['dateCandidatura'])) ?>
                  </small>
                </div>
              </div>

              <!-- Botão Ver Currículo -->
              <a href="<?= baseUrl() ?>Curriculo/view/<?= $candidato['curriculum_id'] ?>" class="btn btn-sm btn-outline-success m-2">
                <i class="bi bi-eye-fill me-1"></i> Ver Currículo
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Botão Voltar -->
      <div class="text-center mt-4">
        <a href="<?= baseUrl() . 'Perfil' ?>" class="btn btn-secondary">Voltar</a>
      </div>
    </div>
  </div>
</div>
