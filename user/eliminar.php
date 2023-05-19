<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Realizar la conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "asistencias");

    // Verificar la conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Preparar la consulta SQL para eliminar el empleado
    $sql = "DELETE FROM empleado WHERE id='$id'";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // Eliminación exitosa
        header("Location: index.php");
        exit();
    } else {
        // Error al eliminar el registro
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>
