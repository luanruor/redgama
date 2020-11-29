<?php
include '../head.php'; 

if (isset($_POST["accion"])) {
	$accion=$_POST["accion"];

	if ($accion=="RegistrarCliente") {
		$Nombres=utf8_decode($_POST["Nombres"]);
		$Apellidos=utf8_decode($_POST["Apellidos"]);
		$TipoDocumento=$_POST["TipoDocumento"];
		$NumeroDocumento=$_POST["NumeroDocumento"];
		$Celular=$_POST["Celular"];
		$CelularAlterno=$_POST["CelularAlterno"];
		$Correo=$_POST["Correo"];
		$Direccion=utf8_decode($_POST["Direccion"]);

		$sql = "
		INSERT INTO clientes(
		TipoDocumento, 
		Documento,
		Nombres, 
		Apellidos, 
		Celular, 
		CelularAlterno, 
		Correo, 
		Direccion,
		CreadoEl,
		ActualizadoEl
		) 
		VALUES(
		'$TipoDocumento',
		'$NumeroDocumento',
		'$Nombres',
		'$Apellidos', 
		'$Celular', 
		'$CelularAlterno', 
		'$Correo', 
		'$Direccion',
		NOW(),
		NOW()
		)
		";
	}

	if ($accion=="RegistrarPoliza") {
		$Nombre=utf8_decode($_POST["Nombre"]);
		$Descripcion=utf8_decode($_POST["Descripcion"]);
		$TipoCubrimiento=$_POST["TipoCubrimiento"];
		$porcentajecubrimiento=$_POST["porcentajecubrimiento"];
		$iniciovigencia=$_POST["iniciovigencia"];
		$periodocobertura=$_POST["periodocobertura"];
		$precio=$_POST["precio"];
		$TipoRiesgo=$_POST["TipoRiesgo"];

		$sql = "
		INSERT INTO polizas(
		Nombre, 
		Descripcion,
		TipoCubrimiento, 
		PorcentajeCubrimiento, 
		InicioVigencia, 
		PeriodoCobertura, 
		Precio, 
		TipoRiesgo,
		CreadoEl,
		ActualizadoEl
		) 
		VALUES(
		'$Nombre',
		'$Descripcion',
		'$TipoCubrimiento',
		'$porcentajecubrimiento', 
		'$iniciovigencia', 
		'$periodocobertura', 
		'$precio', 
		'$TipoRiesgo',
		NOW(),
		NOW()
		)
		";
	}

	if ($accion=="AsociarCliente") {
		$IdPoliza=$_POST["idpoliza"];
		$IdCliente=$_POST["idcliente"];

		$sql = "
		INSERT INTO polizacliente(
		IdCliente, 
		IdPoliza
		) 
		VALUES(
		'$IdCliente',
		'$IdPoliza'
		)
		";
	}

	if($accion=="ActualizarCliente") {
		$IdCliente=$_POST["idcliente"];
		$Nombres=utf8_decode($_POST["Nombres"]);
		$Apellidos=utf8_decode($_POST["Apellidos"]);
		$TipoDocumento=$_POST["TipoDocumento"];
		$NumeroDocumento=$_POST["NumeroDocumento"];
		$Celular=$_POST["Celular"];
		$CelularAlterno=$_POST["CelularAlterno"];
		$Correo=$_POST["Correo"];
		$Direccion=utf8_decode($_POST["Direccion"]);

		$sql="
		UPDATE clientes
		SET TipoDocumento=$TipoDocumento, 
		Documento='$NumeroDocumento',
		Nombres='$Nombres', 
		Apellidos='$Apellidos', 
		Celular='$Celular', 
		CelularAlterno='$CelularAlterno', 
		Correo='$Correo', 
		Direccion='$Direccion',
		ActualizadoEl=NOW()
		WHERE Id=$IdCliente
		";
	}

	if($accion=="ActualizarPoliza") {
		$IdPoliza=$_POST["idpoliza"];
		$Nombre=utf8_decode($_POST["Nombre"]);
		$Descripcion=utf8_decode($_POST["Descripcion"]);
		$TipoCubrimiento=$_POST["TipoCubrimiento"];
		$porcentajecubrimiento=$_POST["porcentajecubrimiento"];
		$periodocobertura=$_POST["periodocobertura"];
		$precio=$_POST["precio"];
		$TipoRiesgo=$_POST["TipoRiesgo"];

		$sql="
		UPDATE polizas
		SET Nombre='$Nombre', 
		Descripcion='$Descripcion',
		TipoCubrimiento=$TipoCubrimiento, 
		PorcentajeCubrimiento=$porcentajecubrimiento, 
		PeriodoCobertura=$periodocobertura, 
		Precio=$precio, 
		TipoRiesgo=$TipoRiesgo,
		ActualizadoEl=NOW()
		WHERE Id=$IdPoliza
		";
	}

	if($accion=="EliminarCliente") {
		$IdCliente=$_POST["idcliente"];
		
		$sql="
		DELETE FROM clientes
		WHERE Id=$IdCliente
		";
	}

	if($accion=="EliminarPoliza") {
		$IdPoliza=$_POST["idpoliza"];
		
		$sql="
		DELETE FROM polizas
		WHERE Id=$IdPoliza
		";
	}

	if($accion=="QuitarCliente") {
		$IdPoliza=$_POST["idpoliza"];
		$IdCliente=$_POST["idcliente"];
		
		$sql="
		DELETE FROM polizacliente
		WHERE IdCliente=$IdCliente AND IdPoliza=$IdPoliza
		";
	}
}

echo $sql;

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

if (mysqli_query($conn, $sql)) {
	echo "Registro ingresado correctamente";
	echo "
		<script>
			window.history.back(-1)
		</script>
	";
	echo "  
    Los datos fueron registrados con EXITO!!! 
    <br>
    <p><a href='../index.php' class='btn btn-info'>Regresar a la pagina principal</a></p> 
    ";
} else {
	$error = "Error: " . $sql . "" . mysqli_error($conn);
	include '../error.php';
	echo "<script>
	function redireccionarPagina() {
  		window.history.".$_SERVER['HTTP_REFERER'].";
	}
	setTimeout('redireccionarPagina()', 500000);
	</script>";
	
}
$conn->close();

      

    
?>  