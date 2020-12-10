<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class MostrarPerfil extends ModelFather
{
  public $resultado;
  private $datos;
  private $query = false;

  public function RecibirDatos($datos)
  {
    $this->datos = $datos;
    $this->Accion();
  }

  private function Accion(){
    switch ($this->datos['accion']) {
      case 'mostrar':
        $this->query = true;
        $this->Mostrar();
        break;
      
      default:
        # code...
        break;
    }
  }

  private function Mostrar()
  {
    session_start();
    
    $sql = "SELECT abogados.nombres, abogados.apellidos, abogados.genero, abogados.fech_naci, abogados.telefono, abogados.despacho, usuarios.foto, usuarios.user, usuarios.email FROM usuarios INNER JOIN abogados ON usuarios.usuario_id=abogados.usuario_id WHERE usuarios.usuario_id = '".$_SESSION['USER_ID']."'";

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