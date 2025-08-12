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
        <ul class="list-group mb-3">
          <?php foreach ($dados['candidatos'] as $candidato): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span><?= $candidato['nome'] ?></span>
              <small class="text-muted">
                <?= date('d/m/Y H:i', strtotime($candidato['dateCandidatura'])) ?>
              </small>
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
