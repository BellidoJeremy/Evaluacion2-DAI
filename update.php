<?php
// Verificar si se recibió el ID del producto a actualizar
if (isset($_POST['idProducto'])) {
    $idProducto = $_POST['idProducto'];

    // Realizar la conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "usbw", "Eval02");

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Verificar si se recibieron los datos del formulario
    if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['stock']) && isset($_POST['precioVenta'])) {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $precioVenta = $_POST['precioVenta'];

        // Realizar la consulta SQL para actualizar el producto
        $sql = "UPDATE Producto SET Nombre='$nombre', Descripcion='$descripcion', Stock='$stock', PrecioVenta='$precioVenta' WHERE IdProducto=$idProducto";

        // Ejecutar la consulta
        if (mysqli_query($conexion, $sql)) {
            // Redireccionar al usuario a la página index.php
            header("Location: index.html");
            exit();
        } else {
            echo "Error al actualizar el producto: " . mysqli_error($conexion);
        }
    }

    // Realizar la consulta SQL para obtener los datos del producto a actualizar
    $sql = "SELECT * FROM Producto WHERE IdProducto = $idProducto";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);

    // Verificar si se encontró el producto
    if (mysqli_num_rows($resultado) > 0) {
        // Obtener los datos del producto
        $producto = mysqli_fetch_assoc($resultado);
    } else {
        echo "No se encontró el producto";
        exit();
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "No se recibió el ID del producto";
    exit();
}
?>


