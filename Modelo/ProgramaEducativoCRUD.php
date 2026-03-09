    <?php
    require '../Config/ConexionBD.php';

    class CRUDProEdu{
        public static function BusquedaPorID($id){
            global $mysqli;
            
            $sql = "select * from ProgramaEducativo where idProgramaEducativo = ?;";
        
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("s",$id);
                $consulta->execute();
                $resultado=$consulta->get_result();

                if($resultado->num_rows > 0){
                    return$resultado->fetch_assoc();//se usa cuando se espera recuperar varias filas de la bd
                }else {
                    return [];
                }
            }else{
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return [];
            }
        }
        /*Funcion registrar Programa Educativo  */
        public static function RegistrarProEdu($nombreProEdu,$claveProEdu){
            global $mysqli;
            
            $sql = "insert into ProgramaEducativo (NombreCarrera,ClaveCarrera) values (?,?);";

            if($insert = $mysqli->prepare($sql)){
                $insert->bind_param("ss",$nombreProEdu,$claveProEdu);
                return $insert->execute();
            }else{
                return false;
            }
        }
        public static function ModificarTodo($idMod,$newNombre,$newClave){
            global $mysqli;

            $sql = "update ProgramaEducativo set NombreCarrera = ?, ClaveCarrera = ? where idProgramaEducativo = ?;";

            if($modificar = $mysqli->prepare($sql)){
                $modificar->bind_param("ssi",$newNombre,$newClave,$idMod);
                if($modificar->execute()){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public static function ModificarNombre($id,$nombreNew){
            global $mysqli;

            $sql = "update ProgramaEducativo set NombreCarrera = ? where idProgramaEducativo = ?;";

            if($modificar = $mysqli->prepare($sql)){
                $modificar->bind_param("si",$nombreNew,$id);
                if($modificar->execute()){
                    return true;
                }else{
                    return false;
                }
            }else {
                return false; // Fallo al preparar la consulta
            }
        }
        public static function ModificarClave($id,$newClave){
            global $mysqli;
            $sql = "update ProgramaEducativo set ClaveCarrera = ? where idProgramaEducativo = ?;";
            if($modificar = $mysqli->prepare($sql)){
                $modificar->bind_param("si",$newClave,$id);
                if($modificar->execute()){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public static function BusquedaGeneral() {
            global $mysqli;
            unset($_SESSION['DatosConsultaGeneral']);
            unset($_SESSION['DatosConsultaXnombre']);
            unset($_SESSION['DatosConsultaXclave']);
            $sql = "select * from ProgramaEducativo;";
        
            if ($consulta = $mysqli->prepare($sql)) {
                $consulta->execute();
                $resultado = $consulta->get_result();
        
                if ($resultado->num_rows > 0) {
                    // Devuelve todos los resultados en un array asociativo
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                } else {
                    return []; // Devuelve un array vacío si no hay resultados
                }
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return []; // Devuelve un array vacío en caso de error
            }
        }
        public static function BusquedaXnombre($nombrePE){
            global $mysqli;
            unset($_SESSION['DatosConsultaGeneral']);
            unset($_SESSION['DatosConsultaXnombre']);
            unset($_SESSION['DatosConsultaXclave']);
            $sql = "select * from ProgramaEducativo where NombreCarrera = ?;";
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("s",$nombrePE);
                $consulta->execute();
                $resultado=$consulta->get_result();

                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);//se usa cuando se espera recuperar varias filas de la bd
                }else {
                    return [];
                }
            }else{
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return [];
            }
        }
        public static function BusquedaXclave($clavePE){
            global $mysqli;
            unset($_SESSION['DatosConsultaGeneral']);
            unset($_SESSION['DatosConsultaXnombre']);
            unset($_SESSION['DatosConsultaXclave']);
            $sql = "select * from ProgramaEducativo where ClaveCarrera = ?;";

            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("s",$clavePE);
                $consulta->execute();
                $resultado = $consulta->get_result();
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);//se usa cuando se espera recuperar una fila de la bd 
                }else {
                    return null;//devuelve null por que se espera un array y no un true o false
                }
            }else{
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return null;
            }
        }
        public static function EliminarProEdu($idE){
            global $mysqli;

            $sql = "delete from ProgramaEducativo where idProgramaEducativo = ?;";

            if ($eliminacion = $mysqli->prepare($sql)) {
                $eliminacion->bind_param("i", $idE);
                
                if ($eliminacion->execute()) {
                    return $eliminacion->affected_rows > 0; // Devuelve true si se eliminó al menos una fila.
                } else {
                    error_log("Error al ejecutar la eliminación: " . $mysqli->error);
                    return false;
                }
            } else {
                error_log("Error al preparar la eliminación: " . $mysqli->error);
                return false;
            }
            
        }
        
    }

?>
