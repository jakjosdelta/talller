<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EL PORTAL DE CONFERENCIAS</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">HOME</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>EL PORTAL DE CONFERENCIAS</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">Joseph Godoy, María Isabel Granda</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo date("Y-m-d"); ?></p>

                <hr>

                <!-- Preview Image -->
                <form method="post" action="" >
                      <fieldset>
                      <center>
                        <legend  style="color:#000000;"><b>Formulario de registro</b></legend>
                        </center>
                        <div class="form-group">
                          <label style="font-size: 14pt; color: #000000; "><b>Ingresa su nombre</b></label>
                          <input type="text" name="realname" class="form-control"  required placeholder="Ingresa tu nombre" requires/>
                        </div>
                        <div class="form-group">
                          <label style="font-size: 14pt; color: #000000; "><b>Ingresa su apellido</b></label>
                          <input type="text" name="apellido" class="form-control" placeholder="Ingresa tu apellido" required/>
                        </div>
                        <div class="form-group">
                          <label style="font-size: 14pt;color: #000000;"><b>Ingrese dirección</b></label>
                          <input type="text" name="dir" class="form-control"  required placeholder="Ingresa direccion"/>
                        </div>
                        <div class="form-group">
                          <label style="font-size: 14pt;color: #000000;"><b>Ingresa tu correo</b></label>
                          <input type="email" name="email" class="form-control"  placeholder="Ingresa tu correo"  required/>
                        </div>
                        <div class="form-group">
                          <label style="font-size: 14pt;color: #000000;"><b>Ingresa tu cédula</b></label><br>
                          <input type="text" name="cedula" value="" required maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Ingresa tu cedula"  >  
                        </div>
                        <div class="form-group">
                          <label style="font-size: 14pt;color: #000000; "><b>Selecciona Intitucion</b></label><br>

                                <SELECT NAME="inst">
                                <?php 
                                require("connect_db.php");
                                $valores=mysql_query("select id,nombre from institucion");
                                while($row = mysql_fetch_array($valores))
                                {
                                echo'<OPTION VALUE="'.$row['id_institucion'].'">'.$row['nombre'].'</OPTION>';
                                }
 
                           // ?>
                        </SELECT>
                          
                        </div>
                        <div class="form-group">
                          <label style="font-size: 14pt;color: #000000; "><b>Tipo de inscrito</b></label><br>

                                <SELECT name="tipo">
                                <?php 
                                require("connect_db.php");
                                $valores=mysql_query("select id,tipo from tinscrito");
                                while($row = mysql_fetch_array($valores))
                                {
                                echo'<OPTION VALUE="'.$row['id'].'">'.$row['tipo'].'</OPTION>';
                                }
 
                           // ?>
                        </SELECT>
                          
                        </div>
                        <div class="form-group">
                          <label style="font-size: 14pt;color: #000000; "><b>curso</b></label><br>

                                <SELECT name="curso">
                                <?php 
                                require("connect_db.php");
                                $valores=mysql_query("select id,nombre from curso");
                                while($row = mysql_fetch_array($valores))
                                {
                                echo'<OPTION VALUE="'.$row['id'].'">'.$row['nombre'].'</OPTION>';
                                }
 
                           // ?>
                        </SELECT>
                          
                        </div>
                        <div class="form-group">
                          <label style="font-size: 14pt;color: #000000; "><b>Conferencias</b></label><br>

                                <SELECT name="conf">

                                <?php 

                                require("connect_db.php");
                                $valores=mysql_query("select id,nombre from conferencias");
                                while($row = mysql_fetch_array($valores))
                                {
                                echo'<OPTION VALUE="'.$row['id'].'">'.$row['nombre'].'</OPTION>';
                                }


                           // ?>
                                
                                </SELECT>
                               
                          
                        </div>
                        <input  class="btn btn-primary" type="submit" name="submit" value="Registrarse"/>
                          
                                               
                        

                      </fieldset>
                </form>
                </div>
                        <?php
                             if(isset($_POST['submit'])){
                               require("registro.php");
                           }
                        ?>

                <hr>

                <!-- Post Content -->
                
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; WEB jpgodoy</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
