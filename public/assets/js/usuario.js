function checa_segur_senha(idSenha, idConfSenha, campoMsgSenha, campoMsgConfSenha, bBotEnviar) {
  var senha = document.getElementById(idSenha).value;
  var confirma = document.getElementById(idConfSenha).value;

  var entrada = 0;
  var senhaOk = false;
  var confirmacaoOk = false;

  var resultadoSenha = '';
  var resultadoConf = '';

  // Verifica força da senha
  if (senha.length < 7) entrada--;
  if (!senha.match(/[a-z_]/i) || !senha.match(/[0-9]/)) entrada--;
  if (!senha.match(/\W/)) entrada--;

  if (entrada == 0) {
    resultadoSenha = "A segurança de sua senha é: <b><font color='#99C55D'>EXCELENTE</font></b>";
    senhaOk = true;
  } else if (entrada == -1) {
    resultadoSenha = "A segurança de sua senha é: <b><font color='#7F7FFF'>BOA</font></b>";
    senhaOk = true;
  } else if (entrada == -2) {
    resultadoSenha = "A segurança de sua senha é: <b><font color='#FF5F55'>RUIM</font></b>";
  } else if (entrada <= -3) {
    resultadoSenha = "A segurança de sua senha é: <b><font color='#A04040'>MUITO RUIM</font></b>";
  }

  document.getElementById(campoMsgSenha).innerHTML = resultadoSenha;

  // Verifica se as senhas coincidem
  if (confirma.length > 0) {
    if (senha !== confirma) {
      resultadoConf = "<font color='red'>As senhas não coincidem</font>";
      confirmacaoOk = false;
    } else {
      resultadoConf = '';
      confirmacaoOk = true;
    }

    document.getElementById(campoMsgConfSenha).innerHTML = resultadoConf;
  } else {
    document.getElementById(campoMsgConfSenha).innerHTML = '';
  }

  // Ativa ou desativa o botão passado por parâmetro
  var botao = document.getElementById(bBotEnviar);
  botao.disabled = !(senhaOk && confirmacaoOk);
}
