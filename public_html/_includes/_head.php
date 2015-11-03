<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
<!-- Begin Basic Needs Metadata -->
<title><?php if(isset($meta_titulo)){ echo "".$meta_titulo; } ?> | dev.com | dev.com</title>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<meta content="es" http-equiv="content-language">
<meta content="text/javascript" http-equiv="content-script-type">
<meta content="text/css" http-equiv="content-style-type">
<meta content="no" http-equiv="imagetoolbar">
<meta content="<?php echo $meta_descripcion; ?> dev.com" name="description">
<meta name="author" content="Camilo Ruiz">
<meta name="robots" content="index, follow">
<meta name="revisit-after" content="3 month">
<!-- Mobile Specific Meta -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="document-rating" content="General" >
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!-- End Metadata -->

<!-- Favicons -->
<link rel="apple-touch-icon" sizes="57x57" href="/ico/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/ico/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/ico/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/ico/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/ico/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/ico/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/ico/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/ico/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/ico/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/ico/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/ico/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/ico/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/ico/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/ico/manifest.json">
<link rel="shortcut icon" href="/ico/favicon.ico">
<meta name="apple-mobile-web-app-title" content="Wiwux">
<meta name="application-name" content="Wiwux">
<meta name="msapplication-TileColor" content="#000000">
<meta name="msapplication-TileImage" content="/ico/mstile-144x144.png">
<meta name="msapplication-config" content="/ico/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<!-- Place favicon.ico in the root directory -->

<?php if($_SERVER['SERVER_NAME'] == 'localhost'){?>
	<base href="http://localhost/dev.com/build/development/">
<?php }else{ ?>
	<base href="http://<?php $_SERVER['SERVER_NAME'] ?>">
<?php } ?>
<link rel="canonical" href="//www.dev.com">
<link rel="alternate" href="//www.dev.com" hreflang=”es-co”>

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

<?php require_once('_includes/_css.php'); ?>
<script src="<?php echo($link); ?>js/head.js"></script>
</head>