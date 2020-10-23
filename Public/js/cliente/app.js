const btn = document.getElementById('btnExit');

btn.addEventListener('click', () => {
  Swal.fire({
    title: '¿Está seguro de salir?',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#27AE61',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si',
    cancelButtonText: 'No'
  }).then((result) => {
    if (result.value) {
        location.href="../../../Private/exit.php";
    }    
  })
});
