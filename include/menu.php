<!DOCTYPE html>


  <link rel="stylesheet" href="css/cssmenu/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>

<body>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/cssmenu1/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>


<div id='cssmenu'>
<?php
    menu_cabeza(0, 1);
    function menu_cabeza($padre, $level) {
      $query = "select a.id, a.titulo, a.ruta, Deriv1.Count 
                FROM menus a LEFT OUTER JOIN (
                SELECT id_padre, COUNT(*) AS Count FROM menus GROUP BY id_padre) 
                Deriv1 ON a.id = Deriv1.id_padre WHERE a.posicion = 'cabeza' 
                and  a.id_padre=".$padre." ORDER BY a.jerarquia ASC";
      $result = mysql_query($query) or die("error". mysql_error());
      echo "<ul>";
      while ($row = mysql_fetch_assoc($result)) {
        if ($row['Count'] > 0) {
          echo "<li class='active has-sub'><a href='" . $row['ruta'] . "'>" . $row['titulo'] . "</a>";
          menu_cabeza($row['id'], $level + 1);
          echo "</li>";
        } elseif ($row['Count']==0) {
          echo "<li><a href='" . $row['ruta'] . "'>" . $row['titulo'] . "</a></li>";
        } else;
      }
      echo "</ul>";
    }
  ?>
<ul class="nav pull-right">

           <li><a href="static/desconectar_usuario.php"> Cerrar Cesión </a></li>          
      </ul>
</div>

</body>
</html>