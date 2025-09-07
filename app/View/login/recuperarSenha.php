<script type="text/javascript" src="<?= baseUrl(); ?>assets/js/usuario.js"></script>

<div class="card col-lg-5 mx-auto shadow-sm p-4" style="margin-top: 50px; border-radius: 10px; background: #fff;">
  <div class="card-header text-center border-0 pb-3">
    <h2 class="fw-bold">Recuperação de Senha</h2>
    <p class="text-muted">Olá <strong><?= htmlspecialchars($dados['nome']) ?></strong>, digite sua nova senha abaixo.</p>
  </div>
  <div class="card-body">
    <form action="<?= baseUrl() ?>login/atualizaRecuperaSenha" method="POST" id="recuperaSenhaform" novalidate>

      <input type="hidden" name="usuario_id" value="<?= htmlspecialchars($dados['id']) ?>">
      <input type="hidden" name="usuariorecuperasenha_id" value="<?= htmlspecialchars($dados['usuariorecuperasenha_id']) ?>">

      <div class="mb-4">
        <label for="NovaSenha" class="form-label fw-semibold">Nova Senha</label>
        <div class="input-group has-validation">
          <input type="password"
            class="form-control"
            id="NovaSenha"
            name="NovaSenha"
            placeholder="Digite a nova senha"
            onkeyup="checa_segur_senha('NovaSenha', 'NovaSenha2', 'msgSenhaNova', 'msgConfSenhaNova', 'btEnviar');"
            required
            aria-describedby="msgSenhaNova">
        </div>
        <div id="msgSenhaNova" class="form-text text-muted mt-1"></div>
      </div>

      <div class="mb-4">
        <label for="NovaSenha2" class="form-label fw-semibold">Confirme a Nova Senha</label>
        <div class="input-group has-validation">
          <input type="password"
            class="form-control"
            id="NovaSenha2"
            name="NovaSenha2"
            placeholder="Confirme a nova senha"
            onkeyup="checa_segur_senha('NovaSenha', 'NovaSenha2', 'msgSenhaNova', 'msgConfSenhaNova', 'btEnviar');"
            required
            aria-describedby="msgConfSenhaNova">
        </div>
        <div id="msgConfSenhaNova" class="form-text text-muted mt-1"></div>
      </div>

      <div class="d-grid">
        <button type="submit" id="btEnviar" class="btn btn-primary btn-lg" disabled>Atualizar Senha</button>
      </div>
    </form>
  </div>
</div>