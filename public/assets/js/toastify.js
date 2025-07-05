function showToast(msg, tipo = 'info') {
  let borderColor = '#0d6efd'; // azul para info (padrão)
  let textColor = '#000';

  switch (tipo) {
    case 'success':
      borderColor = '#28a745';
      break;
    case 'error':
      borderColor = '#dc3545';
      break;
    case 'warning':
      borderColor = '#ffc107';
      break;
    case 'info':
    default:
      borderColor = '#0d6efd';
  }

  Toastify({
    text: msg,
    duration: 2000,
    gravity: 'top',
    position: 'center',
    stopOnFocus: true,
    close: true,
    style: {
      background: '#fff',
      color: textColor,
      border: `2px solid ${borderColor}`,
      boxShadow: `0 0 10px ${borderColor}`,
    },
  }).showToast();
}
