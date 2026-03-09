<?php
    require '../Config/ConexionBD.php';

    class SancionCRUD{

        public static function GeneroM($fecha) {
            global $mysqli;
            $sql = "select count(*) as total from alumno inner join sancion on alumno.matricula = sancion.matriculaalumno where alumno.genero = 'hombre' and sancion.fecha_multa between ? and curdate();";
        
            if ($consulta = $mysqli->prepare($sql)) {
                $consulta->bind_param("s", $fecha);
                $consulta->execute();
                $resultado = $consulta->get_result();
        
                if ($resultado->num_rows > 0) {
                    return $resultado->fetch_assoc();
                } else {
                    return [];
                }
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return [];
            }
        }
        
        public static function GeneroF($fecha) {
            global $mysqli;
            $sql = "select count(*) as total from alumno inner join sancion on alumno.matricula = sancion.matriculaalumno where alumno.genero = 'mujer' and sancion.fecha_multa between ? and curdate();";
        
            if ($consulta = $mysqli->prepare($sql)) {
                $consulta->bind_param("s", $fecha);
                $consulta->execute();
                $resultado = $consulta->get_result();
        
                if ($resultado->num_rows > 0) {
                    return $resultado->fetch_assoc();
                } else {
                    return [];
                }
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return [];
            }
        }
        
        public static function Completadas($fecha) {
            global $mysqli;
            $sql = "select count(*) as total from sancion where pagada = 1 and fecha_multa between ? and curdate();";
        
            if ($consulta = $mysqli->prepare($sql)) {
                $consulta->bind_param("s", $fecha);
                $consulta->execute();
                $resultado = $consulta->get_result();
        
                if ($resultado->num_rows > 0) {
                    return $resultado->fetch_assoc();
                } else {
                    return [];
                }
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return [];
            }
        }
        
        public static function NoCompletadas($fecha) {
            global $mysqli;
            $sql = "select count(*) as total from sancion where pagada = 0 and fecha_multa between ? and curdate();";
        
            if ($consulta = $mysqli->prepare($sql)) {
                $consulta->bind_param("s", $fecha);
                $consulta->execute();
                $resultado = $consulta->get_result();
        
                if ($resultado->num_rows > 0) {
                    return $resultado->fetch_assoc();
                } else {
                    return [];
                }
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return [];
            }
        }
        
        public static function General() {
            global $mysqli;
            $sql = "select fecha_multa, count(*) as total from sancion group by fecha_multa order by fecha_multa asc;";
        
            if ($consulta = $mysqli->prepare($sql)) {
                $consulta->execute();
                $resultado = $consulta->get_result();
        
                if ($resultado->num_rows > 0) {
                    
                    $fechas = [];
                    $totales = [];
                    while ($fila = $resultado->fetch_assoc()) {
                        $fechas[] = $fila['fecha_multa'];
                        $totales[] = $fila['total'];
                    }
                    return ['fechas' => $fechas, 'totales' => $totales];
                } else {
                    return ['fechas' => [], 'totales' => []];
                }
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return ['fechas' => [], 'totales' => []];
            }
        }
        
        public static function GeneralFecha($fecha) {
            global $mysqli;
            $sql = "select fecha_multa, count(*) as total from sancion where fecha_multa between ? and curdate() group by fecha_multa;";
        
            if ($consulta = $mysqli->prepare($sql)) {
                $consulta->bind_param("s", $fecha);
                $consulta->execute();
                $resultado = $consulta->get_result();
        
                if ($resultado->num_rows > 0) {
                    
                    $fechas = [];
                    $totales = [];
                    while ($fila = $resultado->fetch_assoc()) {
                        $fechas[] = $fila['fecha_multa'];
                        $totales[] = $fila['total'];
                    }
                    return ['fechas' => $fechas, 'totales' => $totales];
                } else {
                    return ['fechas' => [], 'totales' => []];
                }
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return ['fechas' => [], 'totales' => []];
            }
        }
        
        public static function MarcarLeido($idSancion){
            global $mysqli;

            $sql = 'update Sancion set avisado = 1 where idM = ?;';

            if($update = $mysqli->prepare($sql)){
                // Agrega las variables a la sentencia, incluyendo la matrícula anterior
                $update->bind_param("i", $idSancion);
                return $update->execute(); // Retorna true si tuvo éxito
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return false; // Retorna false en caso de error
            }
        }
        public static function ConsultarXavisos($matricula){
            global $mysqli;

            $sql = 'select * from Sancion inner join Multa on Sancion.Multa_idMulta = Multa.idMulta where matriculaAlumno = ? and avisado = 0;';

            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("s",$matricula);
                $consulta->execute();
                $resultado = $consulta->get_result();
                
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    return [];
                }
            }
        }

        public static function ConsultaFechaPDF($fecha1,$fecha2){
            global $mysqli;
            $sql = 'select * from sancion inner join multa on sancion.multa_idmulta = multa.idmulta where sancion.fecha_multa between ? and ?;';

            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("ss",$fecha1,$fecha2);
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

        public static function ConsultaGeneroPDF($genero){
            global $mysqli;
            $sql = 'select * from sancion inner join alumno on sancion.matriculaalumno = alumno.matricula inner join vigilante on sancion.matriculavigilante = vigilante.matriculav inner join multa on sancion.multa_idmulta = multa.idmulta where alumno.genero = ?;';

            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("s",$genero);
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

        public static function ConsultaMultaPDF($Multa){
            global $mysqli;
            $sql = 'select * from Sancion inner join Multa on Sancion.Multa_idMulta = Multa.idMulta where Multa_idMulta = ?;';

            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("i",$Multa);
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

        public static function BusquedaGeneralporAlumnoPDf($matricula){
            global $mysqli;

            $sql = 'select * from Sancion inner join Multa on Sancion.Multa_idMulta = Multa.idMulta where matriculaAlumno = ?;';

            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("s",$matricula);
                $consulta->execute();
                $resultado = $consulta->get_result();
                
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    $sql = 'select * from Sancion inner join Multa on Sancion.Multa_idMulta = Multa.idMulta where matriculaVigilante = ?;';

                    if($consulta = $mysqli->prepare($sql)){
                        $consulta->bind_param("s",$matricula);
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
            }else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return []; // Devuelve un array vacío en caso de error
            }
        }

        public static function BuscarPorMulta($multa){
            global $mysqli;
            
            $sql = "select * from Sancion inner join Multa on Sancion.Multa_idMulta = Multa.idMulta where Multa_idMulta = ?;";
        
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param('i',$multa);
                $consulta->execute();
                $resultado = $consulta->get_result();
                
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    return [];
                }
            }
        }

        public static function BuscarPorPago($pago){
            global $mysqli;
            
            $sql = "select * from Sancion inner join Multa on Sancion.Multa_idMulta = Multa.idMulta where pagada = ?;";
        
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param('i',$pago);
                $consulta->execute();
                $resultado = $consulta->get_result();
                
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    return [];
                }
            }
        }

        public static function BuscarPorFecha($fecha){
            global $mysqli;
            
            $sql = "select * from Sancion inner join Multa on Sancion.Multa_idMulta = Multa.idMulta where fecha_multa = ?;";
        
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param('s',$fecha);
                $consulta->execute();
                $resultado = $consulta->get_result();
                
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    return [];
                }
            }
        }

        public static function MultasRecientesAlumno($matricula){
            global $mysqli;
            $sql = "select * from sancion inner join multa on sancion.multa_idmulta = multa.idmulta where sancion.matriculaalumno = ? and sancion.avisado = 0;";
                    if($consulta = $mysqli->prepare($sql)){
                        $consulta->bind_param('s',$matricula);
                        $consulta->execute();
                        $resultado = $consulta->get_result();
                        
                        if($resultado->num_rows > 0){
                            return $resultado->fetch_all(MYSQLI_ASSOC);
                        }else{
                            return [];
                        }
                    }else{
                        error_log("Error al preparar la consulta: " . $mysqli->error);
                        return [];
                    }
        }

        public static function BuscarMatricula($matriculaB){
            global $mysqli;
            
            $sql = "select * from Sancion inner join Multa on Sancion.Multa_idMulta = Multa.idMulta where matriculaAlumno = ?;";
        
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param('s',$matriculaB);
                $consulta->execute();
                $resultado = $consulta->get_result();
                
                if($resultado->num_rows > 0){
                    return $resultado->fetch_all(MYSQLI_ASSOC);
                }else{
                    $sql = "select * from Sancion inner join Multa on Sancion.Multa_idMulta = Multa.idMulta where matriculaVigilante = ?;";
                    if($consulta = $mysqli->prepare($sql)){
                        $consulta->bind_param('s',$matriculaB);
                        $consulta->execute();
                        $resultado = $consulta->get_result();
                        
                        if($resultado->num_rows > 0){
                            return $resultado->fetch_all(MYSQLI_ASSOC);
                        }else{
                            return [];
                        }
                    }else{
                        error_log("Error al preparar la consulta: " . $mysqli->error);
                        return [];
                    }
                }
            }else{
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return []; // Devuelve un array vacío en caso de error
            }
        }

        public static function ModificacionSancion($id,$matriculaA,$matriculaV,$fecha,$descripcion,$pago,$multa){
            global $mysqli;

            $sql = 'update Sancion set matriculaAlumno = ?, matriculaVigilante = ?, fecha_multa = ?, descripcion = ?, pagada = ?, Multa_idMulta = ? where idM = ?;';

            if($update = $mysqli->prepare($sql)){
                // Agrega las variables a la sentencia, incluyendo la matrícula anterior
                $update->bind_param("ssssiii", $matriculaA,$matriculaV,$fecha,$descripcion,$pago,$multa,$id);
                return $update->execute(); // Retorna true si tuvo éxito
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return false; // Retorna false en caso de error
            }
        }
        public static function BusquedaMod($idM){
            global $mysqli;
            
            $sql = "select * from Sancion where idM = ?;";
        
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
        public static function EliminarSancion($idM){
            global $mysqli;
            $sql = 'delete from Sancion where idM = ?;';

            if ($eliminacion = $mysqli->prepare($sql)) {
                $eliminacion->bind_param("i", $idM);
                
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
        public static function BusquedaGeneral(){
            global $mysqli;

            $sql = 'select *,TipoMulta from Sancion inner join Multa on Sancion.Multa_idMulta = Multa.idMulta;';

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
        public static function RegistrarSancion($matriculaAlumno,$matriculaVigilante,$fechaMulta,$descripcion,$Pago,$Multa){
            global $mysqli;

            $sql = 'insert into sancion (matriculaAlumno, matriculaVigilante, fecha_multa, descripcion, pagada, Multa_idMulta) values (?,?,?,?,?,?);';
            if($insert = $mysqli->prepare($sql)){
                $insert->bind_param("sssssi",$matriculaAlumno,$matriculaVigilante,$fechaMulta,$descripcion,$Pago,$Multa);
                return $insert->execute(); 
            }else{
                return false;
            }
        }
        public static function ValidarMatriculasRegistroVigilante($matriculaAlumno,$matriculaSancionador){
            global $mysqli;
            //Validacion alumnos
            $sqlAlumno = 'select matricula from Alumno where matricula = ?;';

            if($Validacion = $mysqli->prepare($sqlAlumno)){
                $Validacion->bind_param("s",$matriculaAlumno);
                if(!$Validacion->execute()){
                        echo "<script>
                            alert('Error al preparar la consulta del alumno');
                            window.location.href = '../Controlador/Controlador.php?accion=Redireccion&accion2=RegistrarSancion';   
                        </script>";
                    return false;
                    
                }
                $Validacion->store_result();//Guarda los datos en memoria para que num rows pueda manejarlos esto para evitar problemas con librerias
                if($Validacion->num_rows() > 0){  
                    //Validacion Vigilantes
                    $sqlVigilante = 'select matriculaV from Vigilante where matriculaV = ?;';

                    if($Validacion2 = $mysqli->prepare($sqlVigilante)){
                        $Validacion2->bind_param('s',$matriculaSancionador);
                        if(!$Validacion2->execute()){
                                echo "<script>
                                            alert('Error al preparar la consulta del sancionador');
                                            window.location.href = '../Controlador/Controlador.php?accion=Redireccion&accion2=RegistrarSancion';
                                        </script>";
                                    return false;
                        }
                        $Validacion2->store_result();
                        if($Validacion2->num_rows() > 0){
                            return true;
                        }else{
                            echo "<script>
                            alert('La matricula del sancionador no existe!');
                            window.location.href = '../Controlador/Controlador.php?accion=Redireccion&accion2=RegistrarSancion';
                            </script>";
                            return false;
                        }
                    }
                }else{
                    echo "<script>
                            alert('La matricula del alumno no existe');
                            window.location.href = '../Controlador/Controlador.php?accion=Redireccion&accion2=RegistrarSancion';
                        </script>";
                    return false;
                }
            }

        }
        
    }
?>