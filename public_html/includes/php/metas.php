<?php
	if(!$_REQUEST['content']){
	    $meta_titulo = 'wiwuxboilerplate.com';
	    $meta_descripcion = 'wiwuxboilerplate | Somos, nos encantaría saber de usted.';
	}elseif($_REQUEST['content']=='contactenos'){
		$meta_titulo = 'wiwuxboilerplate.com';
	    $meta_descripcion = 'Contáctenos para poder asesorarlo.';
		}else{
		$meta_titulo = 'wiwuxboilerplate.com';
	    $meta_descripcion = 'wiwuxboilerplate | Somos, nos encantaría saber de usted.';
	}
?>