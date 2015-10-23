<?php require_once('includes/php/_easily.php'); ?>
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
                <?php require_once('nodes/head.php'); ?>
				<body>
					<div class="loader">
			            <img src="http://static.<?php echo($_SERVER['SERVER_NAME']); ?>/img/ajax-loader.gif" />
			            <div class="contentss" id="loadingContent">Cargando...</div>
			        </div>
                    <?php require_once('nodes/header.php'); ?>
                    <div class="container">
                    <?php if(!isset($_REQUEST['content'])){
                        require_once('nodes/home.php');
                        }elseif($_REQUEST['content']=='servicios'){
                        require_once('nodes/servicios.php');
                        }elseif($_REQUEST['content']=='contactenos'){
                        require_once('nodes/contactenos.php');
                        }else{
                        require_once('nodes/home.php');
                        } ?>
                    <?php require_once('nodes/footer.php'); ?>
                    </div>
                </body>
            </html>