<?php
  use Core\Library\Request;
  $request = new Request();

  use Core\Library\Session;
  $usuarioId = Session::get('userId');
?>

<script type="text/javascript" src="<?= baseUrl(); ?>assets/js/usuario.js"></script>

<div class="container py-3">
  <h2 class="my-3 text-center">Editar Perfil</h2>
  <p class="text-muted text-center">Atualize seu nome e, se desejar, altere sua senha.</p>

  <form method="POST" action="<?= $this->request->formAction() ?>" class="bg-white p-4 rounded shadow-sm">

    <?php if (in_array($this->request->getAction(), ['update'])): ?>
      <input type="hidden" name="usuario_id" id="usuario_id" value="<?= setValor("usuario_id") ?>">
    <?php endif; ?>

    <input type="hidden" name="usuario_id" value="<?= $usuarioId ?>">

    <div class="mb-3">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" value="<?= setValor("nome") ?>" required>
      <?= setMsgFilderError("nome") ?>
    </div>

    <hr>

    <h5 class="mb-3">Alterar Senha</h5>

    <div class="mb-3">
      <label for="senhaAtual" class="form-label">Senha Atual</label>
      <input type="password" class="form-control" id="senhaAtual" name="senhaAtual" placeholder="Digite sua senha atual">
      <?= setMsgFilderError("senhaAtual") ?>
    </div>

    <div class="mb-3">
      <label for="novaSenha" class="form-label">Nova Senha</label>
      <input type="password" class="form-control" id="novaSenha" name="novaSenha" placeholder="Digite a nova senha"
      onkeyup="checa_segur_senha('novaSenha', 'confirmaNovaSenha', 'msgSenha', 'msgConfSenha', 'salvarAlteracoes');" >
      <small id="msgSenha" class="mt-3"></small>
    </div>

    <div class="mb-3">
      <label for="confirmaNovaSenha" class="form-label">Repita a Nova Senha</label>
      <input type="password" class="form-control" id="confirmaNovaSenha" name="confirmaNovaSenha" placeholder="Repita a nova senha"
      onkeyup="checa_segur_senha('novaSenha', 'confirmaNovaSenha', 'msgSenha', 'msgConfSenha', 'salvarAlteracoes');" >
      <small id="msgConfSenha" class="mt-3"></small>
    </div>

    <a href="<?= baseUrl() . $request->getController(); ?>" class="btn btn-secondary">Voltar</a>
    <button type="submit" id="salvarAlteracoes" class="btn btn-primary">Salvar Alterações</button>
  </form>
</div>
