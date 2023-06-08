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
    <title>Archivos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
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
                            <a href="../../login/login.php?cerrar_sesion=1" class="bot1">Cerrar sesión</a> </a>
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
                    <a href="../subida_de_archivos/index.php">
                        <center><span>Archivos</span></center>
                    </a>
                </nav>
            </div>
            <main class="main col">


<!-- ----------------------------------------------------------------------------------- -->
    <div class="container">
        <h1>Archivos</h1>
        <table class="table table-sm">
            <thead>
                <tr>
                    
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Ruta Acta</th>
                    <th>Ruta CURP</th>
                    <th>Ruta CCB</th>
                    <th>Ruta NSS</th>
                    <th>Ruta INE</th>
                    <th>Ruta Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Datos de la base de datos
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "asistencias";

                // Crear conexión
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error en la conexión: " . $conn->connect_error);
                }

                // Obtener los registros de la tabla 'archivos'
                $sql = "SELECT empleado.id, empleado.nombre, empleado.apellidos, archivos.id, archivos.ruta_acta, archivos.ruta_curp, archivos.ruta_ccb, archivos.ruta_nss, archivos.ruta_ine, archivos.ruta_foto
                FROM empleado
                LEFT JOIN archivos ON empleado.id = archivos.empleado_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["apellidos"] . "</td>";
                        
                        echo "<td><a href='" . $row['ruta_acta'] . "' target='_blank'>" . $row['ruta_acta'] . "</a></td>";
                        echo "<td><a href='" . $row['ruta_curp'] . "' target='_blank'>" . $row['ruta_curp'] . "</a></td>";
                        echo "<td><a href='" . $row['ruta_ccb'] . "' target='_blank'>" . $row['ruta_ccb'] . "</a></td>";
                        echo "<td><a href='" . $row['ruta_nss'] . "' target='_blank'>" . $row['ruta_nss'] . "</a></td>";
                        echo "<td><a href='" . $row['ruta_ine'] . "' target='_blank'>" . $row['ruta_ine'] . "</a></td>";
                        echo "<td><a href='" . $row['ruta_foto'] . "' target='_blank'>" . $row['ruta_foto'] . "</a></td>";
                        echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal' . $row['id'] . '">Editar</button></td>';
                        echo "</tr>";

                        // Modal para editar archivos
                        echo '<div class="modal fade" id="editModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="editModalLabel' . $row['id'] . '" aria-hidden="true">';
                        echo '<div class="modal-dialog" role="document">';
                        echo '<div class="modal-content">';
                        echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="editModalLabel' . $row['id'] . '">Editar Archivos</h5>';
                        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                        echo '<span aria-hidden="true">&times;</span>';
                        echo '</button>';
                        echo '</div>';
                        echo '<div class="modal-body">';
                        echo '<form method="POST" action="" enctype="multipart/form-data">';
                        echo '<input type="hidden" name="archivo_id" value="' . $row['id'] . '">';
                        echo '<div class="form-group">';
                        echo '<label>Ruta Acta</label>';
                        echo '<input type="file" name="ruta_acta" class="form-control">';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label>Ruta CURP</label>';
                        echo '<input type="file" name="ruta_curp" class="form-control">';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label>Ruta CCB</label>';
                        echo '<input type="file" name="ruta_ccb" class="form-control">';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label>Ruta NSS</label>';
                        echo '<input type="file" name="ruta_nss" class="form-control">';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label>Ruta INE</label>';
                        echo '<input type="file" name="ruta_ine" class="form-control">';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label>Ruta Foto</label>';
                        echo '<input type="file" name="ruta_foto" class="form-control">';
                        echo '</div>';
                        echo '<button type="submit" name="guardar" class="btn btn-primary">Guardar</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<tr><td colspan='9'>No se encontraron archivos.</td></tr>";
                }

                // Procesar el formulario al guardar
                if (isset($_POST['guardar'])) {
                    $archivo_id = $_POST['archivo_id'];

                    // Comprobar si se seleccionó un archivo para cada campo
                    if (isset($_FILES['ruta_acta']) && $_FILES['ruta_acta']['error'] === UPLOAD_ERR_OK) {
                        $ruta_acta_tmp = $_FILES['ruta_acta']['tmp_name'];
                        $ruta_acta_nombre = $_FILES['ruta_acta']['name'];
                        $ruta_acta_destino = "actas/" . $ruta_acta_nombre;

                        // Mover el archivo a la carpeta de destino
                        move_uploaded_file($ruta_acta_tmp, $ruta_acta_destino);

                        // Actualizar el campo 'ruta_acta' en la base de datos
                        $sql_update_acta = "UPDATE archivos SET ruta_acta = '$ruta_acta_destino' WHERE id = '$archivo_id'";
                        $conn->query($sql_update_acta);
                    }


                    if (isset($_FILES['ruta_curp']) && $_FILES['ruta_curp']['error'] === UPLOAD_ERR_OK) {
                        $ruta_curp_tmp = $_FILES['ruta_curp']['tmp_name'];
                        $ruta_curp_nombre = $_FILES['ruta_curp']['name'];
                        $ruta_curp_destino = "curps/" . $ruta_curp_nombre;
                    
                        // Mover el archivo a la carpeta de destino
                        move_uploaded_file($ruta_curp_tmp, $ruta_curp_destino);
                    
                        // Actualizar el campo 'ruta_curp' en la base de datos
                        $sql_update_curp = "UPDATE archivos SET ruta_curp = '$ruta_curp_destino' WHERE id = '$archivo_id'";
                        $conn->query($sql_update_curp);
                    }
                    
                    if (isset($_FILES['ruta_ccb']) && $_FILES['ruta_ccb']['error'] === UPLOAD_ERR_OK) {
                        $ruta_ccb_tmp = $_FILES['ruta_ccb']['tmp_name'];
                        $ruta_ccb_nombre = $_FILES['ruta_ccb']['name'];
                        $ruta_ccb_destino = "ccb/" . $ruta_ccb_nombre;
                    
                        // Mover el archivo a la carpeta de destino
                        move_uploaded_file($ruta_ccb_tmp, $ruta_ccb_destino);
                    
                        // Actualizar el campo 'ruta_curp' en la base de datos
                        $sql_update_curp = "UPDATE archivos SET ruta_ccb = '$ruta_ccb_destino' WHERE id = '$archivo_id'";
                        $conn->query($sql_update_curp);
                    }
                    

                    if (isset($_FILES['ruta_nss']) && $_FILES['ruta_nss']['error'] === UPLOAD_ERR_OK) {
                        $ruta_nss_tmp = $_FILES['ruta_nss']['tmp_name'];
                        $ruta_nss_nombre = $_FILES['ruta_nss']['name'];
                        $ruta_nss_destino = "nss/" . $ruta_nss_nombre;
                    
                        // Mover el archivo a la carpeta de destino
                        move_uploaded_file($ruta_nss_tmp, $ruta_nss_destino);
                    
                        // Actualizar el campo 'ruta_curp' en la base de datos
                        $sql_update_curp = "UPDATE archivos SET ruta_nss = '$ruta_nss_destino' WHERE id = '$archivo_id'";
                        $conn->query($sql_update_curp);
                    }
                    

                    if (isset($_FILES['ruta_ine']) && $_FILES['ruta_ine']['error'] === UPLOAD_ERR_OK) {
                        $ruta_ine_tmp = $_FILES['ruta_ine']['tmp_name'];
                        $ruta_ine_nombre = $_FILES['ruta_ine']['name'];
                        $ruta_ine_destino = "ine/" . $ruta_ine_nombre;
                    
                        // Mover el archivo a la carpeta de destino
                        move_uploaded_file($ruta_ine_tmp, $ruta_ine_destino);
                    
                        // Actualizar el campo 'ruta_curp' en la base de datos
                        $sql_update_curp = "UPDATE archivos SET ruta_ine = '$ruta_ine_destino' WHERE id = '$archivo_id'";
                        $conn->query($sql_update_curp);
                    }

                    if (isset($_FILES['ruta_foto']) && $_FILES['ruta_foto']['error'] === UPLOAD_ERR_OK) {
                        $ruta_foto_tmp = $_FILES['ruta_foto']['tmp_name'];
                        $ruta_foto_nombre = $_FILES['ruta_foto']['name'];
                        $ruta_foto_destino = "foto/" . $ruta_foto_nombre;
                    
                        // Mover el archivo a la carpeta de destino
                        move_uploaded_file($ruta_foto_tmp, $ruta_foto_destino);
                    
                        // Actualizar el campo 'ruta_curp' en la base de datos
                        $sql_update_curp = "UPDATE archivos SET ruta_foto = '$ruta_foto_destino' WHERE id = '$archivo_id'";
                        $conn->query($sql_update_curp);
                    }

                    

                    // Repite el proceso para los otros campos de archivo (ruta_curp, ruta_ccb, etc.)

                    // Redireccionar a la página actual
                    echo '<script>window.location.href = window.location.href;</script>';
                }

                // Cerrar la conexión a la base de datos
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- ----------------------------------------------------------------------------------- -->

    </div>

</main>
</div>
</div>

    
</body>
</html>
