<!DOCTYPE html>
<html>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<script src="../bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
<body>

</body>
</html>
<?php
 class clase_mysql{
 	/*Variables para la conexion a la db*/
 	var $BaseDatos;
 	var $Servidor;
 	var $Usuario;
 	var $Clave;
 	/*Identificadores de conexion y consulta*/
 	var $Conexion_ID = 0;
 	var $Consulta_ID = 0;
 	/*Numero de error y error de textos*/
 	var $Errno = 0;
 	var $Error = "";
 	function clase_mysql(){
 		//cosntructor
 	}

 	function conectar($db, $host, $user, $pass){
 		if($db!="") $this->BaseDatos = $db;
 		if($host!="") $this->Servidor = $host;
 		if($user!="") $this->Usuario = $user;
 		if($pass!="") $this->Clave = $pass;

 		//conectamos al servidor de db
 		$this->Conexion_ID=mysql_connect($this->Servidor,$this->Usuario, $this->Clave);
 		if(!$this->Conexion_ID){
 			$this->Error="La conexion con el servidor fallida";
 			return 0;
 		}

		//Seleccionamos la base de datos
		if(!mysql_select_db($this->BaseDatos, $this->Conexion_ID)){
			$this->Error="Imposible abrir ".$this->BaseDatos;
 			return 0;
		} 	
		/*Si todo tiene exito, retorno el identificador de la conexion*/
 		return $this->Conexion_ID;
 	}	

 	//Ejecuta cualquier consulta
 	function consulta($sql=""){
 		if($sql==""){
 			$this->Error="NO hay ningun sql";
 			return 0;
 		}
 		//ejecutamos la consulta
 		$this->Consulta_ID = mysql_query($sql, $this->Conexion_ID);
 		if(!$this->Consulta_ID){
 			$this->Errno = mysql_errno();
 			$this->Error = mysql_error();
 		}
 		//retorna la consulta ejecutada
 		return $this->Consulta_ID;
 	}

 	//Devulve el numero de campos de la culsulta
 	function numcampos(){
 		return mysql_num_fields($this->Consulta_ID);
 	}

 	//Devuleve el numero de registros de la culsulta
 	function numregistros(){
 		return mysql_num_rows($this->Consulta_ID);
 	}

 	//Devuelve el nombre de un campo de la consulta
 	function nombrecampo($numcampo){
 		return mysql_field_name($this->Consulta_ID, $numcampo);
 	}



 	//Muestra los resultados de la consulta
 	function verconsulta($tb){

 		extract($_GET);

 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table';>";
 		if ($tb!='comentarios') {
 			echo "<label align='center'><a href='admin.php?flag=3&tb=$tb'><img src='images/write.png' width='50' class='img-rounded'>Insertar datos</a></label>";

 		}
 		
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";
 			echo "<td>Editar</td>";
 			
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr class='success'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			if ($tb=='comentarios') {
 				echo "<td><a href='admin.php?id=$row[0]&act=1&tb=$tb'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 				# code...
 			}else{
 			echo "<td><a href='admin.php?id=$row[0]&act=1&tb=$tb'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			echo "<td><a href='admin.php?id=$row[0]&flag=2&tb=$tb'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 			}
 				
 			echo "</tr>";
 		}

 		echo "</table>";
 		

 		echo "</div>";
 	}

 	function verconsulta2(){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover';>";

 		echo "<label align='center'><a href='agap_nav_aside.php'><img src='images/write.png' width='50' class='img-rounded'>Insertar datos</a></label>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";
 			echo "<td>Editar</td>";	
 				
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr class='success'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='navaside.php?id=$row[0]&act=1'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			echo "<td><a href='actualizar_nav_aside.php?id=$row[0]&act=2'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 			
 				
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}

 	function menus(){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover';>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";
 			echo "<td>Editar</td>";	
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr class='success'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='admin_menus.php?id=$row[0]&act=1'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			echo "<td><a href='actualizar_menus.php?id=$row[0]&act=2'><img src='images/actualizar.gif' class='img-rounded'></a></td>";
 				
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}


 	function comentario(){
 		echo "<div class='table-responsive'>";
 		echo "<table  class='table'>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=1; $i < $this->numcampos(); $i++) {

 			echo "<td>".$this->nombrecampo($i)."</td>";
			
 		}
 			
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr>";
 			for ($i=1; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";

 			} 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}

