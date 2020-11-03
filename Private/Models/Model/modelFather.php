<?php 
/** 
*
* Comentario: Clase modelo
*
**/
class ModelFather extends Conection
{
	protected $result; /** - Comentario: variable donde se almacena el resultado - **/

	protected function Read($sql)	{
		$this->OpenConection();

		$consulta = $this->conn->query($sql);

		if ($consulta->num_rows > 0) {
			$this->result = $consulta->fetch_all(MYSQLI_ASSOC);
		} else {
			$this->result = 0;
		}

		return $this->result;
		$this->conn->close();
	}

	protected function Query($sql) {
		$this->OpenConection();
		
		if ($this->conn->query($sql) === TRUE) {
			$this->result = true;
		} else {
			 echo "Error: " . $sql . "<br>" . $this->conn->error;
			 $this->result = "Error: " . $sql . "<br>" . $this->conn->errorse;
		}

		return $this->result;
		$this->conn->close();
	}

	protected function LastID($sql) {
		$this->OpenConection();
		
		if ($this->conn->query($sql) === TRUE) {
			$last_id = $this->conn->insert_id;
			$this->result = $last_id;
		} else {
			$this->result = 0;
			echo "Error: " . $sql . "<br>" . $this->conn->error;
		}

		return $this->result;
		$this->conn->close();
	}

	protected function Encryption($string){
			$output=FALSE;
			$key=hash('sha256', '$PET@STRAR');
			$iv=substr(hash('sha256', '201956'), 0, 16);
			$output=openssl_encrypt($string, 'AES-256-CBC', $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
	}

	protected function Decryption($string){
			$key=hash('sha256', '$PET@STRAR');
			$iv=substr(hash('sha256', '201956'), 0, 16);
			$output=openssl_decrypt(base64_decode($string), 'AES-256-CBC', $key, 0, $iv);
			return $output;
	}

	protected function GenerarPass() {
		//genera una letra Mayuscula aleatoria
		$letraAleatoria = chr(rand(ord("A"), ord("Z")));
		$palabra = '';
		$num = '';
		$max = 9;
		//se genera un numero aleatoria de 3 sifras
		for($i=0; $i < 3; $i++)	{ 
			$num .= mt_rand(0, $max);
		}
		//se genera una palabra de 5 letras
		for($i=0; $i < 5; $i++)	{ 
			$palabra .= $palabraAleatoria = chr(rand(ord("a"), ord("z")));
		}

		return $letraAleatoria . $palabra . $num;
	}

	protected function EnviarCorreo($asunto,$correo,$body) {
		$resultadoEmail = true;
	    $mail = new PHPMailer;

	    $mail->isSMTP();
	    $mail->Host = 'smtp.gmail.com';
	    $mail->SMTPAuth = true;
			$mail->Username = 'notariesdigital@gmail.com'; 
			$mail->Password = 'Zvbbqg345';
			$mail->SMTPSecure = 'tls'; 
			$mail->Port = 587;  

	    /* coloca la direccion de tu correo en la comillas simples */
	    $mail->setFrom('notariesdigital@gmail.com', 'NOTARIES DIGITAL');
	    $mail->addAddress($correo);

	    $mail->isHTML(true);

	    $mail->Subject = $asunto;
	    $mail->Body    = $body;

	    if(!$mail->send()) {
	        echo 'Error al enviar correo';
	        echo 'Mailer Error: ' . $mail->ErrorInfo;
	        $resultadoEmail = false;
	    } 

	    return $resultadoEmail;

	}
}

?>