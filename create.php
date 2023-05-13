<!DOCTYPE html>
<html>
<head>
  <title>Mantenimiento de Productos - Crear</title>
  <link rel="stylesheet" href="estilo2.css">
</head>
<body>
  <?php
  // Realizar la conexión a la base de datos
  $servername = "localhost";
  $username = "root";
  $password = "usbw";
  $dbname = "Eval02";

  $conn = new mysqli("localhost", "root", "usbw", "Eval02");

  // Verificar si hay error en la conexión
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  // Obtener los datos del formulario
  $nombre = $_POST['nombre'];
  $descripcion = $_POST['descripcion'];
  $stock = $_POST['stock'];
  $precioVenta = $_POST['precioVenta'];

  // Insertar el producto en la base de datos
  $sql = "INSERT INTO Producto (Nombre, Descripcion, Stock, PrecioVenta) VALUES ('$nombre', '$descripcion', '$stock', '$precioVenta')";

  if ($conn->query($sql) === TRUE) {
    echo '<p class="exito">Producto registrado exitosamente.</p>';
  } else {
    echo "Error al registrar el producto: " . $conn->error;
  }

  // Cerrar la conexión a la base de datos
  $conn->close();
  ?>

  <a href="index.html">Volver</a>
</body>
</html>
