<?php

	session_start();
	include_once('conxion.php');

	if(isset($_POST['add'])){
		$database = new Conexion();
		$db = $database->open();
		try {
            // Consulta para obtener datos de una tabla
            $consultaTabla1 = "SELECT * FROM asistencia";
            $statementTabla1 = $conexion->query($consultaTabla1);
            $datosTabla1 = $statementTabla1->fetchAll(PDO::FETCH_ASSOC);
        
            // Consulta para obtener datos de otra tabla
            $consultaTabla2 = "SELECT * FROM empleado";
            $statementTabla2 = $conexion->query($consultaTabla2);
            $datosTabla2 = $statementTabla2->fetchAll(PDO::FETCH_ASSOC);
        
              // Consulta para obtener datos de otra tabla
              $consultaTabla2 = "SELECT * FROM empleado";
              $statementTabla2 = $conexion->query($consultaTabla2);
              $datosTabla2 = $statementTabla2->fetchAll(PDO::FETCH_ASSOC);
            // Resto del código para procesar los datos de las tablas...
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

