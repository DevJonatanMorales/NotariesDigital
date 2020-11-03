<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class MostrarPerfil extends ModelFather
{
  
  private $validacion = 'incorrecto';
  private $datos;
  public  $resultado;

  public function RecibirDatos($datos)
  {
    $this->datos = $datos;
    $this->Accion();
  }

  private function Accion()
  {
    switch ($this->datos['accion']) {
      case 'mostrar':
        $this->MostrarUser();
        break;
    }
  }

  private function MostrarUser()
  {
    session_start();
    
    $sql = "SELECT clientes.nombres, clientes.apellidos, clientes.genero, clientes.fech_naci, clientes.telefono, clientes.direccion, usuarios.foto, usuarios.user, usuarios.email FROM usuarios INNER JOIN clientes ON usuarios.usuario_id=clientes.usuario_id WHERE usuarios.usuario_id = '".$_SESSION['USER_ID']."'";

    $this->PrintJSON($this->Read($sql));

  }

  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$mostrarPerfil = new MostrarPerfil();

if(isset($_POST['datos'])) {
  $mostrarPerfil->RecibirDatos($_POST['datos']);
  echo $mostrarPerfil->resultado;    
}

?>