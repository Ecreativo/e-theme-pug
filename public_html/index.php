<?php require_once('_includes/php/_config.php'); ?>
<!doctype html>
<!--[if lt IE 7]>      
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es">
    <![endif]-->
    <!--[if IE 7]>         
    <html class="no-js lt-ie9 lt-ie8" lang="es">
        <![endif]-->
        <!--[if IE 8]>         
        <html class="no-js lt-ie9" lang="es">
            <![endif]-->
            <!--[if gt IE 8]><!--> 
            <html class="no-js" lang="es">
                <!--<![endif]-->
                <?php require_once('_includes/_head.php'); ?>
				<body>
					<!--[if lt IE 8]>
					<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
					<![endif]-->
					<div class="loader">
			            <img src="<?php echo($link); ?>images/ajax-loader.gif" />
			            <div class="contentss" id="loadingContent">Cargando...</div>
			        </div>
                    <?php require_once('nodes/header.php'); ?>
                    <div class="container">
                    <?php
						$file = "nodes/".$_REQUEST['content'].".php";
						if(!isset($_REQUEST['content'])){
							require "nodes/home.php";
						}elseif(file_exists($file)){
							require $file;
						}else{
							require "nodes/404.php";
						}
					?>
                    <?php require_once('_includes/_footer.php'); ?>
                    </div>
                </body>
            </html>