function showToast(msg, tipo = 'info') {
  let backgroundColor = '#739ad3';

  switch (tipo) {
    case 'success':
      backgroundColor = '#63da7f';
      break;
    case 'error':
      backgroundColor = '#e4606d';
      break;
    case 'warning':
      backgroundColor = '#ffd761';
      break;
    case 'info':
    default:
      backgroundColor = '#739ad3';
  }

  Toastify({
    text: msg,
    duration: 2000,
    gravity: 'top',
    position: 'center',
    stopOnFocus: true,
    close: true,
    style: {
      background: backgroundColor,
      color: '#ffffff',
      borderRadius: '8px',
    },
  }).showToast();
}
