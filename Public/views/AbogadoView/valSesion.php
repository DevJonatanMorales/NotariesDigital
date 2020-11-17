<?php
session_start();
if(isset($_SESSION['TIPO_USER'])) {
  if($_SESSION['TIPO_USER'] != 2){
    header("Location: ../ServiciosView/login.php");
  }
} else {
  header("Location: ../ServiciosView/login.php");
}

?>