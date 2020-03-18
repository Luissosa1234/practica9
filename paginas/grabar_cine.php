<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conn_mysql_alan.php";
    $result = "";
	
	//Recuperamos los valores de las cajas de texto y de los demás objetos de formulario **************
    $numero = $_POST["txt_id_cine"];
	$numero = (int)$numero;
	$nombre = strtoupper(trim($_POST["txt_nombre_cine"]));
	$domicilio = $_POST["txt_domicilio_cine"];
	$telefono = trim($_POST["txt_telefono_cine"]);
	$correo = $_POST["txt_correo_cine"];


	/* estos son los combos */
	$sala = $_POST["combo_sala"];
	$sala = (int)$sala;
	$municipio = $_POST["combo_municipio"];
	

	
    // Escribimos la consulta para INSERTAR LOS DATOS EN LA TABLA de empleados usando PDO *************
    $sqlINSERT1 = "INSERT INTO cines (id_cine, id_municipio, nombre_cine, no_salas, domicilio_cine, telefono_cine, correo_cine) ";
	$sqlINSERT2 = $sqlINSERT1 . "VALUES ('$numero', '$municipio','$nombre','$sala', '$domicilio', '$telefono','$correo'  )";
    // Ejecutamos la sentencia INSERT de SQL a partir de la conexión usando PDO ***********************
    $conn->exec($sqlINSERT2);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Regitro de empleados desde PHP hacia MySQL</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>

<header class="logo">
         <img src="../img/logo.png" alt="cinepolis">
        
            </header>


<div id="wrapper">

   
   <div id="caja4">
     <div id="texto1"><br>
      <p><?php echo $result;?></p>
 
        <fieldset style="width: 90%;"    >
            <legend>Cine Registrado Correctamente</legend>
                <div>
                    <br />
                         <b>Número de Cine:</b> <?php echo ($numero); ?>
                    <br />
                    <br />
                         <b>Municipio:</b> <?php echo ($municipio); ?>
                    <br />
                    <br />
                         <b>Nombre de Cine:</b> <?php echo ($nombre); ?>
                    <br />
                    <br />
                        <b>Numero de Salas:</b> <?php echo ($sala); ?>
                    <br />
                    <br />
                         <b>Domicilio:</b> <?php echo ($domicilio); ?>
                    <br />
                    <br />
                         <b>Telefono:</b> <?php echo ($telefono); ?>
                    <br />
					<br />
                         <b>Correo:</b> <?php echo ($correo); ?>
                    <br />
                    <br />
                    <a href="../alta_cine.php">REGISTRAR OTRO CINE</a>
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