<?php
if (isset($_POST['crear'])) {
    // Obtener los datos del formulario
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

    // Preparar la consulta SQL para insertar un nuevo empleado
    $sql = "INSERT INTO usuario (username, email, pasword,rol_id, area_id)
            VALUES ('$username','$email','$password','$rol_id',  '$area_id', )";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // Obtener el ID del registro recién creado
        $idEmpleado = mysqli_insert_id($conexion);

        // Ejecutar la consulta de asistencias
        if (mysqli_query($conexion, $sqlAsistencias)) {
            // Registro y relación creados exitosamente
            header("Location: index.php");
            exit();
        } else {
            // Error al crear la relación en asistencias
            echo "Error: " . $sqlAsistencias . "<br>" . mysqli_error($conexion);
        }
    } else {
        // Error al crear el registro de empleado
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>