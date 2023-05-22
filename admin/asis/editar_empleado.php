<?php
// Verificar si se recibieron los datos del formulario
if (isset($_POST['idEmpleado'])) {
    // Obtener los valores enviados desde el formulario
    $idEmpleado = $_POST['idEmpleado'];
    $abandono = $_POST['abandono'];
    $enfermo = $_POST['enfermo'];
    $falto = $_POST['falto'];
    $no_r = $_POST['no_r'];
    $permiso = $_POST['permiso'];
    $retardo = $_POST['retardo'];

    // Realizar la lógica de actualización en la base de datos
    // Aquí debes establecer la conexión a la base de datos y ejecutar el SQL para actualizar los datos del empleado con los nuevos valores

    // Ejemplo de conexión y ejecución de consulta
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "asistencias";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Actualizar los valores en la tabla "asistencias" para el empleado específico
    $sql = "UPDATE asistencias SET abandono = '$abandono', enfermo = '$enfermo', falto = '$falto', no_r = '$no_r', permiso = '$permiso', retardo = '$retardo' WHERE nombre_id = '$idEmpleado'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "No se recibieron los datos del formulario.";
}
?>
