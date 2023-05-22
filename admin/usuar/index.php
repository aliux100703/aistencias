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

</head>

<body>
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
</body>

</html>