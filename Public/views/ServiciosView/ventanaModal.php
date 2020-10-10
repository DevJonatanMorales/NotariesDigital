<?php 
if (isset($_GET['modelId'])) {
  echo "El id de la ventana modal es: " . $_GET['modelId'];
} else {
  echo "Hola no te rindas...";
}

?>