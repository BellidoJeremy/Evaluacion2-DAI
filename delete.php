<!DOCTYPE html>
<html>
<head>
  <title>Mantenimiento de Productos - Eliminar</title>
</head>
<body>
<?php
// Verificar si se recibió el ID del producto a eliminar
if (isset($_POST['idProducto'])) {
    $idProducto = $_POST['idProducto'];

    // Realizar la conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "usbw", "Eval02");

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Realizar la consulta SQL para eliminar el producto
    $sql = "DELETE FROM Producto WHERE IdProducto = $idProducto";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $sql)) {
        // Redireccionar al usuario a la página index.php
        header("Location: index.html");
        exit();
    } else {
        echo "Error al eliminar el producto: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "No se recibió el ID del producto";
    exit();
}
?>


</body>
</html>
