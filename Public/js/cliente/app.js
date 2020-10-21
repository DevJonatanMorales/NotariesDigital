$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

const btn = document.getElementById('btnExit');

btn.addEventListener('click', () => {
  location.href="../../../Private/exit.php";
});
