<!DOCTYPE html>
<html>

<head>
	<title>ASISTENCIAS</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</head>

<body>
	<div class="container">
		<h1>Asiatencias</h1>


		<form action="importar.php" method="post" encriype="multipart/form-data">
			<input name="archivo" type="file" required>
			<input class="btn btn-primary" type="submit" value="importar">

		</form>
		<h2>Listar registros:</h2>
		<table class="table table-bordered table-striped" style="margin-top:20px;">
			<thead>
				<th>ID</th>
				<th>Nombre Empleado</th>
				<th>Abandono</th>
				<th>Enfermo</th>
				<th>Falto</th>
				<th>No Registro</th>
				<th>Permiso</th>
				<th>Retardo</th>

			</thead>
			<tbody>
				<?php
				// incluye la conexión
				include_once('conexion.php');

				$database = new Conexion();
				$db = $database->open();
				try {
					$sql = 'SELECT * FROM empleado';
					foreach ($db->query($sql) as $row) {
				?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['empleado_id']; ?></td>
							<td><?php echo $row['abandono']; ?></td>
							<td><?php echo $row['enfermo']; ?></td>
							<td><?php echo $row['falto']; ?></td>
							<td><?php echo $row['no_r']; ?></td>
							<td><?php echo $row['permiso']; ?></td>
							<td><?php echo $row['retardo']; ?></td>

							<td>
								<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>

							</td>
							<?php include('edit_delete_modal.php'); ?>
						</tr>
				<?php
					}
				} catch (PDOException $e) {
					echo "There is some problem in connection: " . $e->getMessage();
				}

				//cerrar conexión
				$database->close();

				?>
			</tbody>
		</table>
	</div>
</body>

</html>