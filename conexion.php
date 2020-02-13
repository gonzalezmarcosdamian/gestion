<?php
/////// CONEXIÓN A LA BASE DE DATOS ///////// 
  
$link = mysqli_connect('localhost','root','','departamento_obra'); 

if (!$link) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

//echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
//echo "Información del host: " . mysqli_get_host_info($link) . PHP_EOL;

return $link; 


?>
