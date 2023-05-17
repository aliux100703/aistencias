<?php


	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			// hacer uso de una declaración preparada para evitar la inyección de sql
			$stmt = $db->prepare("INSERT INTO empleado (nombre, apellidos, curp, act_naci, ccb, correo, rfc, ubicacion, ine, nss, telefono, area_id, sueldo, fecha_alta, foto) VALUES (:nombre, :apellidos, :curp, :act_naci, :ccb, :correo, :rfc, :ubicacion, :ine, :nss, :telefono, :area_id, :sueldo, :fecha_alta, :foto)");

			$_SESSION['message'] = ($stmt->execute(array(
				
				':nombre' => $_POST['nombre'],
				':apellidos' => $_POST['apellidos'],  
				':curp' => $_POST['curp'],
				':act_naci' => $_POST['act_naci'],
				':ccb' => $_POST['ccb'],
				':correo' => $_POST['correo'],
				':rfc' => $_POST['rfc'],
				':ubicacion' => $_POST['ubicacion'],
				':ine' => $_POST['ine'],
				':nss' => $_POST['nss'],
				
				':telefono' => $_POST['telefono'],
				':area_id' => $_POST['area_id'],
				':sueldo' => $_POST['sueldo'],
				':fecha_alta' => $_POST['fecha_alta'],
				':foto' => $_POST['foto']
			))) ? 'Miembro agregado correctamente' : 'Something went wrong. Cannot add member';
			
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//cerrar conexión
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: index.php');
	
?>
