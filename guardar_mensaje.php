<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $datos = "Nombre: $nombre\nEmail: $email\nMensaje: $mensaje\n\n";

    // Ruta y nombre del archivo de texto donde se guardarán los mensajes
    $archivo = 'mensajes.txt';

    // Guardar los datos en el archivo
    file_put_contents($archivo, $datos, FILE_APPEND | LOCK_EX);

    // Redireccionar a una página de éxito o mostrar un mensaje de éxito aquí
    header('Location: Contacto.php');
    exit();
}
?>
