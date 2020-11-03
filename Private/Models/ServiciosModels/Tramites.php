<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class Tramites extends ModelFather
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
      case 'mostrarTramites':
        $this->MostrarTramites();
        break;
      case 'buscarTramites':
        $this->BuscarTramites();
        break;      
    }
  }

  private function MostrarTramites()
  {
    $sql = "SELECT servicios.servicios_id, servicios.nom_servicio, categorias.categoria, servicios.des_servicio FROM categorias INNER JOIN servicios on categorias.categoria_id=servicios.categoria_id  WHERE categorias.categoria_id = '".$this->datos['categoria']."'";

    $this->PrintJSON($this->Read($sql));
  }
  
  private function BuscarTramites(){
    $sql = "SELECT servicios.servicios_id, servicios.nom_servicio, categorias.categoria, servicios.des_servicio FROM categorias INNER JOIN servicios on categorias.categoria_id=servicios.categoria_id  WHERE categorias.categoria_id = '".$this->datos['categoria']."' AND servicios.nom_servicio LIKE '%". $this->datos['sql'] . "%'";

    $this->PrintJSON($this->Read($sql));
  }
  
  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }

}

$tramites = new Tramites();

if(isset($_POST['datos']))
{
  $tramites->RecibirDatos($_POST['datos']);
  echo $tramites->resultado;
}

?>