<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class DarBajaAbogado extends ModelFather
{
  public $resultado;
  private $datos;
  private $query = false;

  public function RecibirDatos($datos)
  {
    $this->datos = $datos;
    $this->Accion();
  }

	private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
  
  private function Accion()
  {
    switch ($this->datos['accion']) {
      case 'mostrar':
        $this->query = true;
        $this->Mostrar();
        break;
      
      case 'buscar':
        $this->query = true;
        $this->Buscar();
        break;

      case 'activo':
        $this->query = true;
        $this->Activar();
        break;

      case 'inactivo':
        $this->query = true;
        $this->Desactivar();
        break;
    }
  }

  private function Mostrar()
  {
    if ($this->query == true) {
      $sql = "SELECT usuarios.usuario_id, estado_user.estado_id, usuarios.foto, usuarios.user, abogados.nombres, estado_user.estado FROM usuarios INNER JOIN abogados ON usuarios.usuario_id=abogados.usuario_id INNER JOIN estado_user ON usuarios.estado_id=estado_user.estado_id";

      $this->PrintJSON($this->Read($sql));
      $this->query = false;
    }
  }

  private function Buscar()
  {
    if ($this->query == true) {
      $sql = "SELECT usuarios.usuario_id, estado_user.estado_id, usuarios.foto, usuarios.user, abogados.nombres, estado_user.estado FROM usuarios INNER JOIN abogados ON usuarios.usuario_id=abogados.usuario_id INNER JOIN estado_user ON usuarios.estado_id=estado_user.estado_id WHERE usuarios.user LIKE '%".$this->datos['valor']."%' OR abogados.nombres LIKE '%".$this->datos['valor']."%' OR estado_user.estado LIKE '%".$this->datos['valor']."%'";

      $this->PrintJSON($this->Read($sql));
      $this->query = false;
    }
  }

  private function Activar()
  {
    if ($this->query == true) {
      $sql = "UPDATE `usuarios` SET `estado_id`='1' WHERE `usuario_id`='".$this->datos['userId']."'";
       if ($this->Query($sql) == true) {
         $this->PrintJSON(1);
       } else {
         $this->PrintJSON(0);
       }
      $this->query = false;
    }
  }

  private function Desactivar()
  {
    if ($this->query == true) {
      $sql = "UPDATE `usuarios` SET `estado_id`='2' WHERE `usuario_id`='".$this->datos['userId']."'";
       if ($this->Query($sql) == true) {
         $this->PrintJSON(1);
       } else {
         $this->PrintJSON(0);
       }
      $this->query = false;
    }
  }
}

$darBajaAbogado = new DarBajaAbogado();

if (isset($_POST['datos'])) {
  $darBajaAbogado->RecibirDatos($_POST['datos']);
  echo $darBajaAbogado->resultado;
}

?>