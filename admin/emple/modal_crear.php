<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Agregar Empleado</h4>
                </center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="add.php">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Apellido:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="apellidos">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Curp:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="curp">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Acta de nacimiento:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="act_naci">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">CCB:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ccb">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Correo:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="correo">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">RFC:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="rfc">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Ubicacion:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ubicacion">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">INE:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ine">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">NSS:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nss">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Telefono:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telefono">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Area id:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="areas_id">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Sueldo:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sueldo">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Fecha alta:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="fecha_alta">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Foto:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="foto">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</a>
                    </form>
            </div>

        </div>
    </div>
</div>