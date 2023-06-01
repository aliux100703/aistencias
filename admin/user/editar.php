<?php
if (isset($_POST['editar'])) {
    // Obtener los datos del formulario
    $id = $_POST['id'];
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

    // Preparar la consulta SQL para actualizar el empleado
    $sql = "UPDATE empleado SET nombre='$nombre', apellidos='$apellidos', correo='$correo', ubicacion='$ubicacion', telefono='$telefono', area_id='$area_id', sueldo='$sueldo', fecha_alta='$fecha_alta' WHERE id='$id'";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // Actualización exitosa
        header("Location: index.php");
        exit();
    } else {
        // Error al actualizar el registro
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>
