<?php if($_SERVER['SERVER_NAME'] == 'localhost' && $_SERVER['PHP_SELF'] == '/dev.com/app/index.php'){ ?>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= $link?>css/vendor/bootstrap.css" async="async">
	<link rel="stylesheet" href="<?= $link?>css/vendor/bootstrap-theme.css" async="async">
	
	<!-- Vendor -->
	<link href="<?= $link?>css/vendor/venobox.css" rel="stylesheet" async="async">
	
	<!-- ilpingenieria.com -->
	<link rel="stylesheet" href="<?= $link?>css/style.css">
<?php }else{ ?>
	<!-- theme Style Compiled -->
	<link href="<?= $link?>css/style.css" rel="stylesheet" async="async">
<?php } ?>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->