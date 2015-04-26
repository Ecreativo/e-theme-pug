<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- Begin Basic Needs Metadata -->
<title><?php if(isset($meta_titulo)){ echo "".$meta_titulo; } ?> | wiwuxboilerplate.com | wiwuxboilerplate.com</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<meta content="es" http-equiv="content-language">
<meta content="text/javascript" http-equiv="content-script-type">
<meta content="text/css" http-equiv="content-style-type">
<meta content="no" http-equiv="imagetoolbar">
<meta content="<?php echo $meta_descripcion; ?> wiwuxboilerplate.com" name="description">
<meta name="author" content="Camilo Ruiz">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="3 month">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="document-rating" content="General" >
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<?php if($_SERVER['SERVER_NAME'] == 'localhost'){?>
	<base href="http://localhost/wiwuxboilerplate.com/public_html/">
<?php }else{ ?>
	<base href="http://<?php $_SERVER['SERVER_NAME'] ?>">
<?php } ?>
<link rel="canonical" href="http://www.wiwuxboilerplate.com" />
<link rel="alternate" href="http://www.wiwuxboilerplate.com" hreflang=”es-co” />
<!-- Mobile Specific Meta -->
<!-- End Metadata -->
<!-- Begin Metadata Facebook -->
<!--<meta content="Mejorando.la: Cursos online profesionales de tecnología" property="og:title">
<meta content="website" property="og:type">
<meta content="https://mejorando.la/" property="og:url">
<meta content="Aprende desde cero a crear el futuro de la web. Cursos de programación, diseño, markerting, web, frontend, backend, móvil, UX, usabilidad. Con clases en vivo, diploma de certificación y maestros de la industria." property="og:description">
<meta content="mejorando.la" property="og:site_name">
<meta content="https://mejorando.la/static/images/home/mejorandola-facebook.jpg" property="og:image">
<meta content="1030603473" property="fb:admins">
<!-- End Metadata Facebook -->
<!-- Begin Metadata Twitter -->
<!--<meta name="twitter:card" content="nombre de la empresa" />
<meta name="twitter:description" content="" />
<meta name="twitter:site" content="@nombre de la empresa" />
<meta name="twitter:title" content="nombre de la empresa" />
<meta name="twitter:url" content="pagina web de la empresa" />
<!-- End Metadata Twitter -->

<?php require_once('includes/css.php'); ?>
</head>
