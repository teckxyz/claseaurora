<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los mensajes enviados desde el formulario
    $mensaje1 = $_POST['mensaje1'] ?? '';
    $mensaje2 = $_POST['mensaje2'] ?? '';

    // Ruta del archivo donde se guardarán los mensajes
    $archivoMensajes = 'mensajes.txt';

    // Crear o abrir el archivo de mensajes en modo escritura
    $archivo = fopen($archivoMensajes, 'a');

    // Verificar si el archivo se abrió correctamente
    if ($archivo) {
        // Escribir los mensajes en el archivo
        fwrite($archivo, "Mensaje 1:\n$mensaje1\n\n");
        fwrite($archivo, "Mensaje 2:\n$mensaje2\n\n");

        // Cerrar el archivo
        fclose($archivo);

        echo 'Mensajes guardados correctamente.';
    } else {
        echo 'No se pudo abrir el archivo para guardar los mensajes.';
    }
} else {
    // Redireccionar o mostrar un mensaje de error si se accede directamente a este archivo PHP sin un formulario POST
    echo 'Acceso no autorizado.';
}
?>
