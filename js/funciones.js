
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
			 alert("Debes escribir el número de Cine");
			 document.getElementById("txt_id_cine").focus();
             return false;
		 } else if (valorcine == null || valorcine.length == 0 || /^\s+$/.test(valorcine)){
			 alert("Debes escribir el nombre del Cine");
			 document.getElementById("txt_nombre_cine").focus();
             return false;	 
	     } else if (valordomicilio == null || valordomicilio.length == 0 || /^\s+$/.test(valordomicilio)){
			 alert("Debes escribir el Domicilio");
			 document.getElementById("txt_domicilio_cine").focus();
             return false;
		 } else if (valortelefono == null || valortelefono.length == 0 || /^\s+$/.test(valortelefono)){
			 alert("Debes escribir un Telefono");
			 document.getElementById("txt_telefono_cine").focus();
             return false;
		} else if (valorcorreo == null || valorcorreo.length == 0 || /^\s+$/.test(valorcorreo)){
			 alert("Debes escribir un correo");
			 document.getElementById("txt_correo_cine").focus();
             return false;	 	 
		 //Cajas de Selección (Combo Box) ****************************************************************
         } else if (salas == null || salas == 0){
			 alert("Debes elegir el numero de Salas");
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