<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class PerfilUser extends ModelFather
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
        $this->MostrarPerfil();
        break;
      
      case 'editar':
        $this->EditarPerfil();
        break;

      case 'conf':
        $this->CambiarClave();
        break;

      case 'foto':
        $this->cambiarFoto();
        break;
    }
  }

  private function MostrarPerfil()
  {
    session_start();
    
    $sql = "SELECT clientes.nombres, clientes.apellidos, clientes.genero, clientes.fech_naci, clientes.telefono, clientes.direccion, usuarios.foto, usuarios.user, usuarios.email FROM usuarios INNER JOIN clientes ON usuarios.usuario_id=clientes.usuario_id WHERE usuarios.usuario_id = '".$_SESSION['USER_ID']."'";

    $this->PrintJSON($this->Read($sql));

  }

  private function EditarPerfil()
  {
    session_start();
    
    $sqlUser = "UPDATE `usuarios` SET `user`='".$this->datos['user']."',`email`='".$this->datos['correo']."' WHERE `usuario_id` = '".$_SESSION['USER_ID']."'";

    if ($this->Query($sqlUser) == true) {
      $sqlCLiente = "UPDATE `clientes` SET `telefono`='".$this->datos['telefono']."',`direccion`='".$this->datos['direccion']."' WHERE `usuario_id` = '".$_SESSION['USER_ID']."'";

      if ($this->Query($sqlCLiente) == true) {
        $this->PrintJSON(['result' => 1]);
      } else {
        $this->PrintJSON(['result' => 0]);
      }
    } else {
      $this->PrintJSON(['result' => 0]);
    }
  }

  private function PrintJSON($stringJson) {
    header('Content-Type: application/json; charset=utf-8');
    $this->resultado = json_encode($stringJson);
  }
}

$perfilUser = new PerfilUser();

if(isset($_POST['datos'])) {
  $perfilUser->RecibirDatos($_POST['datos']);
  echo $perfilUser->resultado;    
}

?>