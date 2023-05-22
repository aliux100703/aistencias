<?php
if (isset($_POST['editar'])) {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $curp = $_POST['curp'];
    $act_naci = $_POST['act_naci'];
    $ccb = $_POST['ccb'];
    $correo = $_POST['correo'];
    $rfc = $_POST['rfc'];
    $ubicacion = $_POST['ubicacion'];
    $ine = $_POST['ine'];
    $nss = $_POST['nss'];
    $telefono = $_POST['telefono'];
    $area_id = $_POST['area_id'];
    $sueldo = $_POST['sueldo'];
    $fecha_alta = $_POST['fecha_alta'];
    $foto = $_POST['foto'];
    // Obtén los demás campos del formulario aquí

    // Realizar la conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "asistencias");

    // Verificar la conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Preparar la consulta SQL para actualizar el empleado
    $sql = "UPDATE empleado SET nombre='$nombre', apellidos='$apellidos', curp='$curp', act_naci='$act_naci', ccb='$ccb', correo='$correo', rfc='$rfc', ubicacion='$ubicacion', ine='$ine', nss='$nss', telefono='$telefono', area_id='$area_id', sueldo='$sueldo', fecha_alta='$fecha_alta', foto='$foto' WHERE id='$id'";

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
