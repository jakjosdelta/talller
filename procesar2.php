<?php
	error_reporting(0);
	extract($_POST); //extraer todos los valores del metodo post del formulario de ingresar
	$bd=$_POST['bd'];
	echo "hola".$bd."<br>";
	include("static/site_config.php");
	include("static/clase_mysql.php");
	$miconexion=new clase_mysql;
	$miconexion = new clase_mysql;
	$miconexion->conectar($db_name,$db_host, $db_user,$db_password);

	$x=0;
	for ($i=0; $i <count($_POST) ; $i++) {
	
	 	$list[$x]=array_values($_POST)[$i]; //contiene los valores recogidos del formulario
	 	$x++;

	 	echo "<br> valores".$list[$i];
	}

	$sql=$miconexion->sql_ingresar($bd,$list );
	echo "admin.php?bd=$bd";
	echo "<br>".$sql;


	if(!$miconexion->consulta($sql)){
					echo ' <script language="javascript">alert("No se a podido ingresar los datos");</script> ';
				}else{
					echo ' <script language="javascript">alert("Contenido publicado con éxito");</script> ';
					echo "<script>location.href='admin.php?bd=$bd'</script>";

				}	
					


?>