function showToast(mensagem, tipo) {
  let backgroundColor = '#d0e1ff';
  let textColor = '#0c5460';

  switch (tipo) {
    case 'success':
      backgroundColor = '#d4edda';
      textColor = '#155724';
      break;
    case 'error':
      backgroundColor = '#f8d7da';
      textColor = '#721c24';
      break;
    case 'warning':
      backgroundColor = '#fff3cd';
      textColor = '#856404';
      break;
    case 'info':
    default:
      backgroundColor = '#d1ecf1';
      textColor = '#0c5460';
  }

  Toastify({
    text: mensagem,
    duration: 4000,
    gravity: 'top',
    position: 'center',
    stopOnFocus: true,
    style: {
      background: backgroundColor,
      color: textColor,
      borderRadius: '12px',
    },
  }).showToast();
}
