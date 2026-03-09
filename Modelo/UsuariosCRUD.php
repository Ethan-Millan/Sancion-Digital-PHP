<?php
    require '../Config/ConexionBD.php';

    class CRUD{    
        
        
        public static function SancionVigilantes(){
            global $mysqli;

            $sql = 'select matriculaV from Vigilante;';

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

        public static function ConsultaAdminMod($matricula){
            global $mysqli;
            
            $sql = "select * from Administrador where matriculaA = ?;";
        
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("s",$matricula);
                $consulta->execute();
                $resultado=$consulta->get_result();

                if($resultado->num_rows > 0){
                    return$resultado->fetch_assoc();
                }else {
                    return [];
                }
            }else{
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return [];
            }
        }
        public static function ConsultaModificarV($matricula){
            global $mysqli;
            
            $sql = "select * from Vigilante where matriculaV = ?;";
        
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("s",$matricula);
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

        public static function ConsultaModificar($matricula){
            global $mysqli;
            
            $sql = "select * from Alumno where matricula = ?;";
        
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("s",$matricula);
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
        public static function EliminarAdmin($adminE){
            global $mysqli;

            $sql = 'delete from Administrador where matriculaA = ?;';

            if ($eliminacion = $mysqli->prepare($sql)) {
                $eliminacion->bind_param("s", $adminE);
                
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
        public static function ModificarAdmin($matriculaOld,$matriculaNew,$nombreA,$apellidoA,$contraA,$fechaNac,$genero){
            global $mysqli;

            $sql = 'update Administrador set matriculaA = ?, nombreA = ?, apellidosA = ?, fechaNac = ?, generoA = ?, contraA = ? where matriculaA = ?;';

            if($update = $mysqli->prepare($sql)){
                // Agrega las variables a la sentencia, incluyendo la matrícula anterior
                $update->bind_param("sssssss", $matriculaNew,$nombreA,$apellidoA,$fechaNac,$genero,$contraA,$matriculaOld);
                return $update->execute(); // Retorna true si tuvo éxito
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return false; // Retorna false en caso de error
            }
        }
        public static function ConsultaGeneralAdmin(){
            global $mysqli;

            $sql = 'select matriculaA,nombreA,apellidosA from Administrador;';

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

        public static function ConsultaXmatriculaAdmin($matricula){
            global $mysqli;

            $sql = 'select matriculaA,nombreA,apellidosA from Administrador where matriculaA = ?;';
                    
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param('s',$matricula);
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
        public static function ConsultaXnombreAdmin($nombreA){
            global $mysqli;

            $sql = 'select matriculaA,nombreA,apellidosA from Administrador where nombreA = ?;';
                
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param('s',$nombreA);
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
        public static function ConsultaXapellidoAdmin($apellidosA){
            global $mysqli;

            $sql = 'select matriculaA,nombreA,apellidosA from Administrador where apellidosA = ?;';
                
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param('s',$apellidosA);
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

        public static function ModificarV($matriculaVold,$matriculaVnew,$nombreV,$apellidosV,$genero,$fechaNacV,$contraV,$rol){
            global $mysqli;

            $sql = 'update Vigilante set matriculaV = ?, nombreV = ?, apellidosV = ?, generoV = ?, fecha_nacV = ?, contraV = ?, cargoV = ? where matriculaV = ?;';

            if($update = $mysqli->prepare($sql)){
                // Agrega las variables a la sentencia, incluyendo la matrícula anterior
                $update->bind_param("ssssssss", $matriculaVnew,$nombreV,$apellidosV,$genero,$fechaNacV,$contraV,$rol,$matriculaVold);
                return $update->execute(); // Retorna true si tuvo éxito
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return false; // Retorna false en caso de error
            }
        }

        public static function ConsultaGeneralVigilante(){
            global $mysqli;

            $sql = 'select matriculaV,nombreV,apellidosV,cargoV from Vigilante;';

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

        public static function ConsultaXmatriculaV($matricula){
            global $mysqli;

            $sql = 'select matriculaV,nombreV,apellidosV,cargoV from Vigilante where matriculaV = ?;';
                    
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param('s',$matricula);
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
        public static function ConsultaXnombreV($nombreV){
            global $mysqli;

            $sql = 'select matriculaV,nombreV,apellidosV,cargoV from Vigilante where nombreV = ?;';
                
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param('s',$nombreV);
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
        public static function ConsultaXapellidoV($apellidosV){
            global $mysqli;

            $sql = 'select matriculaV,nombreV,apellidosV,cargoV from Vigilante where apellidosV = ?;';
                
            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param('s',$apellidosV);
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

        public static function EliminarVigilante($matricula){
            global $mysqli;
            $sql = 'delete from Vigilante where matriculaV = ?;';

            if ($eliminacion = $mysqli->prepare($sql)) {
                $eliminacion->bind_param("s", $matricula);
                
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

        public static function EliminarAlumno($matricula){
            global $mysqli;
            $sql = 'delete from Alumno where matricula = ?;';

            if ($eliminacion = $mysqli->prepare($sql)) {
                $eliminacion->bind_param("s", $matricula);
                
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

        public static function ModificarA($matriculaOld,$matriculaNew,$nombre,$apellidos,$genero,$fechaNac,$contra,$grado,$grupo,$especialidad){
            global $mysqli;
            $sql = 'update Alumno set matricula = ?, nombre = ?, apellidos = ?, genero = ?, fecha_nac = ?, contra = ?, grado = ?, grupo = ?, idProgramaEducativo = ? where matricula = ?;';

            if($update = $mysqli->prepare($sql)){
                // Agrega las variables a la sentencia, incluyendo la matrícula anterior
                $update->bind_param("ssssssisis", $matriculaNew, $nombre, $apellidos, $genero, $fechaNac, $contra, $grado, $grupo, $especialidad, $matriculaOld);
                return $update->execute(); // Retorna true si tuvo éxito
            } else {
                error_log("Error al preparar la consulta: " . $mysqli->error);
                return false; // Retorna false en caso de error
            }
        }

        public static function ConsultaXmatriculaAlumo($matricula){
            global $mysqli;
            $sql = 'select matricula,nombre,apellidos,genero,grado,grupo,NombreCarrera from Alumno inner join programaeducativo on Alumno.idProgramaEducativo = programaeducativo.idProgramaEducativo where Alumno.matricula = ?;';

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
        public static function ConsutlaXnombreAlumno($nombre){
            global $mysqli;
            $sql = 'select matricula,nombre,apellidos,genero,grado,grupo,NombreCarrera from Alumno inner join programaeducativo on Alumno.idProgramaEducativo = programaeducativo.idProgramaEducativo where Alumno.nombre = ?;';

            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("s",$nombre);
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
        public static function ConsultaXapellidoAlumo($apellido){
            global $mysqli;
            $sql = 'select matricula,nombre,apellidos,genero,grado,grupo,NombreCarrera from Alumno inner join programaeducativo on Alumno.idProgramaEducativo = programaeducativo.idProgramaEducativo where Alumno.apellidos = ?;';

            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param("s",$apellido);
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

        public static function ConsultaGeneralAlumos(){
            global $mysqli;

            $sql = 'select matricula,nombre,apellidos,genero,grado,grupo,NombreCarrera from Alumno inner join programaeducativo on Alumno.idProgramaEducativo = programaeducativo.idProgramaEducativo;';

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
        
        public static function VerificarMatricula($matricula){
            global $mysqli;
            //CONSULTA ALUMNO
            $sql = 'select matricula from Alumno where matricula = ?;';

            if($consulta = $mysqli->prepare($sql)){
                $consulta->bind_param('s',$matricula);
                if($consulta->execute()){
                    $resultado = $consulta->get_result();//obtiene el resutlado de la consulta
                    
                    if($resultado->num_rows > 0){//Verifica si hay algun tipo de resultado 
                        return true; //Retorna verdadero si hay algo 
                    }else{
                        //CONSULTA VIGILANTE
                        $sql = 'select matriculaV from vigilante where matriculaV = ?;';

                        if($consulta = $mysqli->prepare($sql)){
                            $consulta->bind_param('s',$matricula);
                            if($consulta->execute()){
                                $resultado = $consulta->get_result();//obtiene el resutlado de la consulta
                                
                                if($resultado->num_rows > 0){//Verifica si hay algun tipo de resultado 
                                    return true; //Retorna verdadero si hay algo 
                                }else{
                                    //CONSULTA ADMIN
                                    $sql = 'select matriculaA from administrador where matriculaA = ?;';
                                    if($consulta = $mysqli->prepare($sql)){
                                        $consulta->bind_param('s',$matricula);
                                        if($consulta->execute()){
                                            $resultado = $consulta->get_result();//obtiene el resutlado de la consulta
                                            
                                            if($resultado->num_rows > 0){//Verifica si hay algun tipo de resultado 
                                                return true; //Retorna verdadero si hay algo 
                                            }else{
                                                return false;//No se encontro una matricula igual
                                            }
                                        }
                                    }
                                    
                                }
                            }
                        }
                    }
                }
            }
        }
        /*FUNCION PARA REGISTRAR A LOS ALUMNOS*/

        public static function RegistroU($matricula,$nombre,$apellidos,$genero,$fechaNac,$contra,$grado,$grupo,$especialidad){
            global $mysqli;
            /*PREPARA LA SENTENCIA SQL*/
            $sql = "insert into Alumno (matricula,nombre,apellidos,genero,fecha_nac,contra,grado,grupo,idProgramaEducativo) values (?,?,?,?,?,?,?,?,?);";

            if($insert = $mysqli->prepare($sql)){
                /*AGREGA LAS VARIABLES A LA SENTENCIA*/
                $insert->bind_param("ssssssisi",$matricula,$nombre,$apellidos,$genero,$fechaNac,$contra,$grado,$grupo,$especialidad);
                return $insert->execute();/*RETORNA UN TRUE SI HUBO EXITO*/
            }else{
                return false;/*RETORNA FALSE EN CASO DE NO TENER EXITO */
            }
        }
        /*FUNCION PARA REGISTRAR A LOS VIGILANTES */
        public static function RegistroV($matriculaV,$nombreV,$apellidosV,$genero,$fechaNacV,$contraV,$rol){
            global $mysqli;
            $sql = "insert into Vigilante (matriculaV,nombreV,apellidosV,generoV,fecha_nacV,contraV,cargoV) values (?,?,?,?,?,?,?);";
            if($insert = $mysqli->prepare($sql)){
                /*AGREGA LAS VARIABLES A LA SENTENCIA*/
                $insert->bind_param("sssssss",$matriculaV,$nombreV,$apellidosV,$genero,$fechaNacV,$contraV,$rol);
                return $insert->execute();
            }else{
                return false;
            }
        }
        /*FUNCION PARA REGISTRAR A LOS ADMINISTRADORES */
        public static function RegistroA($matricula,$nombreA,$apellidoA,$contraA,$fechaNac,$genero){
            global $mysqli;
            $sql = "insert into Administrador (matriculaA,nombreA,apellidosA,fechaNac,generoA,contraA) value (?,?,?,?,?,?);";
            if($insert = $mysqli->prepare($sql)){
                $insert->bind_param("ssssss",$matricula,$nombreA,$apellidoA,$fechaNac,$genero,$contraA);
                return $insert->execute();
            }else{
                return false;
            }
        }
        public static function IniciarSA($usuario,$password){
            global $mysqli;
            
            $sql = "select nombre,apellidos,matricula, grado, grupo, NombreCarrera  from Alumno inner join programaeducativo on programaeducativo.idProgramaEducativo = Alumno.idProgramaEducativo where matricula = ? and contra = ?;"; 
            if($IniciarSesion = $mysqli->prepare($sql)){//Prepara la consulta 
                $IniciarSesion->bind_param("ss",$usuario,$password);
                $IniciarSesion->execute();
                $resultado = $IniciarSesion->get_result();
                if($resultado->num_rows > 0){
                    $datosEncontrados = $resultado->fetch_assoc();//Obtiene los datos de una fila a la vez una nadamasy los guara en un array associativo
                    $datosEncontrados['tipoUsuario'] = 'Alumno';//Se le asigna otro valor o campo al arreglo para asi poder identificar en el controlador que usaurio es
                    return $datosEncontrados;   
                }else{
                    $sql = "select nombreV,apellidosV,matriculaV,cargoV from Vigilante where matriculaV = ?  and contraV = ?;";
                    if($IniciarSesion = $mysqli->prepare($sql)){//Prepara la consulta 
                        $IniciarSesion->bind_param("ss",$usuario,$password);
                        $IniciarSesion->execute();
                        $resultado = $IniciarSesion->get_result();
                        if($resultado->num_rows > 0){
                            $datosEncontrados = $resultado->fetch_assoc();//Obtiene los datos de una fila a la vez una nadamasy los guara en un array associativo
                            $datosEncontrados['tipoUsuario'] = 'Vigilante';
                            return $datosEncontrados;    
                        }else{
                            $sql = "select matriculaA,nombreA,apellidosA from Administrador where matriculaA = ? and contraA = ?;";
                            if($IniciarSesion = $mysqli->prepare($sql)){//Prepara la consulta 
                                $IniciarSesion->bind_param("ss",$usuario,$password);
                                $IniciarSesion->execute();
                                $resultado = $IniciarSesion->get_result();
                                if($resultado->num_rows > 0){
                                    $datosEncontrados = $resultado->fetch_assoc();//Obtiene los datos de una fila a la vez una nadamasy los guara en un array associativo
                                    $datosEncontrados['tipoUsuario'] = 'Administrador';
                                    return $datosEncontrados;
                                }else{
                                    return false;
                                }
                            }
                        }
                    }
                }
            }
            
        }
    }


?>