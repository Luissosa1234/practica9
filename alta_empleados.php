<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "paginas/conn_mysql_alan.php";
    $result = "";

    // Escribimos la consulta para recuperar los departamentos de la tabla departamentos **************
    $sql = 'SELECT id_municipio, municipio FROM municipios';
    // Almacenamos los resultados de la consulta en una variable llamada $smtp a partir de la conexión
    $stmt = $conn->query($sql);
    // Recuperamos los valores de los registros de la tabla que ya están en la variable $stmt
    $rows = $stmt->fetchAll();
	// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
    if (empty($rows)) {
        $result = "No se encontraron resultados !!";
    }
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

<script language="javascript">
  <!--
	  function ValidaFormulario()
	  {
		 //Recuperamos lo elegido en el combo de los municipio
		 var municipio = document.getElementById("combo_municipio").selectedIndex;
		 //Recuperamos lo escrito en la caja del número de empleado:
		 var valoridcine = document.getElementById("txt_id_cine").value;
		 //Recuperamos lo escrito en la caja del nombre del empleado:
		 var valorcine = document.getElementById("txt_nombre_cine").value;
		 //Recuperamos lo escrito en la caja del salario del empleado:
		 var valordomicilio = document.getElementById("txt_domicilio_cine").value;
		 //Recuperamos lo escrito en la caja de la categoría del empleado:
		 var valortelefono = document.getElementById("txt_telefono_cine").value;
		 /* recupera los datos de correo */
		 var valorcorreo = document.getElementById("txt_correo_cine").value;
		 //Recuperamos lo elegido en el combo de los sexos
		 var salas = document.getElementById("combo_sala").selectedIndex;	
		 //VALIDACIONES *****************************************************************
		 //Caja de Texto ****************************************************************
         if(valoridcine == null || valoridcine.length == 0 || /^\s+$/.test(valoridcine)) 
		 {
			 alert("Debes escribir el número de empleado");
			 document.getElementById("txt_id_cine").focus();
             return false;
		 } else if (valorcine == null || valorcine.length == 0 || /^\s+$/.test(valorcine)){
			 alert("Debes escribir el nombre del empleado");
			 document.getElementById("txt_nombre_cine").focus();
             return false;	 
	     } else if (valordomicilio == null || valordomicilio.length == 0 || /^\s+$/.test(valordomicilio)){
			 alert("Debes escribir el salario del empleado");
			 document.getElementById("txt_domicilio_cine").focus();
             return false;
		 } else if (valortelefono == null || valortelefono.length == 0 || /^\s+$/.test(valortelefono)){
			 alert("Debes escribir la categoría del empleado");
			 document.getElementById("txt_telefono_cine").focus();
             return false;
		} else if (valorcorreo == null || valorcorreo.length == 0 || /^\s+$/.test(valorcorreo)){
			 alert("Debes escribir un correo");
			 document.getElementById("txt_correo_cine").focus();
             return false;	 	 
		 //Cajas de Selección (Combo Box) ****************************************************************
         } else if (salas == null || salas == 0){
			 alert("Debes elegir un salas");
			 document.getElementById("combo_sala").focus();
             return false;
		 } else if (municipio == null || municipio == 0){
			 alert("Debes elegir un municipio");
			 document.getElementById("combo_municipio").focus();
             return false;
         } //Cuando ya están contestadas todas las cajas de texto y seleccionados los combobox enviamos el form
			 return true; 
	  }
  //-->
</script>

</head>

<body>

<div id="wrapper">

   <div id="caja1">Licenciatura en Tecnologías de la Información</div>
   <div id="caja2">Programación web</div>
   <div id="caja3">Formulario para alta de empleados en la base de datos desde una página web</div>
 
   <div id="caja4">
     <div id="texto1"><br>
      <p><?php echo $result;?></p>
 
        <fieldset style="width: 90%; font-weight: bold;"    >
            <legend>REGISTRAR UN NUEVO EMPLEADO</legend>
          <form action="paginas/grabar_empleado.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
                <div>
                    <br />
                      <label for="municipio">Municipio:</label>
                      <select name="combo_municipio" id="combo_municipio">
                      <option value="0">-- Selecciona un Municipio --</option>
                        <?php 
						     foreach ($rows as $row) 
						     {
                                echo '<option value="'.$row['id_municipio'].'">'.$row['municipio'].'</option>';
                             }
					    ?>
                      </select>
                    <br />
                    <br />
                         Número de Cine: 
                         <input type="text" name="txt_id_cine" id="txt_id_cine" size="10">
                    <br />
                    <br />
                         Nombre de Cine: 
                         <input type="text" name="txt_nombre_cine" id="txt_nombre_cine" size="40">
                    <br />
                    <br />
                         Domicilio de Cine: 
                         <input type="text" name="txt_domicilio_cine" id="txt_domicilio_cine" size="15">
                    <br />
                    <br />
                         Telefono de Cine: 
                         <input type="text" name="txt_telefono_cine" id="txt_telefono_cine" size="40">
                    <br />
                    <br />
					<br />
                         Correo de Cine: 
                         <input type="text" name="txt_correo_cine" id="txt_correo_cine" size="40">
                    <br />
                        Sexo:<!-- Caja de Selección o ComboBox -->
                        <select name="combo_sala" id="combo_sala">
                          <option value="0">-- Numero de salas --</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
						  <option value="20">20</option>
						  <option value="25">25</option>
						  <option value="30">30</option>
						</select>
                    <br />
                    <br />
                      <input type="submit" name="AddEmpleado" id="AddEmpleado" value="  Registrar este empleado " />
                    <br />
                </div>
            </form>
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