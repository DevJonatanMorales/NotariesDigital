<?php require_once("./valSesion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <?php require_once("../Layout/head.php"); ?>
  <link rel="stylesheet" type="text/css" href="../../css/admin/menu.css">
</head>

<body>
  <?php 
		$link= "Inicio";
		require_once("../Layout/adminMenu.php");
	?>
  <div class="container my-4">
    <h1 class="text-center">Bienvenido administrador</h1>
  </div>

  <script src="../../js/admin/app.js"></script>
</body>

</html>