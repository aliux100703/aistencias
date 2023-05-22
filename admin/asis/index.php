<!DOCTYPE html>
<html>

<head>
    <title>ASISTENCIAS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
                <th>Apellido</th>
                <th>Abandono</th>
                <th>Enfermo</th>
                <th>Falto</th>
                <th>No Registro</th>
                <th>Permiso</th>
                <th>Retardo</th>

            </thead>
            <tbody>
                <?php
                // Establecer la conexión a la base de datos (reemplaza los valores con los tuyos)
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "asistencias";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar si la conexión fue exitosa
                if ($conn->connect_error) {
                    die("Error de conexión: " . $conn->connect_error);
                }

                // Realizar el LEFT JOIN entre las tablas "empleado" y "asistencias"
                $sql = "SELECT empleado.id, empleado.nombre, empleado.apellidos, asistencias.abandono, asistencias.enfermo, asistencias.falto, asistencias.no_r, asistencias.permiso, asistencias.retardo
                        FROM empleado
                        LEFT JOIN asistencias ON empleado.id = asistencias.nombre_id";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["apellidos"] . "</td>";
                        echo "<td>" . $row["abandono"] . "</td>";
                        echo "<td>" . $row["enfermo"] . "</td>";
                        echo "<td>" . $row["falto"] . "</td>";
                        echo "<td>" . $row["no_r"] . "</td>";
                        echo "<td>" . $row["permiso"] . "</td>";
                        echo "<td>" . $row["retardo"] . "</td>";
                        echo "<td><button type='button' class='btn btn-primary btn-edit' data-id='" . $row["id"] . "' data-nombre='" . $row["nombre"] . "' data-apellidos='" . $row["apellidos"] . "' data-abandono='" . $row["abandono"] . "' data-enfermo='" . $row["enfermo"] . "' data-falto='" . $row["falto"] . "' data-no_r='" . $row["no_r"] . "' data-permiso='" . $row["permiso"] . "' data-retardo='" . $row["retardo"] . "'>Editar</button></td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "No se encontraron registros.";
                }

                // Cerrar la conexión
                $conn->close();

                ?>
            </tbody>
        </table>
        <!-- Modal de edición -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarEmpleadoLabel">Editar Empleado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario de edición de empleado -->
                        <!-- Formulario de edición de empleado -->
                        <form id="formEditarEmpleado" action="editar_empleado.php" method="POST">
                            <input type="hidden" id="idEmpleado" name="idEmpleado">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" readonly>
                            </div>
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" readonly>
                            </div>
                            <div class="form-group">
                                <label for="abandono">Abandono</label>
                                <input type="text" class="form-control" id="abandono" name="abandono">
                            </div>
                            <div class="form-group">
                                <label for="enfermo">Enfermo</label>
                                <input type="text" class="form-control" id="enfermo" name="enfermo">
                            </div>
                            <div class="form-group">
                                <label for="falto">Falto</label>
                                <input type="text" class="form-control" id="falto" name="falto">
                            </div>
                            <div class="form-group">
                                <label for="no_r">No Registro</label>
                                <input type="text" class="form-control" id="no_r" name="no_r">
                            </div>
                            <div class="form-group">
                                <label for="permiso">Permiso</label>
                                <input type="text" class="form-control" id="permiso" name="permiso">
                            </div>
                            <div class="form-group">
                                <label for="retardo">Retardo</label>
                                <input type="text" class="form-control" id="retardo" name="retardo">
                            </div>
                            <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Manejar el evento de clic del botón "Editar"
            $('table').on('click', '.btn-edit', function() {
                // Obtener los datos del empleado seleccionado
                var id = $(this).data('id');
                var nombre = $(this).data('nombre');
                var apellidos = $(this).data('apellidos');
                var abandono = $(this).data('abandono');
                var enfermo = $(this).data('enfermo');
                var falto = $(this).data('falto');
                var no_r = $(this).data('no_r');
                var permiso = $(this).data('permiso');
                var retardo = $(this).data('retardo');

                // Rellenar el formulario de edición con los datos del empleado
                $('#idEmpleado').val(id);
                $('#nombre').val(nombre);
                $('#apellidos').val(apellidos);
                $('#abandono').val(abandono);
                $('#enfermo').val(enfermo);
                $('#falto').val(falto);
                $('#no_r').val(no_r);
                $('#permiso').val(permiso);
                $('#retardo').val(retardo);

                // Mostrar el modal de edición
                $('#editModal').modal('show');
            });

            // Manejar el evento de clic del botón "Guardar"
            $('#btnGuardar').click(function() {
                // Obtener los datos del formulario de edición
                var id = $('#idEmpleado').val();
                var abandono = $('#abandono').val();
                var enfermo = $('#enfermo').val();
                var falto = $('#falto').val();
                var no_r = $('#no_r').val();
                var permiso = $('#permiso').val();
                var retardo = $('#retardo').val();

                // Realizar la petición AJAX para actualizar los datos del empleado
                $.ajax({
                    url: 'actualizar.php',
                    method: 'POST',
                    data: {
                        id: id,
                        abandono: abandono,
                        enfermo: enfermo,
                        falto: falto,
                        no_r: no_r,
                        permiso: permiso,
                        retardo: retardo
                    },
                    success: function(response) {
                        // Actualizar la tabla con los datos actualizados
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>