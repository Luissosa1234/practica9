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
<link rel="stylesheet" href="css/style.css">
<!-- enlace de el archivo javascript con las funciones de validacion -->
<script src="js/funciones.js" language="javascript"></script>

</head>

<body>

<header class="logo">
         <img src="img/logo.png" alt="cinepolis">
        
            </header>

			<h3 class="centrar">Por fabor llene todos los campos con *</h3>
    <form action="grabar_informacionSESION5.php" method="post" id="form_vendiendo_motos">
        <div class="principal colorear">
            <div class="ncampos">
      

            </div>

<div id="wrapper">


 
   <div id="caja4">
     <div id="texto1"><br>
      <p><?php echo $result;?></p>
 
        <fieldset style="width: 90%; font-weight: bold;"    >
            <legend>REGISTRAR UN NUEVO CINE</legend>
          <form action="paginas/grabar_cine.php" method="post" id="formulario1" onsubmit="return ValidaFormulario()">
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
                         Correo de Cine: 
                         <input type="text" name="txt_correo_cine" id="txt_correo_cine" size="40">
                    <br />
					<br />
                        Numero de Salas:<!-- Caja de Selección o ComboBox -->
                        <select name="combo_sala" id="combo_sala">
                          <option value="0">-- Numero de salas --</option>
                          <option value=10>10</option>
                          <option value=15>15</option>
						  <option value=20>20</option>
						  <option value=25>25</option>
						  <option value=30>30</option>
						</select>
                    <br />
                    <br />
                      <input type="submit" name="AddEmpleado" id="AddEmpleado" value="  Registrar este cine" />
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