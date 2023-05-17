<?php

	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$curp = $_POST['curp'];
			$act_naci = $_POST['act_naci'];
			$ccd = $_POST['ccb'];
			$correo = $_POST['correo'];
			$rfc = $_POST['rfc'];
			$ubicacion = $_POST['ubicacion'];
			$ine = $_POST['ine'];
			$nss = $_POST['nss'];
			$identificador = $_POST['identificador'];
			$telefono = $_POST['telefono'];
			$areas_id = $_POST['areas_id'];
			$sueldo = $_POST['sueldo'];
			$fecha_alta = $_POST['fecha_alta'];
			$foto = $_POST['foto'];

			$sql = "UPDATE empleado SET nombre = '$nombre', apellidos = '$apellidos', curp = '$curp', act_naci = '$act_naci', ccb = '$ccb', 
			correo = '$correo', rfc = '$rfc', ubicacion = '$ubicacion', ine = '$ine', nss = '$nss', identificador = '$identificador', telefono = '$telefono', areas_id = '$areas_id', sueldo = '$sueldo', 
			fecha_alta = '$fecha_alta', foto = '$foto' WHERE id = '$id'";
			// declaración if-else en la ejecución de nuestra consulta
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Los datos se actualizaron' : 'Ocurrio un error. No se pudo actualizar';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión 
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Primero debe llenar el form';
	}

	header('location: index.php');

?>