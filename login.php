<?php
// Verificar si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establecer conexión a la base de datos (reemplaza los valores con los de tu servidor)
    $servername = "192.168.101.15";
    $username_db = "root"; // Cambiado a $username_db para evitar sobrescribir la variable de entrada de usuario
    $password_db = "123456789";
    $dbname = "sistema de ventas";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Obtener nombre de usuario y contraseña enviados desde el formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prevenir inyección SQL utilizando consultas preparadas
    $sql = "SELECT * FROM usuarios WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario encontrado, verificar contraseña
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Inicio de sesión exitoso
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo 'success';
        } else {
            // Contraseña incorrecta
            echo 'error';
        }
    } else {
        // Usuario no encontrado
        echo 'error';
    }

    $stmt->close();
    $conn->close();
}
?>

