<?php
    require '../Config/ConexionBD.php';

    class MultaCRUD{
        public static function BusquedaEliminar($id){
            global $mysqli;
            
            $sql = "select * from Multa where idMulta = ?;";
        
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("i",$id);
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
        public static function RegistroMulta($tipoMulta,$horasMulta){
            global $mysqli;

            $sql = 'insert into Multa (TipoMulta,HorasServicio) values (?,?);';

            if($registro = $mysqli->prepare($sql)){
                $registro->bind_param("si",$tipoMulta,$horasMulta);
                return $registro->execute();
            }else{
                return false;
            }
        }
        public static function ConsultaGeneral(){
            global $mysqli;

            unset($_SESSION['DatosConsultaGeneral']);
            unset($_SESSION['DatosConsultaXnombre']);
            unset($_SESSION['DatosConsultaXhoras']);

            $sql = 'select * from Multa;';

            if($consultaGeneralMulta = $mysqli->prepare($sql)){
                $consultaGeneralMulta->execute();
                $resultadoConsulta = $consultaGeneralMulta->get_result();

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
        public static function ConsultaXmulta($tipoMulta){
            global $mysqli;
            
            unset($_SESSION['DatosConsultaGeneral']);
            unset($_SESSION['DatosConsultaXnombre']);
            unset($_SESSION['DatosConsultaXhoras']);

            $sql = 'select * from Multa where TipoMulta = ?;';

            if($consultaXtm = $mysqli->prepare($sql)){
                $consultaXtm->bind_param('s',$tipoMulta);
                $consultaXtm->execute();
                $resultadoConsulta = $consultaXtm->get_result();

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
        public static function ConsultaXhoras($horasMulta){
            global $mysqli;
            
            unset($_SESSION['DatosConsultaGeneral']);
            unset($_SESSION['DatosConsultaXnombre']);
            unset($_SESSION['DatosConsultaXhoras']);

            $sql = 'select * from Multa where HorasServicio = ?;';

            if($consultaXh = $mysqli->prepare($sql)){
                $consultaXh->bind_param('i',$horasMulta);
                $consultaXh->execute();
                $resultadoConsulta = $consultaXh->get_result();

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
        public static function ModificarTipoMulta($tipoMulta,$idMulta){
            global $mysqli;

            $sql = 'update Multa set TipoMulta = ? where idMulta = ?;';

            if($modificacionXtipoM = $mysqli->prepare($sql)){
                $modificacionXtipoM->bind_param('si',$tipoMulta,$idMulta);
                if($modificacionXtipoM->execute()){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public static function ModificarHoras($horas,$idMulta){
            global $mysqli;

            $sql = 'update Multa set HorasServicio = ? where idMulta = ?;';

            if($modificacionXhora = $mysqli->prepare($sql)){
                $modificacionXhora->bind_param('ii',$horas,$idMulta);
                if($modificacionXhora->execute()){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public static function ModificacionCompleta($tipoMulta,$horas,$idMulta){
            global $mysqli;

            $sql = 'update Multa set TipoMulta = ?, HorasServicio = ? where idMulta = ?;';

            if($modificacionTotal = $mysqli->prepare($sql)){
                $modificacionTotal->bind_param('sii',$tipoMulta,$horas,$idMulta);
                if($modificacionTotal->execute()){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public static function EliminarMulta($idMulta){
            global $mysqli;

            $sql = 'delete from Multa where idMulta = ?;';

            if ($eliminar = $mysqli->prepare($sql)) {
                $eliminar->bind_param('i', $idMulta);
                
                if ($eliminar->execute()) {
                    return $eliminar->affected_rows > 0; // Devuelve true si se eliminó al menos una fila, false si no.
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