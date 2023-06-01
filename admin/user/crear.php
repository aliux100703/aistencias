<?php
if (isset($_POST['crear'])) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];

    $correo = $_POST['correo'];
    
    $ubicacion = $_POST['ubicacion'];

    $telefono = $_POST['telefono'];
    $area_id = $_POST['area_id'];
    $sueldo = $_POST['sueldo'];
    $fecha_alta = $_POST['fecha_alta'];
 
    // Obtén los demás campos del formulario aquí

    // Realizar la conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "asistencias");

    // Verificar la conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Preparar la consulta SQL para insertar un nuevo empleado
    $sql = "INSERT INTO empleado (nombre, apellidos, correo, ubicacion, telefono, area_id, sueldo, fecha_alta)
            VALUES ('$nombre', '$apellidos', '$correo', '$ubicacion', '$telefono', '$area_id', '$sueldo', '$fecha_alta')";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // Obtener el ID del registro recién creado
        $idEmpleado = mysqli_insert_id($conexion);

        // Preparar la consulta SQL para insertar el ID en la tabla archivos
        $sqlArchivos = "INSERT INTO archivos (empleado_id) VALUES ($idEmpleado)";

        // Ejecutar la consulta de archivos
        if (mysqli_query($conexion, $sqlArchivos)) {
            // Registro y relación creados exitosamente
            // Preparar la consulta SQL para insertar el ID en la tabla asistencias
            $sqlAsistencias = "INSERT INTO asistencias (nombre_id) VALUES ($idEmpleado)";

            // Ejecutar la consulta de asistencias
            if (mysqli_query($conexion, $sqlAsistencias)) {
                // Registro y relaciones creados exitosamente
                header("Location: index.php");
                exit();
            } else {
                // Error al crear la relación en asistencias
                echo "Error: " . $sqlAsistencias . "<br>" . mysqli_error($conexion);
            }
        } else {
            // Error al crear el registro de archivos
            echo "Error: " . $sqlArchivos . "<br>" . mysqli_error($conexion);
        }
    } else {
        // Error al crear el registro de empleado
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>
