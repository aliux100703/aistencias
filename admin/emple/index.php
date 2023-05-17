<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLEADOS</title>
</head>
<body>
    <div class="container">
    <div class="row">
		<div class="col-sm-12">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="fa fa-plus"></span>Agregar Empleado</a>
            <?php 
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-dismissible alert-success" style="margin-top:20px;">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Curp</th>
					<th>Acta de nacimiento</th>
					<th>CCB</th>
					<th>Correo</th>
					<th>RFC</th>
					<th>Ubucacion</th>
					<th>INE</th>
					<th>NSS</th>
					<th>Identificador</th>
					<th>Telefono</th>
					<th>Id area</th>
					<th>Sueldo</th>
					<th>Fecha de alta</th>
					<th>Foto</th>
				</thead>
				<tbody>
					<?php
						// incluye la conexión
						include_once('conexion.php');

						$database = new conexion();
    					$db = $database->open();
						try{	
						    $sql = 'SELECT * FROM empleado';
						    foreach ($db->query($sql) as $row) {
						    	?>
						    	<tr>
						    		<td><?php echo $row['id']; ?></td>
						    		<td><?php echo $row['nombre']; ?></td>
						    		<td><?php echo $row['apellidos']; ?></td>
						    		<td><?php echo $row['curp']; ?></td>
									<td><?php echo $row['act_naci']; ?></td>
									<td><?php echo $row['ccb']; ?></td>
									<td><?php echo $row['correo']; ?></td>
									<td><?php echo $row['rfc']; ?></td>
									<td><?php echo $row['ubicacion']; ?></td>
									<td><?php echo $row['ine']; ?></td>
									<td><?php echo $row['nss']; ?></td>
									<td><?php echo $row['identificador']; ?></td>
									<td><?php echo $row['telefono']; ?></td>
									<td><?php echo $row['areas_id']; ?></td>
									<td><?php echo $row['sueldo']; ?></td>
									<td><?php echo $row['fecha_alta']; ?></td>
									<td><?php echo $row['foto'];?></td>
						    		<td>
						    			<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
						    			<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
						    		</td>
						    		<?php include('edit_delete_modal.php'); ?>
						    	</tr>
						    	<?php 
						    }
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						//cerrar conexión
						$database->close();

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('add_modal.php'); ?>
    </div>
    
</body>
</html>