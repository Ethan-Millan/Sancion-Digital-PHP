<?php
require '../Config/ConexionBD.php';

class BaseDatos {
    public static function RespaldoBD() {
        $user = "root";         // Usuario de la base de datos
        $password = "";          // Contraseña (si tienes una, agrégala aquí)
        $dbname = "EstanciaII";  // Nombre de la base de datos

        // Construcción del comando
        $command = "C:\\xampp\\mysql\\bin\\mysqldump -h localhost -u $user --password=$password $dbname";

        // Ejecutar el comando y capturar la salida
        $output = [];
        $resultCode = null;
        exec($command, $output, $resultCode);

        // Verificar si el comando fue exitoso
        if ($resultCode !== 0) {
            return false;
        }

        // Convertir el arreglo de salida en un solo string SQL
        return implode("\n", $output);
    }
    public static function RestaurarBD($filePath) {
        $user = "root";       // Usuario de la base de datos
        $password = "";        // Contraseña de la base de datos
        $dbname = "EstanciaII";// Nombre de la base de datos

        // Construye el comando para restaurar
        $command = "C:\\xampp\\mysql\\bin\\mysql -h localhost -u $user --password=$password $dbname < \"$filePath\"";

        // Ejecuta el comando y captura el resultado
        $output = [];
        $resultCode = null;
        exec($command, $output, $resultCode);

        // Verifica si la restauración fue exitosa
        if ($resultCode !== 0) {
            echo "<pre>Error al ejecutar el comando de restauración. Código de salida: $resultCode</pre>";
            echo "<pre>Salida: " . implode("\n", $output) . "</pre>";
            return false;
        }
        
        return true;
    }
}

?>
