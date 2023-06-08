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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
                            <a class="dropdown-item menuperfil cerrar" href="#"><i class="fas fa-sign-out-alt m-1"></i>Salir
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
                    <a href="../subida_de_archivos/index.php">
                        <center><span>Archivos</span></center>
                    </a>
                </nav>
            </div>
            <main class="main col">

                <div class="container">
                    <h1>Usuarios</h1>
                    <table class="table table-bordered table-striped" style="margin-top:20px;">
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
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
                                // $consulta = "SELECT * FROM usuario";
                                // Consulta con INNER JOIN de tres tablas
                                /* $consulta = "SELECT usuario.*, area.nombre_area 
                             FROM usuario
                            INNER JOIN area ON usuario.area_id = area.id";*/

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
                                    echo "<td>" . $fila['rol'] . "</td>";
                                    echo "<td>" . $fila['nombre_area'] . "</td>";
                                    echo "</tr>";
                                }

                                echo "</tbody>";
                                echo "</table>";

                                // Cerrar la conexión a la base de datos
                                $conn = null;
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

        </div>

        </main>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/646c794df3.js"></script>
</body>

</html>