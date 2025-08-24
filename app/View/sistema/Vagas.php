<?php

use Core\Library\Session;

$tipo = Session::get('userTipo');

$aModalidade  = ["1" => "Presencial", "2" => "Semipresencial", "3" => "Remoto"];
$aVinculo  = ["1" => "CLT", "2" => "PJ", "3" => "Estágio"];
?>

<?php if (count($dados['vagas']) > 0): ?>
  <form action="<?= baseUrl() ?>Vagas" method="post">
    <div class="container-fluid py-5 px-lg-5">
      <h1 class="mb-4 text-center">Vagas de Emprego</h1>
      <p class="text-center text-muted mb-4">Encontre oportunidades que combinam com o seu perfil profissional</p>

      <!-- Barra de busca -->
      <div class="input-group w-75 mx-auto mb-3">
        <input type="text" name="pesquisa" placeholder="Buscar vagas..." value="<?= $dados['pesquisa'] ?>" class="form-control" />
        <button type="submit" class="btn btn-primary btn-sm px-4">
          <i class="bi bi-search"></i>
        </button>
      </div> <!-- Fim barra de busca -->

      <!-- Filtros -->
      <div class="row g-4">
        <div class="col-lg-2 order-1 order-lg-1 mb-3 mb-lg-0">
          <div class="card p-3">
            <h5 class="mb-3">Filtros</h5>

            <!-- Vínculo -->
            <div class="mb-3">
              <strong>Vínculo</strong>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="vinculo[]" value="1" id="clt"
                  <?= in_array(1, $dados['filtros']['vinculo'] ?? []) ? 'checked' : '' ?>>
                <label class="form-check-label" for="clt">CLT</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="vinculo[]" value="2" id="pj"
                  <?= in_array(2, $dados['filtros']['vinculo'] ?? []) ? 'checked' : '' ?>>
                <label class="form-check-label" for="pj">PJ</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="vinculo[]" value="3" id="estagio"
                  <?= in_array(3, $dados['filtros']['vinculo'] ?? []) ? 'checked' : '' ?>>
                <label class="form-check-label" for="estagio">Estágio</label>
              </div>
            </div>

            <!-- Modalidade -->
            <div class="mb-3">
              <strong>Modalidade</strong>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="modalidade[]" value="1" id="presencial"
                  <?= in_array(1, $dados['filtros']['modalidade'] ?? []) ? 'checked' : '' ?>>
                <label class="form-check-label" for="presencial">Presencial</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="modalidade[]" value="2" id="semipresencial"
                  <?= in_array(2, $dados['filtros']['modalidade'] ?? []) ? 'checked' : '' ?>>
                <label class="form-check-label" for="semipresencial">Semipresencial</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="modalidade[]" value="3" id="remoto"
                  <?= in_array(3, $dados['filtros']['modalidade'] ?? []) ? 'checked' : '' ?>>
                <label class="form-check-label" for="remoto">Remoto</label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-2">Filtrar</button>

            <a href="<?= baseUrl() ?>Vagas" class="btn btn-secondary w-100">Limpar</a>
          </div>
        </div> <!-- Fim filtros -->

        <!-- Lista de vagas -->
        <div class="col-lg-10 order-2 order-lg-2">
          <div class="row g-4">
            <?php foreach ($dados['vagas'] as $value): ?>
              <div class="col-md-6 col-lg-6">
                <div class="card vaga-card h-100">
                  <div class="card-body">
                    <h5 class="card-title"><?= $value['descricao'] ?></h5>
                    <p class="card-text text-muted small"><?= $value['nome_estabelecimento'] ?></p>
                    <p class="card-text"><?= $value['sobreaVaga'] ?></p>
                    <span class="badge bg-primary me-2"><?= $aModalidade[$value['modalidade']] ?></span>
                    <span class="badge bg-success"><?= $aVinculo[$value['vinculo']] ?></span>
                  </div>
                  <?php if ($tipo == 'PF'): ?>
                    <div class="card-footer bg-transparent text-end">
                      <?php if ($value['candidatado']): ?>
                        <button class="btn btn-sm btn-success" disabled>Já Candidatado</button>
                      <?php else: ?>
                        <button class="btn btn-sm btn-outline-success" onclick="confirmarCandidatura(<?= $value['vaga_id'] ?>, <?= $dados['curriculum_id'] ?>)">
                          Candidatar a Vaga
                        </button>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div> <!-- Fim lista de vagas -->
      </div> <!-- Fim container fluid -->
  </form>
<?php else: ?>
  <div class="container py-5">
    <form action="<?= baseUrl() ?>Vagas" method="post" class="mb-3">
      <div class="input-group w-75 mx-auto">
        <input type="text" name="pesquisa" placeholder="Buscar vagas..." value="<?= htmlspecialchars($pesquisa ?? '') ?>" class="form-control" />

        <button type="submit" class="btn btn-primary btn-sm px-3">
          <i class="bi bi-search"></i>
        </button>

        <a href="<?= baseUrl() ?>Vagas" class="btn btn-secondary btn-sm d-flex align-items-center justify-content-center px-3">
          <i class="bi bi-x-lg me-1"></i>
        </a>
      </div>
    </form>

    <div class="text-center p-5">
      <h3 class="mt-3">Nenhuma vaga disponível no momento</h3>
      <p class="text-muted">Estamos atualizando nossas oportunidades. Volte em breve para conferir novas vagas.</p>
      <a href="<?= baseUrl() ?>" class="btn btn-primary mt-3">
        <i class="bi bi-arrow-left"></i> Voltar à página inicial
      </a>
    </div>
  </div>
<?php endif; ?>
</div>
</div>
