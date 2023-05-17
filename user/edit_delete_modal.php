<!-- Editar -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	 <center><h4 class="modal-title" id="myModalLabel">Editar miembro</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php?id=<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombre:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Apellido:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="apellidos" value="<?php echo $row['apellidos']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Curp:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="curp" value="<?php echo $row['curp']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Acta de nacimiento:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="act_naci" value="<?php echo $row['act_naci']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">CCB:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ccb" value="<?php echo $row['ccb']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Correo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="correo" value="<?php echo $row['correo']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">RFC:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="rfc" value="<?php echo $row['rfc']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Ubicacion:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ubicacion" value="<?php echo $row['ubicacion']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">INE:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ine" value="<?php echo $row['ine']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">NSS:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nss" value="<?php echo $row['nss']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Identificador:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="identificador" value="<?php echo $row['identificador']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Telefono:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Area id:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="areas_id" value="<?php echo $row['area_id']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Suledo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="sueldo" value="<?php echo $row['sueldo']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Fecha de alta:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fecha_alta" value="<?php echo $row['fecha_alta']; ?>">
					</div>
					<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Foto:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="foto" value="<?php echo $row['foto']; ?>">
					</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="fa fa-check"></span> Actualizar</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Eliminar -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Borrar miembro</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Estas seguro en borrar los datos de?</p>
				<h2 class="text-center"><?php echo $row['nombre'].' '.$row['apellidos']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>
