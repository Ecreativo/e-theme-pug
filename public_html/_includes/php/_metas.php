<?php
	if(!$_REQUEST['content']){
	    $meta_titulo = 'dev.com';
	    $meta_descripcion = 'dev.com | Somos dev.com, nos encantaría saber de usted.';
	}elseif($_REQUEST['content']=='contactenos'){
		$meta_titulo = 'dev.com';
	    $meta_descripcion = 'Contáctenos para poder asesorarlo.';
		}else{
		$meta_titulo = 'dev.com';
	    $meta_descripcion = 'dev.com | Somos, nos encantaría saber de usted.';
	}
?>