<?php
$archivo = "contador.txt"; // Nombre del archivo que almacenará el contador de visitas

if (file_exists($archivo)) {
    $contador = file_get_contents($archivo); // Lee el contenido del archivo
    $contador = intval($contador); // Convierte el valor a entero
    $contador++; // Incrementa el contador en 1
} else {
    $contador = 1; // Si el archivo no existe, se establece el contador en 1
}

file_put_contents($archivo, $contador); // Guarda el nuevo valor del contador en el archivo

echo "Visitas: " . $contador; // Muestra el contador de visitas en la página
?>
