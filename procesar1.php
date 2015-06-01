<?php
	error_reporting(0);
	extract($_POST); //extraer todos los valores del metodo post del formulario de actualizar
	$bd=$_POST['bd'];
	echo "hola".$bd."<br>";
	include("static/site_config.php");
	include("static/clase_mysql.php");
	$miconexion=new clase_mysql;
	$miconexion = new clase_mysql;
	$miconexion->conectar($db_name,$db_host, $db_user,$db_password);
	$miconexion->consulta("Select * FROM ".$db_name.".".$bd."");
	for ($i=0; $i <$miconexion->numcampos(); $i++) { 
		$atrib = $miconexion->nombrecampo($i);
		//echo "ATRIB  ".$miconexion->nombrecampo($i); 
		$columnas[$i]=$atrib;
		//echo $columnas[$i]."<br>"; IMPRIME
		# code...
	}

	$x=0;
	for ($i=0; $i <count($_POST) ; $i++) {
	
	 	$list[$x]=array_values($_POST)[$i]; //contiene los valores recogidos del formulario
	 	$x++;
	 	//echo $list[$x]."<br>"; IMPRIME
	 	echo array_values($_POST)[$i]."<br>";
	 } 
		# code...
	
	 	//echo $columnas[0];
	$sql=$miconexion->sql_actualizar($bd,$list, $columnas);
	echo "admin.php?bd=$bd";
	echo "<br>".$sql;

	if(!$miconexion->consulta($sql)){
					echo ' <script language="javascript">alert("No se a podido ingresar los datos");</script> ';
				}else{
					echo ' <script language="javascript">alert("Contenido publicado con éxito");</script> ';
					echo "<script>location.href='admin.php?bd=$bd'</script>";

				}	
?>