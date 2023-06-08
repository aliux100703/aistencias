<?php
if (isset($_POST['editar'])) {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol_id= $_POST['rol_id'];
    $area_id  = $_POST['area_id'];
    // Obtén los demás campos del formulario aquí

    // Realizar la conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "usuario");

    // Verificar la conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Preparar la consulta SQL para actualizar el empleado
    $sql = "UPDATE empleado SET username='$username', email='$email', password='$pasword',rol_id='$rol_id',  area_id='$area_id', WHERE id='$id'";

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
