<!DOCTYPE html>
<html>
<head>
  <title>Mantenimiento de Productos - Consulta</title>
  <link rel="stylesheet" type="text/css" href="estilo1.css">

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

  // Obtener el texto de búsqueda (si existe)
  $search = isset($_GET['search']) ? $_GET['search'] : '';

  // Consultar los productos que coincidan con el texto de búsqueda
  $sql = "SELECT * FROM Producto WHERE Nombre LIKE '%$search%'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<h3>Resultados de búsqueda:</h3>";
    echo "<table>";
    echo "<tr><th>ID Producto</th><th>Nombre</th><th>Descripción</th><th>Stock</th><th>Precio de Venta</th></tr>";

    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['IdProducto'] . "</td>";
      echo "<td>" . $row['Nombre'] . "</td>";
      echo "<td>" . $row['Descripcion'] . "</td>";
      echo "<td>" . $row['Stock'] . "</td>";
      echo "<td>" . $row['PrecioVenta'] . "</td>";
      echo "</tr>";
    }

    echo "</table>";
  } else {
    echo '<p class="error-message">No se encontró el producto</p>';
  }

  // Cerrar la conexión a la base de datos
  $conn->close();
  ?>
   <div class="back-link">
   <a href="index.html">Volver</a>
   </div>
</body>
</html>
