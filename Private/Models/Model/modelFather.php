<?php 
/**
 * Clase modelo
 */
class ModelFather extends Conection
{
	protected $result;

	protected function Read($sql)
	{
		$this->OpenConection();

		$consulta = $this->conn->query($sql);

		if ($consulta->num_rows > 0) 
		{

			if ($consulta->num_rows === 1) 
			{
				$this->result = $consulta->fetch_object();
			} 
			else if ($consulta->num_rows > 0)
			{
				while($row = $consulta->fetch_object()) 
				{
					$this->result[] = $row;
				}
			}
			
		} else {
			$this->result = 0;
		}

		return $this->result;
		$this->conn->close();
	}

	protected function LastID($sql)
	{
		$this->result = 0;

		if ($this->conn->query($sql) === TRUE) {
			$last_id = $this->conn->insert_id;
			$this->result = $last_id;
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		return $this->result;
		$this->conn->close();
	}

	protected function Query($sql)
	{
		
		if ($this->conn->query($sql) === TRUE)
		{
			echo "New record created successfully";
		} 
		else
		{
			 echo "Error: " . $sql . "<br>" . $conn->error;
		}

		return $this->result;
		$this->conn->close();
	}
	
	protected function EncriptarPass($clave)
	{
		$nivel_0 = strip_tags($clave);
		$nivel_1 = md5 ($nivel_0);
		$nivel_2 = crc32($nivel_1); 
		$nivel_3 = crypt($nivel_2, "xtemp"); 
		$clave_encriptada = sha1("xtemp".$nivel_3);
		
		return $clave_encriptada;
	}

	protected function calcularEdad($fecha) 
	{
		list($Y,$m,$d) = explode("-",$fecha);
		return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}
	
	protected function GenerarPass() //obtenemos la contraseña
	{
		//genera una letra Mayuscula aleatoria
		$letraAleatoria = chr(rand(ord("A"), ord("Z")));
		$palabra = '';
		$num = '';
		$max = 9;
		//se genera un numero aleatoria de 3 sifras
		for($i=0; $i < 3; $i++)
		{ 
			$num .= mt_rand(0, $max);
		}
		//se genera una palabra de 5 letras
		for($i=0; $i < 5; $i++)
		{ 
			$palabra .= $palabraAleatoria = chr(rand(ord("a"), ord("z")));
		}

		return $letraAleatoria . $palabra . $num;
	}

	protected function enciarCorreo($asunto,$correo,$body,$destino){
    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    /* coloca la direccion de tu correo  en la comillas simples*/
    $mail->varU = '';
    /* coloca la contraseña de tu correo  en la comillas simples*/
    $mail->varP = '';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    /* coloca la direccion de tu correo en la comillas simples */
    $mail->setFrom('', 'PAVESMATE');
    $mail->addAddress($correo);

    $mail->isHTML(true);

    $mail->Subject = $asunto;
    $mail->Body    = $body;
    if(!$mail->send()) {
        echo 'Error al enviar correo';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        header("Location: ../index.php?controller=$destino");
    }
	}

/*
	public function GenerarUser() 
	{//obtenemos el usuario
		$key = 'nd';
		$pattern = '0123456789';
		$max = strlen($pattern)-1;
		for($i=0;$i < 7;$i++) $key .= $pattern{mt_rand(0,$max)};
				
		return $key;
	}
*/
}

?>