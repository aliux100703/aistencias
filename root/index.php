<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Root</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/use.css">
    <link rel="stylesheet" href="https://unpkg.com/transition-style">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    
</head>
<body>
    
<div class="container">
                    <h1>Usuarios</h1>
                    <table >
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                            <th>Area</th>
                        </thead>
                        <tbody>
                            <?php
                            // Datos de conexión a la base de datos
                            $dsn = 'mysql:host=localhost;dbname=asistencias';
                            $usuario = 'root';
                            $contrasena = '';
                            $conexion;
                            $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);


                            try {
                                // Conexión a la base de datos utilizando PDO

                                $conexion = new PDO($dsn, $usuario, $contrasena, $options);
                                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                // Consulta para obtener los datos de la tabla
                                

                                $consulta = "SELECT usuario.*, roles.rol , area.nombre_area 
                                FROM usuario
                                INNER JOIN roles ON usuario.rol_id = roles.id
                                INNER JOIN area ON usuario.area_id = area.id";


                                // Ejecutar la consulta
                                $resultados = $conexion->query($consulta);

                                // Iterar sobre los resultados y mostrar cada fila en la tabla
                                foreach ($resultados as $fila) {
                                    echo "<tr>";
                                    echo "<td>" . $fila['id'] . "</td>";
                                    echo "<td>" . $fila['username'] . "</td>";
                                    echo "<td>" . $fila['email'] . "</td>";
                                    echo "<td>" . $fila['username'] . "</td>";
                                    echo "<td>" . $fila['password'] . "</td>";
                                    echo "<td>" . $fila['nombre_area'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "<td>";
                                echo "<!-- Botón para mostrar el modal de edición -->";
                                echo "<button class='btn btn-primary' class='bot2' data-toggle='modal' data-target='#editarModal_" . $row['id'] . "'>Editar</button>";
                                echo "<!-- Botón para mostrar el modal de eliminación -->";
                                echo "<button type='button' class='btn btn-danger'class='bot3' data-toggle='modal' data-target='#eliminarModal_" . $row['id'] . "'>Eliminar</button>";
                                echo "</td>";
                                echo "</tr>";

                                echo "</tbody>";
                                echo "</table>";


                                echo "<div class='modal fade'id='editarModal_" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='editarModalLabel_" . $row['id'] . "' aria-hidden='true'>";
                               
                                echo "<div class='modal-dialog' role='document'>";
                                echo "<div class='modal-content'>";
                                echo "<div class='modal-header'>";
                                echo "<h5 class='modal-title' id='editarModalLabel_" . $row['id'] . "'>Editar Empleado</h5>";
                                echo "<button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>";
                                echo "<span aria-hidden='true'>×</span>";
                                echo "</button>";
                                echo "</div>";
                                echo "<div class='modal-body'>";

                                // Formulario de Edición
                                echo "<form action='editar.php' method='POST'>";
                                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                                echo "<div class='form-group'>";
                                echo "<label for='nombre'>Nombre</label>";
                                echo "<input type='text' class='form-control' name='nombre' value='" . $row['nombre'] . "'>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                echo "<label for='apellidos'>Apellidos</label>";
                                echo "<input type='text' class='form-control' name='apellidos' value='" . $row['apellidos'] . "'>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                echo "<label for='curp'>Curp</label>";
                                echo "<input type='text' class='form-control' name='curp' value='" . $row['curp'] . "'>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                echo "<label for='act_naci'>Acta de nacimiento</label>";
                                echo "<input type='text' class='form-control' name='act_naci' value='" . $row['act_naci'] . "'>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                echo "<label for='ccb'>CCB</label>";
                                echo "<input type='text' class='form-control' name='ccb' value='" . $row['ccb'] . "'>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                echo "<label for='correo'>Correo</label>";
                                echo "<input type='text' class='form-control' name='correo' value='" . $row['correo'] . "'>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                echo "<label for='rfc'>RFC</label>";
                                echo "<input type='text' class='form-control' name='rfc' value='" . $row['rfc'] . "'>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                echo "<label for='ubicacion'>Ubicacion</label>";
                                echo "<input type='text' class='form-control' name='ubicacion' value='" . $row['ubicacion'] . "'>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                echo "<label for='ine'>INE</label>";
                                echo "<input type='text' class='form-control' name='ine' value='" . $row['ine'] . "'>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                echo "<label for='nss'>NSS</label>";
                                echo "<input type='text' class='form-control' name='nss' value='" . $row['nss'] . "'>";
                                echo "</div>";
                                echo "<div class='form-group'>";
                                echo "<label for='telefono'>TELEFONO</label>";
                                echo "<input type='text' class='form-control' name='telefono' value='" . $row['telefono'] . "'>";
                                echo "</div>";

                                echo "<div class='form-group'>";
                                echo "<label for='area_id'>Areás </label>";
                                echo "<select name='area_id' class='form-control'>";
                                echo "<option selected>Areás</option>";
                                echo "<option value='1'>1-.Sistemas</option>";
                                echo "<option value='2'>2-.Marketing</option>";
                                echo "<option value='3'>3-.Juridico</option>";
                                echo "<option value='4'>4-.Contabilidad</option>";
                                echo "<option value='5'>5-.Tesorería</option>";
                                echo "<option value='6'>6-.Bancos</option>";
                                echo "<option value='7'>7-.Servicios Generales</option>";
                                echo "<option value='8'>8-.TI´C</option>";
                                echo "</select>";
                                echo "</div>";



                                


                                // Agrega los demás campos del formulario aquí
                                echo "<div class='modal-footer'>";
                                echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>";
                                echo "<button type='submit' class='btn btn-primary' name='editar'>Actualizar</button>";
                                echo "</div>";
                                echo "</form>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";

                                // Modal de Eliminación
                                echo "<div class='modal fade' id='eliminarModal_" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='eliminarModalLabel_" . $row['id'] . "' aria-hidden='true'>";
                                echo "<div class='modal-dialog' role='document'>";
                                echo "<div class='modal-content'>";
                                echo "<div class='modal-header'>";
                                echo "<h5 class='modal-title' id='eliminarModalLabel_" . $row['id'] . "'>Eliminar Empleado</h5>";
                                echo "<button type='button' class='close' data-dismiss='modal' aria-label='Cerrar'>";
                                echo "<span aria-hidden='true'>&times;</span>";
                                echo "</button>";
                                echo "</div>";
                                echo "<div class='modal-body'>";
                                echo "<p>¿Estás seguro de eliminar al empleado " . $row['nombre'] . "?</p>";
                                echo "</div>";
                                echo "<div class='modal-footer'>";
                                echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>";
                                echo "<a href='eliminar.php?id=" . $row['id'] . "' class='btn btn-danger'>Eliminar</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";



                                // Cerrar la conexión a la base de datos
                                $conn = null;
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

</body>
</html>