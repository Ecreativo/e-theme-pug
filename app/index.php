<?php require_once('_includes/_config.php'); ?>
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
					<div class="loader loader--background">
	                    <div class="loader--content">
		                    <img src="<?=($link); ?>images/ajax-loader.gif" />
							<div class="loader--text" id="loadingContent">Cargando...</div>
	                    </div>
                    </div>
                    <?php require_once('_includes/_header.php'); ?>
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
                    </div>					
                    <?php require_once('_includes/_footer.php'); ?>
				</body>
            </html>