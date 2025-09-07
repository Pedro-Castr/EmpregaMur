<div class="main-container login-wrapper">
  <div class="login-box">
    <h3 class="text-center mb-4">Acesse sua conta</h3>
    <form action="login/signIn" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= setValor('email') ?>" required>
      </div>
      <div class="mb-1">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" required>
      </div>
      <div class="text-end mb-3">
        <a href="<?= baseUrl() ?>Login/esqueciASenha" class="link-secondary" style="font-size: 0.9rem;">Esqueci minha senha</a>
      </div>
      <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
    <div class="text-center mt-3">
      <small>Não tem uma conta? <a href="<?= baseUrl() ?>cadastro">Cadastre-se</a></small>
    </div>
  </div>
</div>