<div class="recuperar-wrapper">
  <div class="recuperar-box">
    <h3 class="mb-4 text-center">🔒 Esqueci minha senha</h3>
    <form action="<?= baseUrl() ?>login/esqueciASenhaEnvio" method="POST" novalidate>
      <div class="mb-3">
        <label for="email" class="form-label">Informe seu e-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@email.com" value="<?= setValor('email') ?>" required>
        <?= setMsgFilderError('email') ?>
      </div>
      <button type="submit" class="btn btn-primary w-100">Enviar link de recuperação</button>

      <div class="text-center mt-3">
        <small><a href="<?= baseUrl() ?>login">Voltar para o login</a></small>
      </div>
    </form>
  </div>
</div>