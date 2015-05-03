<?php if($_SERVER['SERVER_NAME'] == 'localhost'){ ?>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="../css/vendor/bootstrap.min.css">
	<link rel="stylesheet" href="../css/vendor/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/main.css">
	<!-- Icon Fonts -->
	<link href="../content/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
	
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="bootstrap/js/html5shiv.js"></script>
	<script src="bootstrap/js/respond.min.js"></script>
	<![endif]-->

<?php }else{ ?>
	<!-- Icon Fonts -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<!-- theme Style Compiled -->
	<link href="http://static.wiwuxboilerplate.com/css/style.css" rel="stylesheet">
	
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


<?php } ?>


<style >
.nav {
list-style: none outside none;
}
.loader{
background: rgba(0,0,0,0.7);
position: fixed;
width: 100%;
height: 100%;
z-index: 100000;
}
.loader img{
position: relative;
left: 50%;
top: 50%;
margin: -25px 0 0 -25px;
}
.loader .contentss {
position: relative;
text-align: center;
color: #fff;
margin-left: 10px;
top: 50%;
}
</style>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../content/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
