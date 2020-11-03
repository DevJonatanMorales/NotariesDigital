<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class Historial extends ModelFather
{
  public $resultado;
  private $datos;

  public function RecibirDatos($datos)
  {
    $this->datos = $datos;
    $this->Accion();
  }

  private function Accion()
  {
    switch ($this->datos['accion']) {

      case 'buscarHistorial':
        $this->BuscarHistorial();
        break;
      
      case 'historial':
        $this->MostrarHistorial();
        break;
    }
  }

  private function MostrarHistorial()
  {
    session_start();
    $sql = "SELECT abogados.nombres, servicios.nom_servicio, servicios.des_servicio FROM `abogados` INNER JOIN `tramites` ON abogados.abogado_id=tramites.abogado_id INNER JOIN `servicios` ON tramites.servicio_id=servicios.servicios_id WHERE tramites.cliente_id = '".$_SESSION['USER_ID']."'";

    $this->PrintJSON($this->Read($sql));
  }

  private function BuscarHistorial()
  {
    session_start();
    
    $sql = "SELECT abogados.nombres, servicios.nom_servicio, servicios.des_servicio FROM `abogados` INNER JOIN `tramites` ON abogados.abogado_id=tramites.abogado_id INNER JOIN `servicios` ON tramites.servicio_id=servicios.servicios_id WHERE tramites.cliente_id = '".$_SESSION['USER_ID']."' AND servicios.nom_servicio LIKE '%". $this->datos['sql'] . "%' OR abogados.nombres LIKE '%". $this->datos['sql'] . "%'";

    $this->PrintJSON($this->Read($sql));
  }

  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }

}

$historial = new Historial();

if(isset($_POST['datos']))
{
  $historial->RecibirDatos($_POST['datos']);
  echo $historial->resultado;
} else {
  $datos = array('accion' => 'mostrar');
  $historial->RecibirDatos($datos );
  echo $historial->resultado;
}

?>