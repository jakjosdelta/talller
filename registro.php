<?php
	extract($_POST);
	$realname=$_POST['realname'];
	$ape=$_POST['apellido'];
	$direc=$_POST['dir'];

	$mail=$_POST['email'];
	$ced= $_POST['cedula'];
	$institucion=$_POST['inst'];

	$tipo=$_POST['tipo'];
	$curso=$_POST['curso'];

	$conferencia=$_POST['conf'];


	require("connect_db.php");
	$validando=mysql_query("SELECT * FROM usuarios WHERE correo='$mail' or cedula='$ced'");
	$check_validar=mysql_num_rows($validando);

			if($check_validar>0){
				echo ' <script language="javascript">alert("Atencion, ya existe un Usuario registrado con este # de cedula o el mismo correo, verifique sus datos");</script> ';
			}else{
				//require("connect_db.php");
				mysql_query("INSERT INTO usuarios VALUES('','$realname','$ape','$direc','$mail','$ced','$institucion,'$curso','$tipo','$conferencia')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				mysql_close($link);
			}

				
				
			
			
		

	
?>