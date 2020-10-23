<?php 
session_start();
session_destroy();
header("Location: ../Public/views/ServiciosView/login.php");
?>