function comentarioadmin(){
 		echo "<div class='table-responsive'>";
 		echo "<table border='1'; class='table table-hover';>";
 		echo "<tr class='warning'>";
 		//mostrar los nombres de los campos
 		for ($i=0; $i < $this->numcampos(); $i++) { 
 			echo "<td>".$this->nombrecampo($i)."</td>";
 		}
 			echo "<td>Borrar</td>";	
 		echo "</tr>";
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
 			echo "<tr class='success'>";
 			for ($i=0; $i < $this->numcampos(); $i++) { 
 				echo "<td>".$row[$i]."</td>";
 			}
 			echo "<td><a href='admin_comentarios.php?id=$row[0]&act=1'><img src='images/eliminar.png' class='img-rounded'></a></td>";
 			
 				
 				
 			echo "</tr>";
 		}
 		echo "</table>";
 		echo "</div>";
 	}



 	function consulta_lista(){
		while ($row = mysql_fetch_array($this->Consulta_ID)) {
			for ($i=0; $i < $this->numcampos(); $i++) { 
				$row[$i];
			}
			return $row;
		}
	}

	function formingresar($tb){
 		extract($_GET);
		echo "<form class='navbar-form navbar-left' action='procesar2.php' method='post'>";
 		echo "<input type='hidden' name='bd' value=$tb >";
 		echo"<fieldset>";
  		echo "<div class='form-group'>";
  		if ($tb=='bloques'){	

 				for ($i=1; $i < $this->numcampos(); $i++) {
 						if ($i==3) {

 						echo $this->nombrecampo($i).":<br> <SELECT name=".$this->nombrecampo($i)." SIZE=1><br>";
 													echo "<option>derecha</option>";
 													echo "<option>izquierda</option>";
 													echo "</SELECT> <br>";
  					# code...
  						}else{
 							echo $this->nombrecampo($i).":<br> <input name='".$this->nombrecampo($i)."' placeholder='".$this->nombrecampo($i)."'><br>";

  						}
  				}
 			
  		}elseif ($tb=='menus'){	

 				for ($i=1; $i < $this->numcampos(); $i++) {
 					if ($i==6) {

 						echo $this->nombrecampo($i).":<br> <SELECT name=".$this->nombrecampo($i)." SIZE=1><br>";
 													echo "<option>1</option>";
 													echo "<option>2</option>";
 													echo "</SELECT> <br>";

  						}else{
  							if ($i==5) {

 							echo $this->nombrecampo($i).":<br> <SELECT name=".$this->nombrecampo($i)." SIZE=1><br>";
 													echo "<option>cabeza</option>";
 													echo "<option>izquierda</option>";
 													echo "</SELECT> <br>";

  					
  							}else{
 							echo $this->nombrecampo($i).":<br> <input name='".$this->nombrecampo($i)."' placeholder='".$this->nombrecampo($i)."'><br>";

  							}
  						}
  				}
 			
 			
  		}elseif ($tb=='contenidos'){	
 				
 				for ($i=1; $i < $this->numcampos(); $i++) {

 						if ($i==3) {
 							echo $this->nombrecampo($i).":<br> <input  type='date' min=".date("Y-m-d")." name='".$this->nombrecampo($i)."' ><br>";
 						
  					# code...
  						}else{
 							echo $this->nombrecampo($i).":<br> <input name='".$this->nombrecampo($i)."' placeholder='".$this->nombrecampo($i)."'><br>";

  							}
  				} 			
 			
  		}else{
  			
  			for ($i=1; $i < $this->numcampos(); $i++) { 
 			echo $this->nombrecampo($i).":<br> <input name='".$this->nombrecampo($i)."' placeholder='".$this->nombrecampo($i)."'><br>";
 			
 			}
  		}
 		//echo "VALOR1:<br> <input name='5' type='date'><br>";
	  echo "</div>";
	  echo "<button class='btn btn-default' type='submit'>Guardar</button>";
	  
	echo"</fieldset>";
	echo "</form>";
	
 	}
 	function sql_ingresar($nom, $val){
 		$b="";
 		$sql="insert into ".$nom." values ('".$b;
 			for ($i=1; $i <count($val) ; $i++) {
 				$sql=$sql."','".$val[$i]; 
 				# code...
 			}
 			$sql=$sql."');";
 			return $sql;

 	}

 	function formactualizar($tb){ //formulario que muestra los datos para actualizar
 		while ($row = mysql_fetch_array($this->Consulta_ID)) {
		echo "<form action='procesar1.php' method='post'>";
		
		$i=0;
		echo $this->nombrecampo($i).":<br> <input type='text' name='".$this->nombrecampo($i)."' value='".$row[$i]."' readonly='readonly' ><br>";

 		for ($i=1; $i < $this->numcampos(); $i++) {

 			echo $this->nombrecampo($i).":<br> <input type='text' name='".$this->nombrecampo($i)."' value='".$row[$i]."' ><br>";
 			//$row[$i]=$this->nombrecampo($i);
 		}
 	}
 		echo "<button class='btn btn-default' type='submit'>Guardar</button>";
		//echo "<input type='hidden' name='lista1' value='".$this->consulta_lista()."' >";		
		echo "<input type='hidden' name='bd' value=$tb >";
		
 		echo "</form>";
 	} 	
 	function sql_actualizar($nom, $val, $col){
 		$sql="update ".$nom." set ".$col[1]."= '".$val[1];
 		 	for ($i=2; $i < count($col); $i++) {
 		 		$sql=$sql."', ".$col[$i]."= '".$val[$i]; 
 			}
 			$sql= $sql."' where ".$col[0]." = ".$val[0];
 			return $sql;
 	}
 
 }
?>