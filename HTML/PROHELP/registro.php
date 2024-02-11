<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Direccion = $_POST['Direccion'];
$Barrio = $_POST['Barrio'];
$Telefono = $_POST['Telefono'];
$Fecha_nacimiento = $_POST['Fecha_nacimiento'];
$Correo = $_POST['Correo'];

echo 'Se esta ejecutando el script'

// Conexión a la base de datos utilizando la extensión mysqli
$enlaceBD = mysqli_connect('localhost', 'root', '', 'prohelp');

if ($enlaceBD) {
    echo "Conexión exitosa";
} else {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
}

// Seleccionar la base de datos
if (mysqli_select_db($enlaceBD, 'prohelp')) {
    // Preparar la consulta SQL con sentencia preparada
    $query = "INSERT INTO usuario (Nombre, Apellido, Direccion, Barrio, Telefono, Fecha_nacimiento, Correo) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($enlaceBD, $query);

    if ($stmt) {
        // Enlazar los parámetros con las variables
        mysqli_stmt_bind_param($stmt, 'ssssiss', $Nombre, $Apellido, $Direccion, $Barrio, $Telefono, $Fecha_nacimiento, $Correo);

        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt)) {
            echo 'Registro exitoso';
        } else {
            echo 'Error al registrar: ' . mysqli_error($enlaceBD);
        }

        // Cerrar la sentencia
        mysqli_stmt_close($stmt);
    } else {
        echo 'Error al preparar la consulta: ' . mysqli_error($enlaceBD);
    }
} else {
    die("No se pudo seleccionar la base de datos: " . mysqli_error($enlaceBD));
}

// Cerrar la conexión
mysqli_close($enlaceBD);
?>
?>