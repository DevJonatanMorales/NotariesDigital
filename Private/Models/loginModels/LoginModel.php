<?php 
require_once("../../Config/config.php");
require_once("../../Conection/conection.php");
require_once("../Model/modelFather.php");

class LoginModel extends ModelFather
{
    private $datos;
    private $validacion = 'incorrecto';
    public $resultado;

    public function RecibirDatos($datos)
    {
        $this->datos = $datos;
        $this->Proceso();
    }

    private function Proceso()
    {
        switch ($this->datos['accion']) 
        {
            case 'ingresar':
                $this->ValidarDatos();
                break;
            
            default:
                echo json_encode(['result' => 'error']);
                break;
        }
    }

    private function ValidarDatos()
    {
    if (
        preg_match("/^[a-zA-Z0-9\_\-]{3,10}$/", $this->datos['user']) && 
        preg_match("/^[a-zA-Z0-9]{6,10}$/", $this->datos['pass'])
        ) {
        $this->validacion = "correcto";
    } 

    $this->ProcesarDatos();
    }

    private function ProcesarDatos()
    {
        if ($this->validacion === 'correcto') {
            $pass = $this->Encryption($this->datos['pass']);
            $sql = "SELECT usuarios.estado_id, usuarios.usuario_id, usuarios.tipo_userid, usuarios.foto FROM `usuarios` WHERE usuarios.user = '".$this->datos['user']."' AND usuarios.pass = '".$pass."'";
            $resultSQL = $this->Read($sql);

            if ($resultSQL[0]['estado_id'] == '1') {
                session_start();
                $_SESSION['USER_ID'] = $resultSQL[0]['usuario_id'];
                $_SESSION['TIPO_USER'] = $resultSQL[0]['tipo_userid'];
                $_SESSION['FOTO_USER'] = $resultSQL[0]['foto'];
                $this->PrintJSON($resultSQL[0]['tipo_userid']);
            } else {
                $this->PrintJSON(4);
            }
            
        } else {
            $this->resultado = array("resultado" => 0);
        }

    }

    private function BuscarUsuario()
    {
        $sql = "SELECT usuarios.user FROM `usuarios` WHERE usuarios.user = '" . $this->datos['query'] . "'";       
        $this->PrintJSON($this->Read($sql));
    }

    private function PrintJSON($stringJson) {
        header('Content-Type: application/json; charset=utf-8');
        $this->resultado = json_encode($stringJson);
    }
}

$login = new LoginModel();
if(isset($_POST['datos'])) {
    $login->RecibirDatos($_POST['datos']);
    echo $login->resultado;  
}

?>