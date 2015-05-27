<!DOCTYPE html>
<?php

session_start();

//Validar si se está ingresando con sesión correctamente


include("static/site_config.php");
include("static/clase_mysql.php");
$miconexion = new clase_mysql;
$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $site_name; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Maria Granda">

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    

    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
<body data-offset="40" background="images/fondotot1.jpg" style="background-attachment: fixed">
<div class="container">
<header class="header">
<div class="row">
	
	<?php
	include("include/cabecera.php");
	?>
</div>
</header>
 

  <!-- Navbar
    ================================================== -->
<?php
//include("include/menu2.php");
include("include/menu1.php");
?>
<!-- ======================================================================================================================== -->
<div class="row">
	
	<div class="span12">

		<div class="caption">
		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h3> Administración de contenido disponible en la pagina del usuario</h3>	
		<div class="well well-small">
		<hr class="soft"/>
		
		<h4>Tabla de contenidos</h4>
		<div class="row-fluid">

			<?php
			$flag=0;
			$act='';
				extract($_GET);
			/*switch ($tb) {
				case 'contenidos':

					$miconexion->consulta("select * from ".$tb."");
					
					$miconexion->verconsulta();
					# code...
					break;
				
				default:
					# code...
					break;
			}*/
			switch ($flag) {
				case '0':
					$tb="usuarios";
					$miconexion->consulta("select * from ".$tb."");
					$miconexion->verconsulta($tb);
					
					
					break;
				case '2':  //para actualizar datosss
					# code...contenidos
					extract($_GET);
					$tb = $_GET['tb'];
					
					
					$miconexion->consulta("SELECT * FROM ".$tb." WHERE id=$id");
					$miconexion->formactualizar($tb);

					break;

				case '3': //para ingresar datosss
					extract($_GET);
					$tb = $_GET['tb'];

					$miconexion->consulta("select * from ".$tb."");
					$miconexion->formingresar($tb);

					break;
				case '4':
					$tb="conferencias";
					$miconexion->consulta("select* from ".$tb."");
					$miconexion->verconsulta($tb);

					break;
				case '5':
					$tb="institucion";
					$miconexion->consulta("select* from  ".$tb."");
					$miconexion->verconsulta($tb);

					break;
				case '6':
					$tb="tinscrito";
					$miconexion->consulta("select * from ".$tb."");
					$miconexion->verconsulta($tb);

					break;
				case '7':
					$tb="curso";
					$miconexion->consulta("select * from ".$tb."");
					$miconexion->verconsulta($tb);

					break;
					
					default:
						# code...
					break;
				}
				 //para mostrar tablas con toda su información
				extract($_GET);
					if($act==1){ //eliminar datos
						$miconexion->consulta("delete from ".$tb."  where id=$id");
						$miconexion->verconsulta($tb);
						echo "<script>location.href='admin.php'</script>";
						echo '<script>alert("eliminado")</script>';
				}

			?>
		<div class="span8">
		</div>	
		</div>	
		<br/>
		
		</div>


<!--///////////////////////////////////////////////////Termina cuerpo del documento interno////////////////////////////////////////////-->
</div>

	</div>
</div>
<!-- Footer
      ================================================== -->

	<footer class="footer">

		<h5 align="center">Derechos Reservados UTPL | &copy; <?php echo $site_autor; ?></h5>
 	</footer>
</div><!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>