<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../login/login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: ../login/login.php');
        }
    }


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Empleados</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/custom.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/font-awesome.css">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  		<a class="navbar-brand" href="https://bechapra.com/" target="_blank">Bechapra</a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>

	  	<div class="collapse navbar-collapse" id="navbarColor02">
		    <ul class="navbar-nav mr-auto">
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" placeholder="Buscar" type="text">
		      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
		    </form>
	  	</div>
	</nav>
	<h1 class="page-header text-center">Empleados</h1>
	<div class="row">
		<div class="col-sm-12">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="fa fa-plus"></span>Agregar Empleado</a>
			<a href="../login/login.php?cerrar_sesion=1" class="btn btn-danger">Cerrar sesión</a>

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
					
					<th>Telefono</th>
					<th>Id area</th>
					<th>Sueldo</th>
					<th>Fecha de alta</th>
					<th>Foto</th>
				</thead>
				<tbody>
					<?php
						// incluye la conexión
						include_once('connection.php');

						$database = new Connection();
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
									
									<td><?php echo $row['telefono']; ?></td>
									<td><?php echo $row['area_id']; ?></td>
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
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/custom.js"></script>
</body>
</html>
