<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conexion_mysql.php";
    $result = "";
	
	//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario **************
    $numero = $_POST["txtnumero"];
	$numero = (int)$numero;
	$nombre = strtoupper(trim($_POST["txtnombre"]));
	$salario = $_POST["txtsalario"];
	$categoria = trim($_POST["txtcategoria"]);
    $sexo = $_POST["combo_sexo"];
	$departamento = $_POST["combo_departamento"];
	
    // Escribimos la consulta para INSERTAR LOS DATOS EN LA TABLA de empleados usando PDO *************
    $sqlINSERT1 = "INSERT INTO empleados(numero, nombre, salario, categoria, sexo, departamento) ";
	$sqlINSERT2 = $sqlINSERT1 . "VALUES ($numero, '$nombre', $salario, '$categoria', '$sexo', '$departamento')";
    // Ejecutamos la sentencia INSERT de SQL a partir de la conexión usando PDO ***********************
    $conn->exec($sqlINSERT2);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Regitro de empleados desde PHP hacia MySQL</title>

<style type="text/css" media="screen">

body { background-color:#999;}

#wrapper {
	margin: auto;
	width: 960px;
	height: 550px;
	background-color: #CCC;
	}
	
#caja1 {
	width: 300px;
	height: 50px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #FFC;
	float: left;
}

#caja2 {
	width: 300px;
	height: 50px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #FFC;
	float: left;
}

#caja3 {
	width: 300px;
	height: 50px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #FFC;
	float: left;
}

#caja4 {
	width: 940px;
	height: 450px;
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 40px;
	background-color: #333;
	clear: both;
	/*
		 position:absolute; 
		 top:200px;
		 */
		 
	position: relative;
	top: 10px;
	}
	
#imagen1 { position:relative; top:10px; right:-10px; }

#texto1 {
	width: 500px;
	height: 400px;
	margin-left: 5px;
	margin-right: 10px;
	margin-top: 10px;
	background-color: #CCC;
	padding: 5px;
	float: right;
	right: -10px;
	top: 10px;
	}
	
#AddEmpleado{ 
    position: absolute;
    right: 50px;
    border:3px solid #009;
    padding: 10px;
}

</style>

</head>

<body>

<div id="wrapper">

   <div id="caja1">Licenciatura en Tecnologías de la Información</div>
   <div id="caja2">Programación web</div>
   <div id="caja3">Formulario para alta de empleados en la base de datos desde una página web</div>
 
   <div id="caja4">
     <div id="texto1"><br>
      <p><?php echo $result;?></p>
 
        <fieldset style="width: 90%;"    >
            <legend>EMPLEADO REGISTRADO SATISFACTORIAMENTE</legend>
                <div>
                    <br />
                         <b>Departamento:</b> <?php echo ($departamento); ?>
                    <br />
                    <br />
                         <b>Número de empleado:</b> <?php echo ($numero); ?>
                    <br />
                    <br />
                         <b>Nombre de empleado:</b> <?php echo ($nombre); ?>
                    <br />
                    <br />
                         <b>Salario de empleado_:</b> <?php echo ($salario); ?>
                    <br />
                    <br />
                         <b>Categoría de empleado:</b> <?php echo ($categoria); ?>
                    <br />
                    <br />
                        <b>Sexo:</b> <?php echo ($sexo); ?>
                    <br />
                    <br />
                    <a href="alta_empleados.php">REGISTRAR OTRO EMPLEADO</a>
                </div>
        </fieldset> 
     </div>
  </div>
</div>
     <?php
			//Cerramos la oonexion a la base de datos **********************************************
			$conn = null;
     ?>
</body>
</html>