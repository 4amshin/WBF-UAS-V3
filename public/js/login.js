
//menampilkan alert dialog ketika login gagal
document.addEventListener('DOMContentLoaded', () => {
    const errorMessageElement = document.getElementById('error-message');
    const errorMessage = errorMessageElement.dataset.errorMessage;
  
    if (errorMessage) {
      alert(errorMessage);
    }
  });
  