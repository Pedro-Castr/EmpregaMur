<?php
$aModalidade = ["1" => "Presencial", "2" => "Semipresencial", "3" => "Remoto"];
$aVinculo = ["1" => "CLT", "2" => "PJ", "3" => "Estágio"];
$aStatusVaga = ["1" => "Pendente", "2" => "Ativa", "3" => "Fechada"];
?>

<div class="container py-4">
  <div class="card border-0 rounded-4 shadow-sm">
    <div class="card-body">
      <!-- Nome e botões de configuração -->
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center m-3">
        <h4 class="mb-3 mb-md-0"><?= $dados['vaga']['descricao'] ?></h4>

        <div>
          <a href="<?= baseUrl() ?>Vagas/form/update/<?= $dados['vaga']['vaga_id'] ?>" class="btn btn-sm btn-outline-primary me-2 mb-2 mb-md-0">
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
          <p><?= $aModalidade[$dados['vaga']['modalidade']] ?></p>
        </div>

        <div class="col-md-3">
          <strong>Vínculo</strong>
          <p><?= $aVinculo[$dados['vaga']['vinculo']] ?></p>
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
          <p><?= $aStatusVaga[$dados['vaga']['statusVaga']] ?></p>
        </div>
      </div>

      <hr>

      <?php if (count($dados['candidatos']) > 0): ?>
        <h4 class="mb-3 mb-md-0">Candidatos inscritos:</h4>
        <p class="text-muted mb-4">Você pode entrar em contato via Email ou WhatsApp</p>
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

                <div class="d-none d-md-flex">
                  <a href="mailto:<?= $candidato['email'] ?>" target="_blank" class="btn btn-sm btn-outline-primary m-2">
                    <i class="bi bi-envelope"></i> Enviar Email
                  </a>

                  <a href="https://wa.me/55<?= $candidato['celular'] ?>" target="_blank" class="btn btn-sm btn-outline-success m-2">
                    <i class="bi bi-whatsapp"></i> Enviar Mensagem
                  </a>

                  <a href="<?= baseUrl() ?>Curriculo/view/<?= $candidato['curriculum_id'] ?>" class="btn btn-sm btn-outline-dark m-2">
                    <i class="bi bi-eye-fill me-1"></i> Ver Currículo
                  </a>
                </div>

                <!-- Dropdown para telas pequenas -->
                <div class="dropdown d-md-none">
                  <button class="btn btn-primary btn-sm dropdown-toggle m-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Ações
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="mailto:<?= $candidato['email'] ?>" target="_blank">
                        <i class="bi bi-envelope"></i> Enviar Email
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="https://wa.me/55<?= $candidato['celular'] ?>" target="_blank">
                        <i class="bi bi-whatsapp"></i> Enviar Mensagem
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= baseUrl() ?>Curriculo/view/<?= $candidato['curriculum_id'] ?>">
                        <i class="bi bi-eye-fill me-1"></i> Ver Currículo
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php else: ?>
        <div class="text-center p-5">
          <h3 class="mt-3">Nenhum candidato inscrito até o momento</h3>
          <p class="text-muted">Os candidatos que se inscreverem nesta vaga serão exibidos aqui para acompanhamento.</p>
        </div>
      <?php endif; ?>

      <!-- Botão Voltar -->
      <div class="text-center mt-4">
        <a href="<?= baseUrl() . 'Perfil' ?>" class="btn btn-secondary">Voltar</a>
      </div>
    </div>
  </div>
</div>