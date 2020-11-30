<?php
session_start();
if(isset($_SESSION['TIPO_USER'])) {
  if($_SESSION['TIPO_USER'] != 1){
    header("Location: ../ServiciosView/login.php");
  }
} else {
  header("Location: ../ServiciosView/login.php");
}

?>