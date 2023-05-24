<?php

session_start();

if (!isset($_SESSION['rol'])) {
    header('location: ../../login/login.php');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: .././login/login.php');
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Vista de user</title>
    <!-- Agrega aquí los enlaces a las bibliotecas CSS -->
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

    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra">
                <img src="imag/becha.png" width="250" height="79" />
            </div>
            <div class="col-4 text-right barra">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a href="#" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle user"></i></a>

                        <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                            <a href="../../login/login.php?cerrar_sesion=1" class="bot1">Cerrar sesión</a>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="barra-lateral col-12 col-sm-auto">
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                    <a href="../asis/index.php">
                        <center><span>Asistencias</span></center>
                    </a>
                    <a href="../user/index.php">
                        <center><span>Empleados</span></center>
                    </a>
                    <a href="../usuar/index.php">
                        <center><span>Usuarios</span></center>
                    </a>
                </nav>
            </div>


            <main class="main col">
                
                    <div class="columna col-lg-6">
                    <div class="container">
                            <h1>Empleados</h1>

                            <!-- Botón para mostrar el modal de creación -->
                            <button class="btn btn-primary" class="bot" data-toggle="modal" data-target="#crearModal">Crear Empleado</button>

                            <!-- Tabla de Empleados -->
                            <div class="form-group">
                                <label for="buscar">
                                    <h3>Buscar:</h3>
                                </label>
                                <input type="text" class="form-control" id="buscarInput" onkeyup="buscarEmpleados()" placeholder="Ingresa el nombre o apellido">
                            </div>

                            
                            <table class="table table-bordered table-striped" style="margin-top:20px;">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <!-- Agrega los demás encabezados de columna aquí -->
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Ubicacion</th>
                                    <th>Telefono</th>
                                    <th>Area</th>
                                    <th>Sueldo</th>
                                    


                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    // Realiza la conexión a la base de datos y consulta los empleados
                                    $conexion = mysqli_connect("localhost", "root", "", "asistencias");
                                    $consulta = mysqli_query($conexion, "SELECT * FROM empleado");
                                    while ($row = mysqli_fetch_assoc($consulta)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td>" . $row['apellidos'] . "</td>";
                                        echo "<td>" . $row['correo'] . "</td>";
                                        echo "<td>" . $row['ubicacion'] . "</td>";
                                        echo "<td>" . $row['telefono'] . "</td>";
                                        echo "<td>" . $row['area_id'] . "</td>";
                                        echo "<td>" . $row['sueldo'] . "</td>";
                                        
                                        
                                        // Agrega las demás celdas de la fila aquí
                                        echo "<td>";
                                        echo "<!-- Botón para mostrar el modal de edición -->";
                                        echo "<button class='btn btn-primary' class='bot2' data-toggle='modal' data-target='#editarModal_" . $row['id'] . "'>Editar</button>";
                                        echo "<!-- Botón para mostrar el modal de eliminación -->";
                                        echo "<button type='button' class='btn btn-danger'class='bot3' data-toggle='modal' data-target='#eliminarModal_" . $row['id'] . "'>Eliminar</button>";
                                        echo "</td>";
                                        echo "</tr>";

                                        // Modal de Edición
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
                                        echo "<label for='area_id'>Area id</label>";
                                        echo "<select name='area_id' class='form-control'>";
                                        echo "<option value='1'>1-.Sistemas</option>";
                                        echo "<option value='2'>2-.Marketing</option>";
                                        echo "<option value='3'>3-.Juridico</option>";
                                        echo "</select>";
                                        echo "</div>";



                                        echo "<div class='form-group'>";
                                        echo "<label for='sueldo'>Fecha de alta</label>";
                                        echo "<input type='text' class='form-control' name='fecha_alta' value='" . $row['fecha_alta'] . "'>";
                                        echo "</div>";
                                        echo "<div class='form-group'>";
                                        echo "<label for='sueldo'>Sueldo</label>";
                                        echo "<input type='text' class='form-control' name='sueldo' value='" . $row['sueldo'] . "'>";
                                        echo "</div>";
                                        echo "<div class='form-group'>";
                                        echo "<label for='FOTO'>FOTO</label>";
                                        echo "<input type='text' class='form-control' name='foto' value='" . $row['foto'] . "'>";
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
                                    }
                                    mysqli_close($conexion);
                                    ?>
                                </tbody>
                            </table>
                            <!-- Modal de Creación -->
                            <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="crearModalLabel">Crear Empleado</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulario de Creación -->
                                            <form action="crear.php" method="POST">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre">
                                                </div>
                                                <div class="form-group">
                                                    <label for="apellidos">Apellidos</label>
                                                    <input type="text" class="form-control" name="apellidos">
                                                </div>
                                                <div class="form-group">
                                                    <label for="curp">Curp</label>
                                                    <input type="text" class="form-control" name="curp">
                                                </div>
                                                <div class="form-group">
                                                    <label for="act_naci">Acta de nacimiento</label>
                                                    <input type="text" class="form-control" name="act_naci">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ccb">CCB</label>
                                                    <input type="text" class="form-control" name="ccb">
                                                </div>
                                                <div class="form-group">
                                                    <label for="correo">Correo</label>
                                                    <input type="text" class="form-control" name="correo">
                                                </div>
                                                <div class="form-group">
                                                    <label for="rfc">RFC</label>
                                                    <input type="text" class="form-control" name="rfc">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ubicacion">Ubicacion</label>
                                                    <input type="text" class="form-control" name="ubicacion">
                                                </div>
                                                <div class="form-group">
                                                    <label for="ine">Ine</label>
                                                    <input type="text" class="form-control" name="ine">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nss">NSS</label>
                                                    <input type="text" class="form-control" name="nss">
                                                </div>
                                                <div class="form-group">
                                                    <label for="telefono">Telefono</label>
                                                    <input type="text" class="form-control" name="telefono">
                                                </div>
                                                <div class="form-group">
                                                    <label for="area_id">Area id</label>
                                                    <select name="area_id" class="form-control">
                                                        <option value="1">1-.Sistemas</option>
                                                        <option value="2" selected>2-.Marketing</option>
                                                        <option value="3">3-.Juridico</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sueldo">Sueldo</label>
                                                    <input type="text" class="form-control" name="sueldo">
                                                </div>
                                                <div class="form-group">
                                                    <label for="fecha_alta">Fecha alta</label>
                                                    <input type="text" class="form-control" name="fecha_alta">
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto">Foto</label>
                                                    <input type="text" class="form-control" name="foto">
                                                </div>
                                                <!-- Agrega los demás campos del formulario aquí -->

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary" name="crear">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                
            </main>
        </div>

    </div>


    <!-- Agrega aquí los enlaces a las bibliotecas JavaScript -->
    <script>
        function buscarEmpleados() {
            // Obtiene el valor del campo de búsqueda
            var input = document.getElementById("buscarInput");
            var filtro = input.value.toUpperCase();

            // Obtiene todas las filas de la tabla de empleados
            var tabla = document.getElementsByTagName("table")[0];
            var filas = tabla.getElementsByTagName("tr");

            // Itera sobre las filas y muestra/oculta según el filtro de búsqueda
            for (var i = 0; i < filas.length; i++) {
                var celdas = filas[i].getElementsByTagName("td");
                var mostrarFila = false;

                // Itera sobre las celdas de cada fila (excepto la última columna)
                for (var j = 1; j < celdas.length - 1; j++) {
                    var contenidoCelda = celdas[j].textContent || celdas[j].innerText;

                    // Compara el contenido de la celda con el filtro de búsqueda
                    if (contenidoCelda.toUpperCase().indexOf(filtro) > -1) {
                        mostrarFila = true;
                        break;
                    }
                }

                // Muestra u oculta la fila según el resultado de búsqueda
                filas[i].style.display = mostrarFila ? "" : "none";
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/646c794df3.js"></script>
</body>

</html>