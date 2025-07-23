function confirmarExclusao(url, data = {}) {
  Swal.fire({
    title: 'Tem certeza?',
    text: 'Essa ação é irreversível!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sim, excluir',
    cancelButtonText: 'Cancelar',
  }).then((result) => {
    if (result.isConfirmed) {
      // Converte o objeto JS em dados de formulário
      const formData = new URLSearchParams();
      for (const key in data) {
        formData.append(key, data[key]);
      }

      fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData.toString(),
      })
        .then((response) => {
          if (response.redirected) {
            window.location.href = response.url;
          } else {
            Swal.fire('Erro', 'Não foi possível excluir.', 'error');
          }
        })
        .catch(() => {
          Swal.fire('Erro', 'Algo deu errado ao enviar a solicitação.', 'error');
        });
    }
  });
}
