<?php
	require_once('easily.php');
	
	$interaccion = array(
		"1"=>"Cotización, Información de productos",
		"2"=>"Servicio al Cliente",
		"3"=>"NewsLetter",
		
		
		
	);
	
	// Procesamiento del formulario de contacto
	if($_POST['consulta']=='contact-form'){
		
		// Determinación de variables
		$tipo = $_POST['tipo'];
		$nombre = strtoupper($_POST['nombre']);
		$apellido = strtoupper($_POST['apellido']);
		$email = strtolower($_POST['email']);
		$telefono = strtoupper($_POST['telefono']);
		$ciudad = strtoupper($_POST['ciudad']);
		$direccion = strtoupper($_POST['direccion']);
		$mensaje = $_POST['mensaje'];
		
		// Sentencia SQL
		$sql = "
			INSERT INTO 
				contactos (
					nombre,
					apellido,
					email,
					telefono,
					ciudad,
					direccion,
					mensaje,
					tipo
				) VALUES (
					'$nombre',
					'$apellido',
					'$email',
					'$telefono',
					'$ciudad',
					'$direccion',
					'$mensaje',
					'$tipo'
				)
			";
		
		$q = mysqli_query($con,$sql);
		
		if(!$q){
			echo "
			<div class='alert alert-danger' id='contacterror'><strong>Upss!</strong> Se ha presentado un error procesando su solicitud. Por favor inténtelo de nuevo.</div>
			";
		}else{			
			$id=mysqli_insert_id($con);
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			$url=URL_NOTIFICACION;
			$html=file_get_contents($url);
			$contenido="
				<p>A continuación la información relacionada:</p>
				<p>
					<b>Tipo:</b><br />$interaccion[$tipo]
				</p>
				<p>
					<b>Nombre:</b><br />$nombre $apellido
				</p>
				<p>
					<b>Teléfono:</b><br />$telefono
				</p>
				<p>
					<b>Email:</b><br />$email
				</p>
				<p>
					<b>Falla:</b><br />$mensaje
				</p>
			";
			$html=str_replace("{{contenido}}",$contenido,$html);       
			$mail = new PHPMailer();
			$mail->From = $custom_from;
			$mail->FromName = utf8_decode(FROM_NAME);
			$mail->Subject = utf8_decode('['.$id.'] '.$custom_subject.' '.$nombre.' '.$apellido);
			$mail->Body = utf8_decode($html);
			$mail->IsHTML(true);
			$mail->AddAddress("$receiving_email_address");
			$mail->AddBCC(EMAIL_NOTIFICACIONES);		
		    $mail->AddReplyTo($email);
			if(!$sent_mail= $mail->Send()){
				echo "
			<div class='alert alert-danger' id='contacterror'><strong>Upss!</strong> Se ha presentado un error procesando su solicitud. Por favor inténtelo de nuevo.</div>
			";
			}else{
				echo "
				<div class='alert alert-success' id='contactsuccess'>
                       Gracias por escribirnos <strong>$nombre.</strong> Hemos recibido su mensaje y pronto estaremos en contacto.
                    </div>
                ";
			}
		}
	}
