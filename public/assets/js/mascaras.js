// Máscara para CPF
function aplicarMascaraCPF(input) {
  if (!input) return;

  const aplicar = (valor) => {
    valor = valor.replace(/\D/g, '');
    if (valor.length > 11) valor = valor.slice(0, 11);
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    return valor;
  };

  input.value = aplicar(input.value);

  input.addEventListener('input', () => {
    input.value = aplicar(input.value);
  });

  input.form?.addEventListener('submit', () => {
    input.value = input.value.replace(/\D/g, '');
  });
}

// Máscara para CEP
function aplicarMascaraCEP(input) {
  if (!input) return;

  const aplicar = (valor) => {
    valor = valor.replace(/\D/g, '');
    if (valor.length > 8) valor = valor.slice(0, 8);
    valor = valor.replace(/^(\d{5})(\d)/, '$1-$2');
    return valor;
  };

  input.value = aplicar(input.value);

  input.addEventListener('input', () => {
    input.value = aplicar(input.value);
  });

  input.form?.addEventListener('submit', () => {
    input.value = input.value.replace(/\D/g, '');
  });
}

// Máscara para Celular
function aplicarMascaraCelular(input) {
  if (!input) return;

  const aplicar = (valor) => {
    valor = valor.replace(/\D/g, '');
    if (valor.length > 11) valor = valor.slice(0, 11);
    valor = valor.replace(/^(\d{2})(\d)/, '($1) $2');
    valor = valor.replace(/(\d{5})(\d)/, '$1-$2');
    return valor;
  };

  input.value = aplicar(input.value);

  input.addEventListener('input', () => {
    input.value = aplicar(input.value);
  });

  input.form?.addEventListener('submit', () => {
    input.value = input.value.replace(/\D/g, '');
  });
}

window.aplicarMascaraCPF = aplicarMascaraCPF;
window.aplicarMascaraCEP = aplicarMascaraCEP;
window.aplicarMascaraCelular = aplicarMascaraCelular;

// Função para formatar o número de exibição na página perfil
function formatarCelular(celular) {
  celular = celular.replace(/\D/g, '');
  if (celular.length === 11) {
    return celular.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
  } else if (celular.length === 10) {
    return celular.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
  }
  return celular;
}

document.addEventListener('DOMContentLoaded', () => {
  const telEl = document.getElementById('celular-exibicao');
  if (telEl) {
    const textoOriginal = telEl.innerText;
    const match = textoOriginal.match(/\d{10,11}/); // extrai número
    if (match) {
      const numero = match[0];
      const numeroFormatado = formatarCelular(numero);
      telEl.innerHTML = `<strong>Telefone:</strong> ${numeroFormatado}`;
    }
  }
});
