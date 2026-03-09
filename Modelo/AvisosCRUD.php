<?php
require '../Config/ConexionBD.php';

class AvisosCRUD{
    public static function BuscarPorCategoria($categoria) {
        global $mysqli;
        $sql = 'select * from avisos where categoria = ?;';
    
        if ($consulta = $mysqli->prepare($sql)) {
            $consulta->bind_param("s", $categoria);
    
            if ($consulta->execute()) {
                $resultado = $consulta->get_result();
                return $resultado->fetch_all(MYSQLI_ASSOC); // Devuelve un array asociativo con los resultados
            } else {
                error_log("error al ejecutar la búsqueda: " . $mysqli->error);
                return null;
            }
        } else {
            error_log("error al preparar la búsqueda: " . $mysqli->error);
            return null;
        }
    }
    
    public static function BuscarPorFecha($fecha) {
        global $mysqli;
        $sql = 'select * from avisos where fecha = ?;';
    
        if ($consulta = $mysqli->prepare($sql)) {
            $consulta->bind_param("s", $fecha);
    
            if ($consulta->execute()) {
                $resultado = $consulta->get_result();
                return $resultado->fetch_all(MYSQLI_ASSOC); // Devuelve un array asociativo con los resultados
            } else {
                error_log("error al ejecutar la búsqueda: " . $mysqli->error);
                return null;
            }
        } else {
            error_log("error al preparar la búsqueda: " . $mysqli->error);
            return null;
        }
    }
    
    public static function BuscarPorTitulo($titulo) {
        global $mysqli;
        $sql = 'select * from avisos where titulo = ?;';
    
        if ($consulta = $mysqli->prepare($sql)) {
            $consulta->bind_param("s", $titulo);
    
            if ($consulta->execute()) {
                $resultado = $consulta->get_result();
                return $resultado->fetch_all(MYSQLI_ASSOC); // Devuelve un array asociativo con los resultados
            } else {
                error_log("error al ejecutar la búsqueda: " . $mysqli->error);
                return null;
            }
        } else {
            error_log("error al preparar la búsqueda: " . $mysqli->error);
            return null;
        }
    }
    
    public static function ModificacionAviso($idAviso, $titulo, $fecha, $descripcion, $categoria, $matriculaV) {
        global $mysqli;
        $sql = 'update avisos set titulo = ?, fecha = ?, descripcion = ?, categoria = ?, vigilante_matriculav = ? where idavisos = ?;';
    
        if ($update = $mysqli->prepare($sql)) {
            $update->bind_param("sssssi", $titulo, $fecha, $descripcion, $categoria, $matriculaV, $idAviso);
            return $update->execute(); // Retorna true si tuvo éxito
        } else {
            error_log("error al preparar la consulta: " . $mysqli->error);
            return false; // Retorna false en caso de error
        }
    }
    
    public static function EliminarAviso($idAviso) {
        global $mysqli;
        $sql = 'delete from avisos where idavisos = ?;';
    
        if ($eliminacion = $mysqli->prepare($sql)) {
            $eliminacion->bind_param("i", $idAviso); // Vincula el parámetro ID del aviso como entero
    
            if ($eliminacion->execute()) {
                return $eliminacion->affected_rows > 0; // Devuelve true si se eliminó al menos una fila
            } else {
                error_log("error al ejecutar la eliminación: " . $mysqli->error);
                return false;
            }
        } else {
            error_log("error al preparar la eliminación: " . $mysqli->error);
            return false;
        }
    }
    
    public static function BusquedaGeneral(){
        global $mysqli;

        $sql = 'select * from Avisos;';

        if($consulta = $mysqli->prepare($sql)){
            $consulta->execute();
            $resultado = $consulta->get_result();
            
            if($resultado->num_rows > 0){
                return $resultado->fetch_all(MYSQLI_ASSOC);
            }else{
                return [];
            }
        }else {
            error_log("Error al preparar la consulta: " . $mysqli->error);
            return []; // Devuelve un array vacío en caso de error
        }
    }
    public static function BusquedaMod($idM){
        global $mysqli;
        
        $sql = "select * from Avisos where idAvisos = ?;";
    
        if($consulta = $mysqli->prepare($sql)){
            $consulta->bind_param("i",$idM);
            $consulta->execute();
            $resultado=$consulta->get_result();

            if($resultado->num_rows > 0){
                return$resultado->fetch_assoc();
            }else {
                return null;

            }
        }else{
            error_log("Error al preparar la consulta: " . $mysqli->error);
            return [];
        }
    }
    public static function RegistrarAviso($Titulo, $FechaP, $Importancia, $descripcion, $matriculaV) {
        global $mysqli;
        $sql = "insert into Avisos (Titulo, Fecha, Categoria, Descripcion, vigilante_matriculaV) values (?, ?, ?, ?, ?);";

        if ($insert = $mysqli->prepare($sql)) {
            $insert->bind_param("sssss", $Titulo, $FechaP, $Importancia, $descripcion, $matriculaV);
            return $insert->execute(); // Retorna true si se ejecuta con éxito
        } else {
            return false; // Retorna false en caso de error
        }
    }
    public static function AvisosGeneral(){
        global $mysqli;

            $sql = 'select * from Avisos;';

            if($consulta = $mysqli->prepare($sql)){
                $consulta->execute();
                $resultadoConsulta = $consulta->get_result();

                if($resultadoConsulta->num_rows > 0){

                    return $resultadoConsulta->fetch_all(MYSQLI_ASSOC);
                }else{
                    return [];
                }
            }else{
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return [];
            }
    }
}
?>
