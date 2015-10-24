<?php 
	require_once('_metas.php'); 
	if($_SERVER['SERVER_NAME'] == 'localhost'){
		$db_server = "localhost";
		$db_user = "root";
		$db_password = 'root';
		$db_name = "u165468089_regal";
	}else{
		$db_server = "localhost";
		$db_user = "u165468089_regal";
		$db_password = 'camilo.0723';
		$db_name = "u165468089_regal";
	}
	require_once('_conn.php'); 
	require_once('_functions.php');
	require_once('_phpmailer.php');
	///////////////// Opciones Editables /////////////////////
	$receiving_email_address = "info@wiwuxboilerplate.com";  // Establezca la dirección de correo electrónico donde desea recibir los mensajes.
	$custom_subject = "Nueva Solicitud desde [Regal Wear Online]"; // Cambie la línea de asunto del correo electrónico por su elección.
	$custom_from = "no-reply@wiwuxboilerplate.com"; // este es el correo remitente.
	if($_SERVER['SERVER_NAME'] == 'localhost'){
		define(URL_NOTIFICACION,"http://localhost/wiwuxboilerplate.com/public_html/content/email/index.php");
	}else{
		define(URL_NOTIFICACION,"http://".$_SERVER['SERVER_NAME']."/content/email/index.php");
	}
	define(EMAIL_NOTIFICACIONES,"backup@esquemacreativo.com"); // este deberia ser el mail donde recoge la base de datos
	define(FROM_NAME,"Webmaster RegalWear"); // este es el nombre del remitente
	/////////////////////////////////////////////////////////
	if($_SERVER['SERVER_NAME'] == 'localhost'){
		$link = "../content/";
		
	}else{
		$link = "http://static.".$_SERVER['SERVER_NAME']."/";
	}
?>

