<?php
// Verificar si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer conexión a la base de datos (reemplaza los valores con los de tu servidor)
    $servername = "localhost";
    $username = "tu_usuario";
    $password = "tu_contraseña";
    $dbname = "tu_base_de_datos";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $pedido = $_POST['pedido'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Preparar la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO clientes (codigo, nombre, apellido, dni, pedido, fecha, hora)
    VALUES ('$codigo', '$nombre', '$apellido', '$dni', '$pedido', '$fecha', '$hora')";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente registrado exitosamente";
    } else {
        echo "Error al registrar el cliente: " . $conn->error;
    }

    $conn->close();
}
?>
