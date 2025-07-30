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
