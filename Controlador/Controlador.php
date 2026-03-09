<?php
    
    require '../Config/ConexionBD.php';
    require '../Modelo/UsuariosCRUD.php';
    require '../Modelo/SancionCRUD.php';
    require '../Modelo/ProgramaEducativoCRUD.php';
    require '../Modelo/MultasCRUD.php';
    require '../Modelo/BD.php';
    require '../Config/dompdf/autoload.inc.php';
    require '../Modelo/GenerarPDF.php';
    require '../Modelo/AvisosCRUD.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $accion = $_POST['accion'];
    }else{
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $accion = $_GET['accion'];
        }
    }
    switch($accion){
        case "Redireccion"://Aqui se va a interntara manejar todas las peticiones que sean para redireccionar a otra pagina 
            $accion2 = $_GET['accion2'];
            switch($accion2){
                case 'Contactanos':
                    header('Location: ../Vista/html/Contacto.html');
                    break;
                case 'CrudSancion':
                    header('Location: ../Vista/html/CrudSancion.php');
                    break;
                case 'RegresarPagAdmin':
                    header('Location: ../Vista/html/PaginaInicioA.php');
                    break;
                case 'RegresarVigilante':
                    header('Location: ../Vista/html/PaginaInicioV.php');
                    break;
                case 'RegresarAlumno':
                    header('Location: ../Vista/html/PaginaInicioU.php');
                    break;
                case 'RegresarIndex':
                    header('Location: ../Vista/html/index.html');
                    break;
                case 'RegistrarUsuairos':
                    header('Location: ../Vista/html/SeleccionUsuario.html');
                    break;
                case 'IniciarS':
                    header('Location: ../Vista/html/InicioS.html');
                    break;
                case 'Antecedentes':
                    header('Location: ../Vista/html/Antecedentes.html');
                    break;
                case 'RegistroAlumno':
                    session_start();
                    $consulta = CRUDProEdu::BusquedaGeneral();
                    
                    if($consulta !== null ){
                        $_SESSION['DatosConsultaGeneral'] = $consulta;
                        header('Location: ../Vista/html/RegistrarAlumno.php');
                    }else{
                        header('Location: ../Vista/html/RegistrarAlumno.php');
                    }         
                    break;
                case 'RegistroAlumnoIndex':
                    session_start();
                    $consulta = CRUDProEdu::BusquedaGeneral();
                    
                    if($consulta !== null ){
                        $_SESSION['DatosConsultaGeneral'] = $consulta;
                        header('Location: ../Vista/html/RegistrarAlumnoIndex.php');
                    }else{
                        header('Location: ../Vista/html/RegistrarAlumnoIndex.php');
                    }         
                    break;
                case 'RegistroVigilante':
                    header('Location: ../Vista/html/RegistrarVigilante.html');
                    break;
                case 'RegistrarSancionV':
                    session_start();
                    $consultaVigilantes = CRUD::SancionVigilantes();
                    if($consultaVigilantes !== null){
                        $_SESSION['MatriculaVigilantes'] = $consultaVigilantes;
                    }
                    $consulta = MultaCRUD::ConsultaGeneral();

                    if($consulta !== null){
                        $_SESSION['DatosConsultaMulta'] = $consulta;
                        header('Location: ../Vista/html/RegistrarSancionV.php');
                    }else{
                        header('Location: ../Vista/html/RegistrarSancionV.php');
                    }
                    
                    break;
                case 'RegistroAdministrador':
                    header('Location: ../Vista/html/RegistrarAdministrador.html');
                    break;
                case 'RegistrarSancion':
                    session_start();
                    $consultaVigilantes = CRUD::SancionVigilantes();
                    if($consultaVigilantes !== null){
                        $_SESSION['MatriculaVigilantes'] = $consultaVigilantes;
                    }
                    $consulta = MultaCRUD::ConsultaGeneral();

                    if($consulta !== null){
                        $_SESSION['DatosConsultaMulta'] = $consulta;
                        header('Location: ../Vista/html/RegistrarSancion.php');
                    }else{
                        header('Location: ../Vista/html/RegistrarSancion.php');
                    }
                    
                    break;

                case 'GestionCrud':
                    header('Location: ../Vista/html/CrudUsuarios.php');
                    break;
                case 'CrudAlumnos':
                    header('Location: ../Vista/html/CrudAlumnos.php');
                    break;
                case 'CrudUsuarios':
                    header('Location: ../Vista/html/CrudUsuarios.php');
                    break;
                case 'ProgramaEducativo':
                    header('Location: ../Vista/html/CrudProEducativo.php');
                    break;
                case 'RegistrarPE':
                    header('Location: ../Vista/html/RegistrarProgEdu.php');
                    break;
                case 'RegistroProEdu':
                    header('Location: ../Vista/html/RegistrarProgEdu.php');
                    break;
                case 'ModificarProEdu':
                    header('Location: ../Vista/html/ModificarProEdu.php');
                    break;
                case 'EliminarProEdu':
                    header('Location: ../Vista/html/EliminarProEdu.php');
                    break;
                case 'GestionMulta':
                    header('Location: ../Vista/html/CrudMultas.php');
                    break;
                case 'RegistrarMulta':
                    header('Location: ../Vista/html/RegistrarMulta.php');
                    break;
                case 'ModificarMulta':
                    header('Location: ../Vista/html/ModificarMulta.php');
                    break;
                case 'EliminarMulta':
                    header('Location: ../Vista/html/EliminarMulta.php');
                    break;
                case 'ModificarAlumno':
                    header('Location: ../Vista/html/ModificarAlumno.php');
                    break;
                case 'EliminarAlumno':
                    header('Location: ../Vista/html/EliminarAlumno.php');
                    break;
                case 'CrudVigilante':
                    header('Location: ../Vista/html/CrudVigilantes.php');
                    break;
                case 'RegistrarVigilante':
                    header('Location: ../Vista/html/RegistrarVigilante.php');
                    break;
                case 'ModificarVigilante':
                    header('Location: ../Vista/html/ModificarVigilante.php');
                    break;
                case 'EliminarVigilante':
                    header('Location: ../Vista/html/EliminarVigilante.php');
                    break;
                case 'CrudAdmin':
                    header('Location: ../Vista/html/CrudAdmin.php');
                    break;
                case 'RegistrarVAdmin':
                    header('Location: ../Vista/html/RegistrarAdministrador.php');
                    break;
                
                case 'CrudAldmin':
                    session_start();
                    // Limpia los registros de administradores
                    unset($_SESSION['registrosAdministradores']);
                    header('Location: ../Vista/html/CrudAdmin.php');
                    break;
                case 'ModificarAdmin':
                    header('Location: ../Vista/html/ModificarAdmin.php');
                    break;
                case 'EliminarAdmin':
                    header('Location: ../Vista/html/EliminarAdmin.php');
                    break;
                case 'GestionSancion':
                    header('Location: ../Vista/html/CrudSancion.php');
                    break;
                case 'GestionSancionV':
                    header('Location: ../Vista/html/GestionSancionV.php');
                    break;
                case 'BuscarSancion':
                    session_start();
                    $consulta = MultaCRUD::ConsultaGeneral();

                    if($consulta !== null){
                        $_SESSION['DatosConsultaMulta'] = $consulta;
                        header('Location: ../Vista/html/BuscarSancion.php');
                    }else{
                        header('Location: ../Vista/html/BuscarSancion.php');
                    }

                    break;
                case 'BuscarSancionV':
                    session_start();
                    $consulta = MultaCRUD::ConsultaGeneral();

                    if($consulta !== null){
                        $_SESSION['DatosConsultaMulta'] = $consulta;
                        header('Location: ../Vista/html/BuscarSancionV.php');
                    }else{
                        header('Location: ../Vista/html/BuscarSancionV.php');
                    }

                    break;
                case 'CrudBD':
                    header('Location: ../Vista/html/ResBD.php');
                    break;
                case 'BasedeDatos':
                    header('Location: ../Vista/html/Basededatos.php');
                    break;
                case 'PDF':
                    session_start();
                    $consulta = MultaCRUD::ConsultaGeneral();

                    if($consulta !== null){
                        $_SESSION['DatosConsultaMulta'] = $consulta;
                        header('Location: ../Vista/html/PDF.php');
                    }else{
                        header('Location: ../Vista/html/PDF.php');
                    }
                    
                    break;
                case 'Dashboard':
                    header('Location: ../Vista/html/Dashboard.php');
                    break;
                case 'ConsultasRecientesAlum':
                    session_start();
                    $matricula = $_GET['matricula'];
                    $consulta = SancionCRUD::MultasRecientesAlumno($matricula);
                    if($consulta !== null){
                        $_SESSION['DatosSancion'] = $consulta;
                        header('Location: ../Vista/html/ConsultasRecientesAlum.php');
                    }else{
                        header('Location: ../Vista/html/ConsultasRecientesAlum.php');
                    }
                    
                    break;
                case 'ConsultasRecientesAlumT':
                    session_start();
                    $matricula = $_GET['matricula'];
                    $consulta = SancionCRUD::BuscarMatricula($matricula);
                    if($consulta !== null){
                        $_SESSION['DatosSancion'] = $consulta;
                        header('Location: ../Vista/html/ConsultasTotalesAlum.php');
                    }else{
                        header('Location: ../Vista/html/ConsultasTotalesAlum.php');
                    }
                    break;
                case 'CrudAvisos':
                    header('Location: ../Vista/html/CrudAvisos.php');
                    break;
                case 'RegistrarAvisos':
                    session_start();
                    $consultaVigilantes = CRUD::SancionVigilantes();
                    if($consultaVigilantes !== null){
                        $_SESSION['MatriculaVigilantes'] = $consultaVigilantes;
                    }
                    header('Location: ../Vista/html/RegistrarAvisos.php');
                    break;
                case 'BuscarAvisos':
                    header('Location: ../Vista/html/BuscarAvisos.php');
                    break;
                
            }
            break;
        case 'SancionesNoRead':
            $matricula = $_GET['matricula'];

            $consulta = SancionCRUD::ConsultarXavisos($matricula);
            if($consulta !== null){
                $_SESSION['SancionesNoRead'] = $consulta;
                header('Location: ../Vista/html/PaginaInicioU.php');
            }else{
                $_SESSION['SancionesNoRead'] = [];
                header('Location: ../Vista/html/PaginaInicioU.php');
            }
            break;
        case 'EnviarMensaje':
            echo "<script>
                    alert('Mensaje resivido!!.');
                    window.location.href = '../Vista/html/index.html';
                    </script>";
                    exit();
            break;
        case 'GenerarPDF':
            session_start();
            if (isset($_SESSION['htmlContenido'])) {
                $html = $_SESSION['htmlContenido'];
                
                // Llama al modelo para generar el PDF con el contenido HTML
                $pdf = new PDF();
                $pdf->generarPDF($html);
                
                // Limpia el contenido de la sesión
                unset($_SESSION['htmlContenido']);
            } else {
                echo "No se encontró contenido para el PDF.";
            }

            break;
        case 'ConsultaFechaPDF':
            session_start();
            $fecha1 = $_POST['fecha1'];
            $fecha2 = $_POST['fecha2'];
            $consultaGSan = SancionCRUD::ConsultaFechaPDF($fecha1,$fecha2);
            if($consultaGSan !== null){
                $_SESSION['DatosSancion'] = $consultaGSan;
                header('Location: ../Vista/html/ConsultaFechaPDF.php');
            }else{
                header('Location: ../Vista/html/ConsultaFechaPDF.php');
            }
            break;
        case 'ConsultaGeneroPDF':
            session_start();
            $genero = $_POST['Genero'];
            $consultaGSan = SancionCRUD::ConsultaGeneroPDF($genero);
            if($consultaGSan !== null){
                $_SESSION['DatosSancion'] = $consultaGSan;
                $_SESSION['GeneroSeleccionado'] = $genero;
                header('Location: ../Vista/html/ConsultaGeneroPDF.php');
            }else{
                header('Location: ../Vista/html/ConsultaGeneroPDF.php');
            }
            break;
        case 'ConsultaMultaPDF':
            session_start();
            $Multa = $_POST['Multa'];
            $consultaGSan = SancionCRUD::ConsultaMultaPDF($Multa);
            if($consultaGSan !== null){
                $_SESSION['DatosSancion'] = $consultaGSan;
                header('Location: ../Vista/html/ConsultaMultaPDF.php');
            }else{
                header('Location: ../Vista/html/ConsultaMultaPDF.php');
            }
            break;
        case 'ConsultaGeneralPorAlumnoPDF':
            session_start();
            $matricula = $_POST['txtMatricula'];
            $consultaGSan = SancionCRUD::BusquedaGeneralporAlumnoPDf($matricula);
            if($consultaGSan !== null){
                $_SESSION['DatosSancion'] = $consultaGSan;
                header('Location: ../Vista/html/PDFPorAlumno.php');
            }else{
                header('Location: ../Vista/html/PDFPorAlumno.php');
            }
            break;
        case 'RestauracionBD':
            if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
                // Ruta temporal del archivo subido
                $fileTmpPath = $_FILES['archivo']['tmp_name'];

                // Llama a la función de restauración en el modelo
                $resultado = BaseDatos::RestaurarBD($fileTmpPath);

                if ($resultado) {
                    echo "<script>
                    alert('Restauración completada con éxito.');
                    window.location.href = '../Vista/html/Basededatos.php';
                    </script>";
                    exit();
                } else {
                    echo "<script>
                    alert('Error al restaurar la base de datos.');
                    window.location.href = '../Vista/html/Basededatos.php';
                    </script>";
                    exit();
                }
            } else {
                echo "<script>
                    alert('Error en la carga del archivo.');
                    window.location.href = '../Vista/html/Basededatos.php';
                    </script>";
                    exit();
                
            }
            break;

            case 'RegistrarAviso':
                $Titulo = $_POST['txtTitulo'];
                $FechaP = $_POST['txtFechaP'];
                $Importancia = $_POST['Importancia'];
                $descripcion = $_POST['txtDescripcion'];
                $matriculaV = $_POST['MatriculaVigilante'];
            
                // Validar campos vacíos
                if (empty($Titulo) || empty($FechaP) || empty($Importancia) || empty($descripcion)) {
                    echo "<script>
                        alert('No puede haber campos vacíos.');
                        window.location.href = '../Vista/html/RegistrarAvisos.php';
                        </script>";
                    exit();
                }
            
                // Llamar al modelo para insertar el aviso
                $registro = AvisosCRUD::RegistrarAviso($Titulo, $FechaP, $Importancia, $descripcion, $matriculaV);
            
                if ($registro !== null) {
                    echo "<script>
                        alert('Registro Exitoso.');
                        window.location.href = '../Vista/html/RegistrarAvisos.php';
                        </script>";
                    exit();
                } else {
                    echo "<script>
                        alert('Registro Fallido.');
                        window.location.href = '../Vista/html/RegistrarAvisos.php';
                        </script>";
                    exit();
                }
                break;
        case 'dashboard2':
                session_start();
                $fecha = $_POST['fechaConsulta'];
                $generoM = SancionCRUD::GeneroM($fecha);
                $generoF =  SancionCRUD::GeneroF($fecha);
                $completadas = SancionCRUD::Completadas($fecha);
                $noCompletadas = SancionCRUD::NoCompletadas($fecha);
                $todas = SancionCRUD::General();
                $todasFecha = SancionCRUD::GeneralFecha($fecha);
                $_SESSION['GeneroM'] = $generoM;
                $_SESSION['GeneroF'] = $generoF;
                $_SESSION['Completadas'] = $completadas;
                $_SESSION['NoCompletadas'] = $noCompletadas;
                $_SESSION['Todas'] = $todas;
                $_SESSION['TodasFecha'] = $todasFecha;
                header('Location: ../Vista/html/Dashboard.php');
            break;
        case 'MarcarLeidoSancionAlum':
            session_start();
            $idSancion = $_GET['idM'];

            $leido = SancionCRUD::MarcarLeido($idSancion);

            if($leido !== null){
                $matricula = $_GET['matricula'];
                $consulta = SancionCRUD::MultasRecientesAlumno($matricula);
                if($consulta !== null){
                    $_SESSION['DatosSancion'] = $consulta;
                    header('Location: ../Vista/html/ConsultasRecientesAlum.php');
                }else{
                    header('Location: ../Vista/html/ConsultasRecientesAlum.php');
                }
            }else{
                echo "<script>
                        alert('No se pudo marcar como leido intentalo despues.');
                        window.location.href = '../Vista/html/ConsultasRecientesAlum.php';
                        </script>";
                    exit();
            }
        break;
        case 'ModificarAvisoView':
            session_start();
            
            // Verificar si se pasó un idAviso en la URL
            if (isset($_GET['idAviso'])) {
                $idAviso = $_GET['idAviso'];
                
                // Buscar el aviso
                $consultaAviso = AvisosCRUD::BusquedaMod($idAviso);
                if ($consultaAviso !== null) {
                    // Almacenar los datos del aviso en sesión
                    $_SESSION['AvisoMod'] = $consultaAviso;
                    header('Location: ../Vista/html/ModificarAviso.php');
                    exit();  // Detener ejecución después de la redirección
                } else {
                    // Redirigir a la página de búsqueda si no se encuentra el aviso
                    header('Location: ../Vista/html/BuscarAvisos.php');
                    exit();  // Detener ejecución después de la redirección
                }
            } else {
                // Redirigir a la página de búsqueda si no hay idAviso
                header('Location: ../Vista/html/BuscarAvisos.php');
                exit();
            }
            break;
        case 'ConsultaGeneralAvisos':
        session_start();
        $consultaGAvisos = AvisosCRUD::BusquedaGeneral();
        if ($consultaGAvisos !== null) {
            $_SESSION['DatosAvisos'] = $consultaGAvisos;
            header('Location: ../Vista/html/BuscarAvisos.php');
        } else {
            header('Location: ../Vista/html/BuscarAvisos.php');
        }
        break;

        case 'EliminarAviso':
            $idAviso = $_GET['idAviso'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas eliminar este Aviso?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=EliminarAviso2&idAviso=$idAviso';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se eliminó el Aviso');
                    window.location.href = '../Vista/html/BuscarAvisos.php';
                }
            </script>";
            break;
            case 'ModificarAviso':
            $idAviso = $_POST['idAviso'];
            $titulo = $_POST['txtTitulo'];
            $fecha = $_POST['txtFechaP'];
            $descripcion = $_POST['txtDescripcion'];
            $categoria = $_POST['Importancia'];
            $matriculaV = $_POST['MatriculaVigilante'];

            echo "<script>
                if (confirm('¿Estás seguro de que deseas modificar este Aviso?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la modificación
                    window.location.href = '../Controlador/Controlador.php?accion=ModificarAviso2&idAviso=" . urlencode($idAviso) . "&titulo=" . urlencode($titulo) . "&fecha=" . urlencode($fecha) . "&descripcion=" . urlencode($descripcion) . "&categoria=" . urlencode($categoria) . "&matriculaV=" . urlencode($matriculaV) . "';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se modificó el Aviso');
                    window.location.href = '../Vista/html/BuscarAvisos.php';
                }
            </script>";
            break;
            case 'BuscarAvisoTitulo':
                session_start();
                $titulo = $_POST['txtTituloB'];
            
                if (empty($titulo)) {
                    echo "<script>
                        alert('Por favor ingresa un título para buscar.');
                        window.location.href = '../Vista/html/BuscarAvisos.php';
                    </script>";
                    exit();
                }
            
                $resultado = AvisosCRUD::BuscarPorTitulo($titulo);
            
                if ($resultado !== null) {
                    $_SESSION['DatosAvisos'] = $resultado;
                    header('Location: ../Vista/html/BuscarAvisos.php');
                } else {
                    header('Location: ../Vista/html/BuscarAvisos.php');
                }
                break;
        case 'BuscarAvisoFecha':
        session_start();
        $fecha = $_POST['BuscarDateA'];

        if (empty($fecha)) {
            echo "<script>
                alert('Por favor selecciona una fecha para buscar.');
                window.location.href = '../Vista/html/BuscarAvisos.php';
            </script>";
            exit();
        }

        $resultado = AvisosCRUD::BuscarPorFecha($fecha);

        if ($resultado !== null) {
            $_SESSION['DatosAvisos'] = $resultado;
            header('Location: ../Vista/html/BuscarAvisos.php');
        } else {
            header('Location: ../Vista/html/BuscarAvisos.php');
        }
        break;
        case 'BuscarAvisoCategoria':
            session_start();
            $categoria = $_POST['Categoria'];
        
            if (empty($categoria)) {
                echo "<script>
                    alert('Por favor selecciona una categoría para buscar.');
                    window.location.href = '../Vista/html/BuscarAvisos.php';
                </script>";
                exit();
            }
        
            $resultado = AvisosCRUD::BuscarPorCategoria($categoria);
        
            if ($resultado !== null) {
                $_SESSION['DatosAvisos'] = $resultado;
                header('Location: ../Vista/html/BuscarAvisos.php');
            } else {
                header('Location: ../Vista/html/BuscarAvisos.php');
            }
            break;
        

        case 'ModificarAviso2':
            $idAviso = $_GET['idAviso'];
            $titulo = $_GET['titulo'];
            $fecha = $_GET['fecha'];
            $descripcion = $_GET['descripcion'];
            $categoria = $_GET['categoria'];
            $matriculaV = $_GET['matriculaV'];

            if (empty($idAviso) || empty($titulo) || empty($fecha) || empty($descripcion) || empty($categoria)) {
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/BuscarAvisos.php';
                    </script>";
                exit();
            }

            // Llamada al método de modificación
            $modificacion = AvisosCRUD::ModificacionAviso($idAviso, $titulo, $fecha, $descripcion, $categoria, $matriculaV);
            if ($modificacion !== false) {
                echo "<script>
                    alert('¡Aviso modificado con éxito!');
                    window.location.href = '../Vista/html/BuscarAvisos.php';
                    </script>";
            } else {
                echo "<script>
                    alert('No se pudo modificar el Aviso.');
                    window.location.href = '../Vista/html/BuscarAvisos.php';
                    </script>";
            }
            break;

        case 'EliminarAviso2':
            $idAviso = $_GET['idAviso'];
            $eliminacionA = AvisosCRUD::EliminarAviso($idAviso);
            if($eliminacionA !== null){
                echo "<script>
                    alert('¡Aviso eliminado con éxito!');
                    window.location.href = '../Vista/html/BuscarAvisos.php';
                    </script>";
            }else{
                echo "<script>
                    alert('No se eliminó el Aviso.');
                    window.location.href = '../Vista/html/BuscarAvisos.php';
                    </script>";
            }
            break;

        case 'RespaldoBD':
            // Se obtiene el contenido del respaldo
            $respaldoSQL = BaseDatos::RespaldoBD();

            if ($respaldoSQL !== false) {
                $filename = 'EstanciaII_respaldo_' . date('Y-m-d_H-i-s') . '.sql';

                // Enviar encabezados para forzar la descarga
                header('Content-Description: File Transfer');
                header('Content-Type: application/sql');
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . strlen($respaldoSQL));

                // Enviar el contenido SQL directamente al navegador
                echo $respaldoSQL;
                exit;
            } else {
                echo "Error al crear el respaldo de la base de datos.";
            }
            break;

            
        case 'BuscarSancioMatricula':
            session_start();
            $matriculaB = $_POST['txtMatriculaB'];
            
            if(empty($matriculaB)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/BuscarSancion.php';
                    </script>";
                    exit();
            }

            $consulta = SancionCRUD::BuscarMatricula($matriculaB);

            if($consulta !== null){
                $_SESSION['DatosSancion'] = $consulta;
                header('Location: ../Vista/html/BuscarSancion.php');
            }else{
                header('Location: ../Vista/html/BuscarSancion.php');
            }
            
            break;

        case 'BuscarSancioMatriculaV':
            session_start();
            $matriculaB = $_POST['txtMatriculaB'];
            
            if(empty($matriculaB)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/BuscarSancionV.php';
                    </script>";
                    exit();
            }

            $consulta = SancionCRUD::BuscarMatricula($matriculaB);

            if($consulta !== null){
                $_SESSION['DatosSancion'] = $consulta;
                header('Location: ../Vista/html/BuscarSancionV.php');
            }else{
                header('Location: ../Vista/html/BuscarSancionV.php');
            }
            
            break;
        case 'BuscarSacionFecha':
            session_start();
            $fecha = $_POST['BuscarDateS'];
            if(empty($fecha)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/BuscarSancion.php';
                    </script>";
                    exit();
            }

            $consulta = SancionCRUD::BuscarPorFecha($fecha);

            if($consulta !== null){
                $_SESSION['DatosSancion'] = $consulta;
                header('Location: ../Vista/html/BuscarSancion.php');
            }else{
                header('Location: ../Vista/html/BuscarSancion.php');
            }
            break;
            case 'BuscarSacionFechaV':
            session_start();
            $fecha = $_POST['BuscarDateS'];
            if(empty($fecha)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/BuscarSancionV.php';
                    </script>";
                    exit();
            }

            $consulta = SancionCRUD::BuscarPorFecha($fecha);

            if($consulta !== null){
                $_SESSION['DatosSancion'] = $consulta;
                header('Location: ../Vista/html/BuscarSancionV.php');
            }else{
                header('Location: ../Vista/html/BuscarSancionV.php');
            }
            break;
        case 'BuscarPorPago':
            session_start();
            $pago = $_POST['Pagada'];
            if(empty($pago)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/BuscarSancion.php';
                    </script>";
                    exit();
            }
            if($pago === 'Si'){
                $pago = 1;
            }else if($pago === 'No'){
                $pago = 0;
            }
            $consulta = SancionCRUD::BuscarPorPago($pago);

            if($consulta !== null){
                $_SESSION['DatosSancion'] = $consulta;
                header('Location: ../Vista/html/BuscarSancion.php');
            }else{
                header('Location: ../Vista/html/BuscarSancion.php');
            }
            break;
            case 'BuscarPorPagoV':
            session_start();
            $pago = $_POST['Pagada'];
            if(empty($pago)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/BuscarSancionV.php';
                    </script>";
                    exit();
            }
            if($pago === 'Si'){
                $pago = 1;
            }else if($pago === 'No'){
                $pago = 0;
            }
            $consulta = SancionCRUD::BuscarPorPago($pago);

            if($consulta !== null){
                $_SESSION['DatosSancion'] = $consulta;
                header('Location: ../Vista/html/BuscarSancionV.php');
            }else{
                header('Location: ../Vista/html/BuscarSancionV.php');
            }
            break;
        case 'BuscarTipoMulta':
            session_start();
            $multa = $_POST['Multa'];
            if(empty($multa)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/BuscarSancion.php';
                    </script>";
                    exit();
            }

            $consulta = SancionCRUD::BuscarPorMulta($multa);

            if($consulta !== null){
                $_SESSION['DatosSancion'] = $consulta;
                header('Location: ../Vista/html/BuscarSancion.php');
            }else{
                header('Location: ../Vista/html/BuscarSancion.php');
            }
            break;
        case 'BuscarTipoMultaV':
            session_start();
            $multa = $_POST['Multa'];
            if(empty($multa)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/BuscarSancionV.php';
                    </script>";
                    exit();
            }

            $consulta = SancionCRUD::BuscarPorMulta($multa);

            if($consulta !== null){
                $_SESSION['DatosSancion'] = $consulta;
                header('Location: ../Vista/html/BuscarSancionV.php');
            }else{
                header('Location: ../Vista/html/BuscarSancionV.php');
            }
            break;
        case 'ModificarSancion':
            $idS = $_POST['idSancion'];
            $matriculaA = $_POST['txtMatriculaSancionado'];
            $matriculaV = $_POST['txtMatriculaVigilante'];
            $fecha = $_POST['txtFechaMulta'];
            $descripcion = $_POST['txtDescripcion'];
            $pago = $_POST['Pago'];
            $multa = $_POST['Multa'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas Modificar esta Sanción?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=ModificarSancion2&idS=" . urlencode($idS) . "&matriculaA=" . urlencode($matriculaA) . "&matriculaV=" . urlencode($matriculaV) . "&fecha=" . urlencode($fecha) ."&descripcion=" . urlencode($descripcion) ."&pago=" . urlencode($pago) ."&multa=" . urlencode($multa) . "';;
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se Modifico la Sanción');
                    window.location.href = '../Vista/html/BuscarSancion.php';
                }
            </script>";
            break;
        case 'ModificarSancion2':
            $id = $_GET['idS'];
            $matriculaA = $_GET['matriculaA'];
            $matriculaV = $_GET['matriculaV'];
            $fecha = $_GET['fecha'];
            $descripcion = $_GET['descripcion'];
            $pago = $_GET['pago'];
            $multa = $_GET['multa'];
            
            
            // Validar que la fecha ingresada sea igual al día actual
            date_default_timezone_set('America/Mexico_City'); // Configurar zona horaria
            $diaActual = date("Y-m-d");
            $fecha = date('Y-m-d', strtotime($fecha)); // Normalizar formato

            if (trim($fecha) !== $diaActual) {
                echo "<script>alert('La fecha ingresada debe ser igual al día actual.');
                window.location.href = '../Vista/html/BuscarSancion.php';
                </script>";
                exit();
            }
            if(empty($id) || empty($matriculaA) || empty($matriculaV) || empty($fecha) || empty($descripcion) || empty($pago) || empty($multa)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/BuscarSancion.php';
                    </script>";
                    exit();
            }
            if($Pago == 2){
                $Pago = 0;
            }
            $modificacion = SancionCRUD::ModificacionSancion($id,$matriculaA,$matriculaV,$fecha,$descripcion,$pago,$multa);
            if($modificacion !== false){
                echo "<script>
                    alert('Sanción modificada con éxito!');
                    window.location.href = '../Vista/html/BuscarSancion.php';
                    </script>";
            }else{
                echo "<script>
                    alert('Sanción modificada sin éxito!');
                    window.location.href = '../Vista/html/BuscarSancion.php';
                    </script>";
            }
            break;
        case 'ModificarSancionV':
            $idS = $_POST['idSancion'];
            $matriculaA = $_POST['txtMatriculaSancionado'];
            $matriculaV = $_POST['txtMatriculaVigilante'];
            $fecha = $_POST['txtFechaMulta'];
            $descripcion = $_POST['txtDescripcion'];
            $pago = $_POST['Pago'];
            $multa = $_POST['Multa'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas Modificar esta Sanción?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=ModificarSancion2V&idS=" . urlencode($idS) . "&matriculaA=" . urlencode($matriculaA) . "&matriculaV=" . urlencode($matriculaV) . "&fecha=" . urlencode($fecha) ."&descripcion=" . urlencode($descripcion) ."&pago=" . urlencode($pago) ."&multa=" . urlencode($multa) . "';;
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se Modifico la Sanción');
                    window.location.href = '../Vista/html/BuscarSancionV.php';
                }
            </script>";
            break;
        case 'ModificarSancion2V':
            $id = $_GET['idS'];
            $matriculaA = $_GET['matriculaA'];
            $matriculaV = $_GET['matriculaV'];
            $fecha = $_GET['fecha'];
            $descripcion = $_GET['descripcion']; 
            $pago = $_GET['pago'];
            $multa = $_GET['multa'];
            
            

            date_default_timezone_set('America/Mexico_City'); // Configurar zona horaria
            $diaActual = date("Y-m-d");
            $fecha = date('Y-m-d', strtotime($fecha)); // Normalizar formato

            if (trim($fecha) !== $diaActual) {
                echo "<script>alert('La fecha ingresada debe ser igual al día actual.');
                window.location.href = '../Vista/html/BuscarSancion.php';
                </script>";
                exit();
            }
            if(empty($id) || empty($matriculaA) || empty($matriculaV) || empty($fecha) || empty($descripcion) || empty($pago) || empty($multa)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/BuscarSancionV.php';
                    </script>";
                    exit();
            }
            if($Pago == 2){
                $Pago = 0;
            }
            $modificacion = SancionCRUD::ModificacionSancion($id,$matriculaA,$matriculaV,$fecha,$descripcion,$pago,$multa);
            if($modificacion !== false){
                echo "<script>
                    alert('Sanción modificada con éxito!');
                    window.location.href = '../Vista/html/BuscarSancionV.php';
                    </script>";
            }else{
                echo "<script>
                    alert('Sanción modificada sin éxito!');
                    window.location.href = '../Vista/html/BuscarSancionV.php';
                    </script>";
            }
            break;
        case 'ModificarSancionView':
            session_start();
            
            // Consultar las multas y almacenarlas en sesión
            $consultaMultas = MultaCRUD::ConsultaGeneral();
            if ($consultaMultas !== null) {
                $_SESSION['DatosConsultaMulta'] = $consultaMultas;
            }

            // Verificar si se pasó un idM en la URL
            if (isset($_GET['idM'])) {
                $idM = $_GET['idM'];
                
                // Buscar la sanción
                $consultaSancion = SancionCRUD::BusquedaMod($idM);
                if ($consultaSancion !== null) {
                    $_SESSION['SancionMod'] = $consultaSancion;
                    header('Location: ../Vista/html/ModificarSancion.php');
                    exit();  // Detener ejecución después de la redirección
                } else {
                    header('Location: ../Vista/html/BuscarSancion.php');
                    exit();  // Detener ejecución después de la redirección
                }
            } else {
                // Redirigir a la página de búsqueda si no hay idM
                header('Location: ../Vista/html/BuscarSancion.php');
                exit();
            }
            break;
        case 'ModificarSancionViewV':
            session_start();
            
            // Consultar las multas y almacenarlas en sesión
            $consultaMultas = MultaCRUD::ConsultaGeneral();
            if ($consultaMultas !== null) {
                $_SESSION['DatosConsultaMulta'] = $consultaMultas;
            }

            // Verificar si se pasó un idM en la URL
            if (isset($_GET['idM'])) {
                $idM = $_GET['idM'];
                
                // Buscar la sanción
                $consultaSancion = SancionCRUD::BusquedaMod($idM);
                if ($consultaSancion !== null) {
                    $_SESSION['SancionMod'] = $consultaSancion;
                    header('Location: ../Vista/html/ModificarSancionV.php');
                    exit();  // Detener ejecución después de la redirección
                } else {
                    header('Location: ../Vista/html/BuscarSancionV.php');
                    exit();  // Detener ejecución después de la redirección
                }
            } else {
                // Redirigir a la página de búsqueda si no hay idM
                header('Location: ../Vista/html/BuscarSancionV.php');
                exit();
            }
            break;
        case 'EliminarSancion':
            $idM = $_GET['idM'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas eliminar esta Sanción?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=EliminarSancion2&idM=$idM';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se eliminó la Sanción');
                    window.location.href = '../Vista/html/BuscarSancion.php';
                }
            </script>";
            break;
        case 'EliminarSancion2':
            $idM = $_GET['idM'];
            $eliminacionS = SancionCRUD::EliminarSancion($idM);
            if($eliminacionS !== null){
                echo "<script>
                    alert('Sanción elimianda con éxito!');
                    window.location.href = '../Vista/html/BuscarSancion.php';
                    </script>";
            }else{
                echo "<script>
                    alert('No se elimino la sanción!');
                    window.location.href = '../Vista/html/BuscarSancion.php';
                    </script>";
            }
            break;
        case 'EliminarSancionV':
            $idM = $_GET['idM'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas eliminar esta Sanción?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=EliminarSancion2V&idM=$idM';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se eliminó la Sanción');
                    window.location.href = '../Vista/html/BuscarSancionV.php';
                }
            </script>";
            break;
        case 'EliminarSancion2V':
            $idM = $_GET['idM'];
            $eliminacionS = SancionCRUD::EliminarSancion($idM);
            if($eliminacionS !== null){
                echo "<script>
                    alert('Sanción elimianda con éxito!');
                    window.location.href = '../Vista/html/BuscarSancionV.php';
                    </script>";
            }else{
                echo "<script>
                    alert('No se elimino la sanción!');
                    window.location.href = '../Vista/html/BuscarSancionV.php';
                    </script>";
            }
            break;
        case 'ConsultaGeneralSancion':
            session_start();
            $consultaGSan = SancionCRUD::BusquedaGeneral();
            if($consultaGSan !== null){
                $_SESSION['DatosSancion'] = $consultaGSan;
                header('Location: ../Vista/html/BuscarSancion.php');
            }else{
                header('Location: ../Vista/html/BuscarSancion.php');
            }
            break;
        case 'ConsultaGeneralSancionV':
            session_start();
            $consultaGSan = SancionCRUD::BusquedaGeneral();
            if($consultaGSan !== null){
                $_SESSION['DatosSancion'] = $consultaGSan;
                header('Location: ../Vista/html/BuscarSancionV.php');
            }else{
                header('Location: ../Vista/html/BuscarSancionV.php');
            }
            break;
        
        case "RegistroSancion":
            $matriculaAlumno = $_POST['txtMatriculaSancionado'];
            $matriculaVigilante = $_POST['txtMatriculaVigilante'];
            $fechaMulta = $_POST['txtFechaMulta'];
            $descripcion = $_POST['txtDescripcion'];
            $Pago = $_POST['Pago'];
            $Multa = $_POST['Multa'];


            if( empty($matriculaAlumno) || empty($matriculaVigilante) || empty($fechaMulta) || empty($descripcion) || empty($Pago) || empty($Multa)){
                
                    echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/RegistrarSancion.php';
                    </script>";
                    exit();
                
                
            }
            // Validar que la fecha ingresada sea igual al día actual
            date_default_timezone_set('America/Mexico_City'); // Configurar zona horaria
            $diaActual = date("Y-m-d");
            $fechaMulta = date('Y-m-d', strtotime($fechaMulta)); // Normalizar formato

            if (trim($fechaMulta) !== $diaActual) {
                echo "<script>alert('La fecha ingresada debe ser igual al día actual.');
                window.location.href = '../Vista/html/RegistrarSancion.php';
                </script>";
                exit();
            }

            if(empty($matriculaAlumno) || empty($matriculaVigilante) || empty($fechaMulta) || empty($descripcion) || empty($Pago) || empty($Multa)){
                
                    echo "<script>
                    alert('Todos los datos deben de estar llenos!');
                    window.location.href = '../Vista/html/RegistrarSancion.php';
                    </script>";
                
                
            }
            
            if($Pago == 2){
                $Pago = 0;
            }
            $validacionMatriculas = SancionCRUD::ValidarMatriculasRegistroVigilante($matriculaAlumno,$matriculaVigilante);

            if($validacionMatriculas === true){
                $resultado = SancionCRUD::RegistrarSancion($matriculaAlumno,$matriculaVigilante,$fechaMulta,$descripcion,$Pago,$Multa);
                if($resultado === true){
                    
                        echo "<script>
                        alert('Sanción registrada con éxito!');
                        window.location.href = '../Vista/html/RegistrarSancion.php';
                        </script>";
                    
                    
            
                }else{
                    
                        echo "<script>
                        alert('No se puedo registrar la sancion!');
                        window.location.href = '../Vista/html/RegistrarSancion.php';
                        </script>";
                    
                    
                }
            }else{
                
                echo "<script>
                    alert('Una matricula no existe!');
                    window.location.href = '../Vista/html/RegistrarSancion.php';
                    </script>";
            }
            //////////////////////////////////////////////////////////////
            break;
            case "RegistroSancionV":
            $matriculaAlumno = $_POST['txtMatriculaSancionado'];
            $matriculaVigilante = $_POST['txtMatriculaVigilante'];
            $fechaMulta = $_POST['txtFechaMulta'];
            $descripcion = $_POST['txtDescripcion'];
            $Pago = $_POST['Pago'];
            $Multa = $_POST['Multa'];


            if( empty($matriculaAlumno) || empty($matriculaVigilante) || empty($fechaMulta) || empty($descripcion) || empty($Pago) || empty($Multa)){
                
                    echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/RegistrarSancionV.php';
                    </script>";
                    exit();
                
                
            }
            // Validar que la fecha ingresada sea igual al día actual
            date_default_timezone_set('America/Mexico_City'); // Configurar zona horaria
            $diaActual = date("Y-m-d");
            $fechaMulta = date('Y-m-d', strtotime($fechaMulta)); // Normalizar formato

            if (trim($fechaMulta) !== $diaActual) {
                echo "<script>alert('La fecha ingresada debe ser igual al día actual.');
                window.location.href = '../Vista/html/RegistrarSancionV.php';
                </script>";
                exit();
            }

            if(empty($matriculaAlumno) || empty($matriculaVigilante) || empty($fechaMulta) || empty($descripcion) || empty($Pago) || empty($Multa)){
                
                    echo "<script>
                    alert('Todos los datos deben de estar llenos!');
                    window.location.href = '../Vista/html/RegistrarSancionV.php';
                    </script>";
                
                
            }
            
            if($Pago == 2){
                $Pago = 0;
            }
            $validacionMatriculas = SancionCRUD::ValidarMatriculasRegistroVigilante($matriculaAlumno,$matriculaVigilante);

            if($validacionMatriculas === true){
                $resultado = SancionCRUD::RegistrarSancion($matriculaAlumno,$matriculaVigilante,$fechaMulta,$descripcion,$Pago,$Multa);
                if($resultado === true){
                    
                        echo "<script>
                        alert('Sanción registrada con éxito!');
                        window.location.href = '../Vista/html/RegistrarSancionV.php';
                        </script>";
                    
                    
            
                }else{
                    
                        echo "<script>
                        alert('No se puedo registrar la sancion!');
                        window.location.href = '../Vista/html/RegistrarSancionV.php';
                        </script>";
                    
                    
                }
            }else{
                
                echo "<script>
                    alert('Una matricula no existe!');
                    window.location.href = '../Vista/html/RegistrarSancionV.php';
                    </script>";
            }
            break;
        
        case 'EliminarAdmin2':
            $adminE = $_GET['matriculaA'];
            
            $eliminacionAdmin = CRUD::EliminarAdmin($adminE);
            
            if($eliminacionAdmin === true){
                echo "<script>alert('Eliminado con éxito');
                window.location.href = '../Vista/html/EliminarAdmin.php';
                </script>";
            }else{
                echo "<script>alert('No se pudo eliminar');
                window.location.href = '../Vista/html/EliminarAdmin.php';
                </script>";
            }
            break;
        case 'EliminarAdmin':
            $adminE = $_GET['matriculaA'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas eliminar este administrador?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=EliminarAdmin2&matriculaA=$adminE';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se eliminó el administrador');
                    window.location.href = '../Vista/html/EliminarAdmin.php';
                }
            </script>";
            break;
        case 'ConsultaGeneralAdminE':
            session_start();
            $consultaG = CRUD::ConsultaGeneralAdmin();
            if($consultaG !== null){
                $_SESSION['ConsultaGeneralAdmin'] = $consultaG;
                header('Location: ../Vista/html/EliminarAdmin.php');
            }else{  
                header('Location: ../Vista/html/EliminarAdmin.php');
            }
            break;
        case 'CosultaXmatriculaAdminE':
            session_start();
            $matricula = $_POST['txtMatriculaA'];
            $consulta = CRUD::ConsultaXmatriculaAdmin($matricula);
            if($consulta !== null){
                $_SESSION['ConsultaGeneralAdmin'] = $consulta;
                header('Location: ../Vista/html/EliminarAdmin.php');
            }else{  
                header('Location: ../Vista/html/EliminarAdmin.php');
            }
            break;
        case 'CosultaXnonmbreAdminE':
            session_start();
            $nom = $_POST['txtNombreA'];
            $consulta = CRUD::ConsultaXnombreAdmin($nom);
            if($consulta !== null){
                $_SESSION['ConsultaGeneralAdmin'] = $consulta;
                header('Location: ../Vista/html/EliminarAdmin.php');
            }else{  
                header('Location: ../Vista/html/EliminarAdmin.php');
            }
            break;
        case 'CosultaXapellidoAdminE':
            session_start();
            $ape = $_POST['txtApellidoA'];
            $consulta = CRUD::ConsultaXapellidoAdmin($ape);
            if($consulta !== null){
                $_SESSION['ConsultaGeneralAdmin'] = $consulta;
                header('Location: ../Vista/html/EliminarAdmin.php');
            }else{  
                header('Location: ../Vista/html/EliminarAdmin.php');
            }
            break;
        case 'ModificarAdminView':
            session_start();
            $matricula = $_GET['matriculaA'];
            $consulta = CRUD::ConsultaAdminMod($matricula);
            if($consulta !== null){
                $_SESSION['ModificarAdmin'] = $consulta;
                header('Location: ../Vista/html/ModificarAdmin.php');
            }else{
                header('Location: ../Vista/html/EliminarAdmin.php');
            }
            break;
        case 'ModificarAdmin':
            $matriculaOld = $_POST['txtMatriculaAOld'];
            $matriculaNew = $_POST['txtMatriculaANew'];
            $nombreA = $_POST['txtNombreA'];
            $apellidoA = $_POST['txtApellidosA'];
            $contraA = $_POST['txtPasswordA'];
            $fechaNac = $_POST['FechaNacAdmin'];
            $genero = $_POST['genero'];

            echo "<script>
                if (confirm('¿Estás seguro de que deseas modificar este Administrador?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=ModificarAdmin2&MatriculaAOld=" . urlencode($matriculaOld) . "&MatriculaANew=" . urlencode($matriculaNew) . "&NombreA=" . urlencode($nombreA) . "&ApellidosA=" . urlencode($apellidoA) ."&PasswordA=" . urlencode($contraA) ."&FechaNacAdmin=" . urlencode($fechaNac) ."&genero=" . urlencode($genero) . "';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se modifico el Administrador');
                    window.location.href = '../Vista/html/EliminarAdmin.php';
                }
            </script>";

            break;
        case 'ModificarAdmin2': 
            $matriculaOld = $_GET['MatriculaAOld'];
            $matriculaNew = $_GET['MatriculaANew'];
            $nombreA = $_GET['NombreA'];
            $apellidoA = $_GET['ApellidosA'];
            $contraA = $_GET['PasswordA'];
            $fechaNac = $_GET['FechaNacAdmin'];
            $genero = $_GET['genero']; 
            

            if(empty($matriculaOld) ||empty($matriculaNew) || empty($nombreA) || empty($apellidoA) || empty($contraA) || empty($fechaNac) || empty($genero)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/ModificarAdmin.php';
                    </script>";
            }
            // Validar si el alumno tiene al menos cierta edad (por ejemplo, 15 años)
            $minEdad = 18; // Edad mínima
            $birthDate = new DateTime($fechaNac);
            $fechaactualTime = new DateTime($fechaAcual);
            $Edad = $birthDate->diff($fechaactualTime)->y;

            if($Edad < $minEdad){
                echo "<script>alert('El alumno debe tener al menos $minEdad años.');
                window.location.href = '../Vista/html/ModificarAdmin.php';
                </script>";
                exit();
            }
            $resultado = CRUD::ModificarAdmin($matriculaOld,$matriculaNew,$nombreA,$apellidoA,$contraA,$fechaNac,$genero);
            
            if($resultado === true){
                
                echo "<script> 
                alert('Modificacion Exitosa.');
                window.location.href = '../Vista/html/ModificarAdmin.php';
                </script>";
                exit();
            }else{
                echo "<script>alert('Modificacion Fallida.');
                window.location.href = '../Vista/html/ModificarAdmin.php';
                </script>";
                exit();
            }

            break;
        case 'ConsultaGeneralAdmin':
            session_start();
            $consultaG = CRUD::ConsultaGeneralAdmin();
            if($consultaG !== null){
                $_SESSION['ConsultaGeneralAdmin'] = $consultaG;
                header('Location: ../Vista/html/ModificarAdmin.php');
            }else{  
                header('Location: ../Vista/html/ModificarAdmin.php');
            }
            break;
        case 'CosultaXmatriculaAdmin':
            session_start();
            $matricula = $_POST['txtMatriculaA'];
            $consulta = CRUD::ConsultaXmatriculaAdmin($matricula);
            if($consulta !== null){
                $_SESSION['ConsultaGeneralAdmin'] = $consulta;
                header('Location: ../Vista/html/ModificarAdmin.php');
            }else{  
                header('Location: ../Vista/html/ModificarAdmin.php');
            }
            break;
        case 'CosultaXnonmbreAdmin':
            session_start();
            $nom = $_POST['txtNombreA'];
            $consulta = CRUD::ConsultaXnombreAdmin($nom);
            if($consulta !== null){
                $_SESSION['ConsultaGeneralAdmin'] = $consulta;
                header('Location: ../Vista/html/ModificarAdmin.php');
            }else{  
                header('Location: ../Vista/html/ModificarAdmin.php');
            }
            break;
        case 'CosultaXapellidoAdmin':
            session_start();
            $ape = $_POST['txtApellidoA'];
            $consulta = CRUD::ConsultaXapellidoAdmin($ape);
            if($consulta !== null){
                $_SESSION['ConsultaGeneralAdmin'] = $consulta;
                header('Location: ../Vista/html/ModificarAdmin.php');
            }else{  
                header('Location: ../Vista/html/ModificarAdmin.php');
            }
            break;
        case 'EliminarVigilante2':
            $matriculaV = $_GET['matriculaVeliminar'];

            $Eliminacion = CRUD::EliminarVigilante($matriculaV);

            if($Eliminacion === true){
                echo "<script>alert('Eliminado con éxito');
                window.location.href = '../Vista/html/EliminarVigilante.php';
                </script>";
            }else{
                echo "<script>alert('No se puedo eliminar');
                window.location.href = '../Vista/html/EliminarVigilante.php';
                </script>";
            }
            break;
        case 'EliminarVigilante':
            $matriculaV = $_GET['matriculaVeliminar'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas eliminar este Vigilante?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=EliminarVigilante2&matriculaVeliminar=$matriculaV';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se eliminó el Vigilante');
                    window.location.href = '../Vista/html/EliminarVigilante.php';
                }
            </script>";
            break;
        case 'consultaGeneralVigilanteE':
            session_start();
            $consultaGeneralV = CRUD::ConsultaGeneralVigilante();

            if($consultaGeneralV !== null){
                $_SESSION['ConsultaGeneralVigilante'] = $consultaGeneralV;
                header('Location: ../Vista/html/EliminarVigilante.php');
            }else{
                $_SESSION['ConsultaGeneralVigilante'] = $consultaGeneralV;
                header('Location: ../Vista/html/EliminarVigilante.php');
            }
            break;
        case 'BuscarXmatriculaVigilanteEliminar': 
            session_start();
            $matricula = $_POST['BusquedaXmatricula'];
            $consulta = CRUD::ConsultaXmatriculaV($matricula);
            if($consulta !== null){
            $_SESSION['ConsultaGeneralIndividual'] = $consulta;
                header('Location: ../Vista/html/EliminarVigilante.php');
            }else{
                header('Location: ../Vista/html/EliminarVigilante.php');
            }

            break;
        case 'BuscarXnombreVigilanteEliminar':
            session_start();
            $nombre = $_POST['BusquedaXnombre'];
            $consulta = CRUD::ConsultaXnombreV($nombre);
            if($consulta !== null){
            $_SESSION['ConsultaGeneralIndividual'] = $consulta;
                header('Location: ../Vista/html/EliminarVigilante.php');
            }else{
                header('Location: ../Vista/html/EliminarVigilante.php');
            }

            break;
        case 'BuscarXapellidoVigilanteEliminar':
            session_start();
            $apellido = $_POST['BusquedaXapellido'];
            $consulta = CRUD::ConsultaXapellidoV($apellido);
            if($consulta !== null){
            $_SESSION['ConsultaGeneralIndividual'] = $consulta;
                header('Location: ../Vista/html/EliminarVigilante.php');
            }else{
                header('Location: ../Vista/html/EliminarVigilante.php');
            }
            break;
        case 'consultaGeneralVigilante':
            session_start();
            $consultaGeneralV = CRUD::ConsultaGeneralVigilante();

            if($consultaGeneralV !== null){
                $_SESSION['ConsultaGeneralVigilante'] = $consultaGeneralV;
                header('Location: ../Vista/html/ModificarVigilante.php');
            }else{
                $_SESSION['ConsultaGeneralVigilante'] = $consultaGeneralV;
                header('Location: ../Vista/html/ModificarVigilante.php');
            }
            break;
        case 'EliminarAlumno2':
            $matriculaEliminarAlumno = $_GET['matricula'];

            $eliminarA = CRUD::EliminarAlumno($matriculaEliminarAlumno);

            if($eliminarA === true){
                echo "<script>alert('Eliminado con éxito');
                window.location.href = '../Vista/html/EliminarAlumno.php';
                </script>";
            }else{
                echo "<script>alert('No se pudo eliminar');
                window.location.href = '../Vista/html/EliminarAlumno.php';
                </script>";
            }
            
            break;
        case 'EliminarAlumno':
            $matriculaEliminarAlumno = $_GET['matricula'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas eliminar este Alumno?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=EliminarAlumno2&matricula=$matriculaEliminarAlumno';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se eliminó el Alumno');
                    window.location.href = '../Vista/html/EliminarAlumno.php';
                }
            </script>";
            break;
        case 'ConsultaGeneralAlumoE':
            session_start();
            $consulta = CRUD::ConsultaGeneralAlumos();
            if($consulta !== null){
                $_SESSION['ConsultaGeneralAlumnos'] = $consulta;
                header('Location: ../Vista/html/EliminarAlumno.php');
            }else{
                $_SESSION['ConsultaGeneralAlumnos'] = $consulta;
                header('Location: ../Vista/html/EliminarAlumno.php');
            }
            break;
            case 'BuscarXmatriculaAlumoE':
                session_start();
                $matricula = $_POST['BusquedaXmatricula'];
                $consulta = CRUD::ConsultaXmatriculaAlumo($matricula);
                if($consulta !== null){
                $_SESSION['ConsultaGeneralAlumnos'] = $consulta;
                    header('Location: ../Vista/html/EliminarAlumno.php');
                }else{
                    header('Location: ../Vista/html/EliminarAlumno.php');
                }
                break;
            case 'BuscarXnombreAlumoE':
                session_start();
                $nombre = $_POST['BusquedaXnombre'];
                $consulta = CRUD::ConsutlaXnombreAlumno($nombre);
                if($consulta !== null){
                $_SESSION['ConsultaGeneralAlumnos'] = $consulta;
                    header('Location: ../Vista/html/EliminarAlumno.php');
                }else{
                    header('Location: ../Vista/html/EliminarAlumno.php');
                }
                break;
            case 'BuscarXapellidoAlumoE':
                session_start();
                $apellido = $_POST['BusquedaXapellido'];
                $consulta = CRUD::ConsultaXapellidoAlumo($apellido);
                if($consulta !== null){
                $_SESSION['ConsultaGeneralAlumnos'] = $consulta;
                    header('Location: ../Vista/html/EliminarAlumno.php');
                }else{
                    header('Location: ../Vista/html/EliminarAlumno.php');
                }
                break;
        case 'ConsultaGeneralAlumo':
            session_start();
            $consulta = CRUD::ConsultaGeneralAlumos();
            if($consulta !== null){
                $_SESSION['ConsultaGeneralAlumnos'] = $consulta;
                $consulta = CRUDProEdu::BusquedaGeneral();
                        
                if($consulta !== null ){
                    $_SESSION['DatosConsultaGeneral'] = $consulta;
                    header('Location: ../Vista/html/ModificarAlumno.php');
                }else{
                    header('Location: ../Vista/html/ModificarAlumno.php');
                }
            }else{
                $_SESSION['ConsultaGeneralAlumnos'] = $consulta;
                $consulta = CRUDProEdu::BusquedaGeneral();
                        
                if($consulta !== null ){
                    $_SESSION['DatosConsultaGeneral'] = $consulta;
                    header('Location: ../Vista/html/ModificarAlumno.php');
                }else{
                    header('Location: ../Vista/html/ModificarAlumno.php');
                }
            }
            break;
        case 'BuscarXmatriculaAlumo':
            session_start();
            $matricula = $_POST['BusquedaXmatricula'];
            $consulta = CRUD::ConsultaXmatriculaAlumo($matricula);
            if($consulta !== null){
            $_SESSION['ConsultaGeneralAlumnos'] = $consulta;
                header('Location: ../Vista/html/ModificarAlumno.php');
            }else{
                header('Location: ../Vista/html/ModificarAlumno.php');
            }
            break;
        case 'BuscarXnombreAlumo':
            session_start();
            $nombre = $_POST['BusquedaXnombre'];
            $consulta = CRUD::ConsutlaXnombreAlumno($nombre);
            if($consulta !== null){
            $_SESSION['ConsultaGeneralAlumnos'] = $consulta;
                header('Location: ../Vista/html/ModificarAlumno.php');
            }else{
                header('Location: ../Vista/html/ModificarAlumno.php');
            }
            break;
        case 'BuscarXapellidoAlumo':
            session_start();
            $apellido = $_POST['BusquedaXapellido'];
            $consulta = CRUD::ConsultaXapellidoAlumo($apellido);
            if($consulta !== null){
            $_SESSION['ConsultaGeneralAlumnos'] = $consulta;
                header('Location: ../Vista/html/ModificarAlumno.php');
            }else{
                header('Location: ../Vista/html/ModificarAlumno.php');
            }
            break;
        case 'ModificarAlumnoVista':
            session_start();
            $consulta2 = CRUDProEdu::BusquedaGeneral();
                    
            if($consulta2 !== null ){
                $_SESSION['DatosConsultaGeneral'] = $consulta2;
            }
            $matricula = $_GET['matricula'];
            $consulta = CRUD::ConsultaModificar($matricula);
            if($consulta !== null){
                $_SESSION['modificarAlumno'] = $consulta;
                header('Location: ../Vista/html/ModificarAlumno.php');
            }else{
                header('Location: ../Vista/html/EliminarAlumno.php');
            }
            break;
        case 'modificarAlumno':
            $matriculaOld = $_POST['txtMatriculaOld'];
            $matriculaNew = $_POST['txtMatriculaNew'];
            $nombre = $_POST['txtNombre'];
            $apellidos = $_POST['txtApellidos'];
            $genero = $_POST['Genero'];
            $fechaNac = $_POST['txtFechaNacimiento'];
            $contra = $_POST['txtPasswordAlu'];
            $grado = $_POST['GradoNum'];
            $grupo = $_POST['Grupo'];
            $especialidad = $_POST['Especialidad'];

            echo "<script>
                if (confirm('¿Estás seguro de que deseas modificar este Alumno?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=modificarAlumno2&matriculaOld=" . urlencode($matriculaOld) . "&matriculaNew=" . urlencode($matriculaNew) . "&nombre=" . urlencode($nombre) . "&apellido=" . urlencode($apellidos) ."&genero=" . urlencode($genero) ."&fechaNac=" . urlencode($fechaNac) ."&password=" . urlencode($contra) ."&grado=" . urlencode($grado) ."&grupo=" . urlencode($grupo) ."&especialidad=" . urlencode($especialidad) . "';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se modifico el Alumno');
                    window.location.href = '../Vista/html/EliminarAlumno.php';
                }
            </script>";
            break;  
        case 'modificarAlumno2':
            $matriculaOld = $_GET['matriculaOld'];
            $matriculaNew = $_GET['matriculaNew'];
            $nombre = $_GET['nombre'];
            $apellidos = $_GET['apellido'];
            $genero = $_GET['genero'];
            $fechaNac = $_GET['fechaNac'];
            $contra = $_GET['password'];
            $grado = $_GET['grado'];
            $grupo = $_GET['grupo'];
            $especialidad = $_GET['especialidad'];

            /*VALIDACIONES*/
            if(strlen($matriculaOld) != 10 && strlen($matriculaNew) != 10){//valida el tamaño de la matricula 
                echo "<script>alert('La matricula debe de tener 10 caracteres!');
                window.location.href = '../Vista/html/ModificarAlumno.php';
                </script>";
                exit();
            }
            if(empty($nombre) || empty($apellidos) || empty($genero) || empty($fechaNac) || empty($matriculaOld) || empty($matriculaNew) || empty($contra) || empty($grado) || empty($grupo) || empty($especialidad)){//valida que ningun campo este vacio
                echo "<script>alert('Todos los campos son obligatorios.');
                window.location.href = '../Vista/html/ModificarAlumno.php';
                </script>";
                exit();
            }
            if(!is_numeric($grado)){//valida que el grado sea un numero
                echo "<script>alert('El grado debe de ser numerico');
                window.location.href = '../Vista/html/ModificarAlumno.php';
                </script>";
            }
            // Validar si el alumno tiene al menos cierta edad (por ejemplo, 15 años)
            $minEdad = 18; // Edad mínima
            $birthDate = new DateTime($fechaNac);
            $fechaactualTime = new DateTime($fechaAcual);
            $Edad = $birthDate->diff($fechaactualTime)->y;

            if($Edad < $minEdad){
                echo "<script>alert('El alumno debe tener al menos $minEdad años.');
                window.location.href = '../Vista/html/ModificarAlumno.php';
                </script>";
                exit();
            }
            /*REDIRECIONA LOS DATOS AL MODELO Y AL ARCHIVO PHP*/
            $resultado = CRUD::ModificarA($matriculaOld,$matriculaNew,$nombre,$apellidos,$genero,$fechaNac,$contra,$grado,$grupo,$especialidad);
            if($resultado === true){
            
                echo "<script>alert('Modificado con éxito');
                window.location.href = '../Vista/html/ModificarAlumno.php';
                </script>";
            } else {
                echo "<script>alert('Error en al modificar');
                window.location.href = '../Vista/html/ModificarAlumno.php';
                </script>";
            }
            
            break;
        
        case "registrarAlumno":
            
            /*SE RECUPERAN LAS VARIABLES DEL FORMULARIO HTML LOS DATOS */
            $matricula = $_POST['txtMatricula'];
            $nombre = $_POST['txtNombre'];
            $apellidos = $_POST['txtApellidos'];
            $genero = $_POST['Genero'];
            $fechaNac = $_POST['txtFechaNacimiento'];
            $contra = $_POST['txtPasswordAlu'];
            $grado = $_POST['GradoNum'];
            $grupo = $_POST['Grupo'];
            $especialidad = $_POST['Especialidad'];


            /*VALIDACIONES*/
            if(strlen($matricula) != 10){//valida el tamaño de la matricula 
                echo "<script>alert('La matricula debe de tener 10 caracteres!');
                window.location.href = '../Vista/html/RegistrarVigilante.php';
                </script>";
                exit();
            }
            if(empty($nombre) || empty($apellidos) || empty($genero) || empty($fechaNac) || empty($matricula) || empty($contra) || empty($grado) || empty($grupo) || empty($especialidad)){//valida que ningun campo este vacio
                echo "<script>alert('Todos los campos son obligatorios.');
                window.location.href = '../Vista/html/RegistrarAlumno.php';
                </script>";
                exit();
            }
            if(!is_numeric($grado)){//valida que el grado sea un numero
                echo "<script>alert('El grado debe de ser numerico');
                window.location.href = '../Vista/html/RegistrarAlumno.php';
                </script>";
            }
            /* VALIDAR FECHA DE NACIMIENTO */
            $fechaAcual = date("Y-m-d");
            if($fechaNac >= $fechaAcual){ // Verifica si la fecha es en el futuro o igual a la fecha actual
                echo "<script>alert('La fecha de nacimiento no puede ser en el futuro.');
                window.location.href = '../Vista/html/RegistrarAlumno.php';
                </script>";
                exit();
            }

            // Validar si el alumno tiene al menos cierta edad (por ejemplo, 15 años)
            $minEdad = 18; // Edad mínima
            $birthDate = new DateTime($fechaNac);
            $fechaactualTime = new DateTime($fechaAcual);
            $Edad = $birthDate->diff($fechaactualTime)->y;

            if($Edad < $minEdad){
                echo "<script>alert('El alumno debe tener al menos $minEdad años.');
                window.location.href = '../Vista/html/RegistrarAlumnoIndex.php';
                </script>";
                exit();
            }
            /*REDIRECIONA LOS DATOS AL MODELO Y AL ARCHIVO PHP*/

            $matriculaVerificacion = CRUD::VerificarMatricula($matricula);

            if(!$matriculaVerificacion){
                $resultado = CRUD::RegistroU($matricula,$nombre,$apellidos,$genero,$fechaNac,$contra,$grado,$grupo,$especialidad);
                if($resultado === true){
                
                    echo "<script>alert('Registrado con éxito');
                    window.location.href = '../Vista/html/RegistrarAlumno.php';
                    </script>";
                } else {
                    echo "<script>alert('Error en el registro');
                    window.location.href = '../Vista/html/RegistrarAlumno.php';
                    </script>";
                }
            }else{
                echo "<script>alert('Esta matricula ya fue registrada con anterioridad');
                window.location.href = '../Vista/html/RegistrarAlumno.php';
                </script>";
            }
            
            
            break;
            case "registrarAlumnoIndex":
            
            /*SE RECUPERAN LAS VARIABLES DEL FORMULARIO HTML LOS DATOS */
            $matricula = $_POST['txtMatricula'];
            $nombre = $_POST['txtNombre'];
            $apellidos = $_POST['txtApellidos'];
            $genero = $_POST['Genero'];
            $fechaNac = $_POST['txtFechaNacimiento'];
            $contra = $_POST['txtPasswordAlu'];
            $grado = $_POST['GradoNum'];
            $grupo = $_POST['Grupo'];
            $especialidad = $_POST['Especialidad'];


            /*VALIDACIONES*/
            if(strlen($matricula) != 10){//valida el tamaño de la matricula 
                echo "<script>alert('La matricula debe de tener 10 caracteres!');
                window.location.href = '../Vista/html/RegistrarAlumnoIndex.php';
                </script>";
                exit();
            }
            if(empty($nombre) || empty($apellidos) || empty($genero) || empty($fechaNac) || empty($matricula) || empty($contra) || empty($grado) || empty($grupo) || empty($especialidad)){//valida que ningun campo este vacio
                echo "<script>alert('Todos los campos son obligatorios.');
                window.location.href = '../Vista/html/RegistrarAlumnoIndex.php';
                </script>";
                exit();
            }
            if(!is_numeric($grado)){//valida que el grado sea un numero
                echo "<script>alert('El grado debe de ser numerico');
                window.location.href = '../Vista/html/RegistrarAlumnoIndex.php';
                </script>";
            }
            /* VALIDAR FECHA DE NACIMIENTO */
            $fechaAcual = date("Y-m-d");
            if($fechaNac >= $fechaAcual){ // Verifica si la fecha es en el futuro o igual a la fecha actual
                echo "<script>alert('La fecha de nacimiento no puede ser en el futuro.');
                window.location.href = '../Vista/html/RegistrarAlumnoIndex.php';
                </script>";
                exit();
            }

            // Validar si el alumno tiene al menos cierta edad (por ejemplo, 15 años)
            $minEdad = 18; // Edad mínima
            $birthDate = new DateTime($fechaNac);
            $fechaactualTime = new DateTime($fechaAcual);
            $Edad = $birthDate->diff($fechaactualTime)->y;

            if($Edad < $minEdad){
                echo "<script>alert('El alumno debe tener al menos $minEdad años.');
                window.location.href = '../Vista/html/RegistrarAlumnoIndex.php';
                </script>";
                exit();
            }
            /*REDIRECIONA LOS DATOS AL MODELO Y AL ARCHIVO PHP*/

            $matriculaVerificacion = CRUD::VerificarMatricula($matricula);

            if(!$matriculaVerificacion){
                $resultado = CRUD::RegistroU($matricula,$nombre,$apellidos,$genero,$fechaNac,$contra,$grado,$grupo,$especialidad);
                if($resultado === true){
                
                    echo "<script>alert('Registrado con éxito');
                    window.location.href = '../Vista/html/InicioS.html';
                    </script>";
                } else {
                    echo "<script>alert('Error en el registro');
                    window.location.href = '../Vista/html/RegistrarAlumnoIndex.php';
                    </script>";
                }
            }else{
                echo "<script>alert('Esta matricula ya fue registrada con anterioridad');
                window.location.href = '../Vista/html/RegistrarAlumnoIndex.php';
                </script>";
            }
            
            
            break;
        case 'BuscarXmatriculaVigilante':
            session_start();
            $matricula = $_POST['BusquedaXmatricula'];
            $consulta = CRUD::ConsultaXmatriculaV($matricula);
            if($consulta !== null){
            $_SESSION['ConsultaGeneralIndividual'] = $consulta;
                header('Location: ../Vista/html/ModificarVigilante.php');
            }else{
                header('Location: ../Vista/html/ModificarVigilante.php');
            }
            break;
        case 'BuscarXnombreVigilante':
            session_start();
            $nombre = $_POST['BusquedaXnombre'];
            $consulta = CRUD::ConsultaXnombreV($nombre);
            if($consulta !== null){
            $_SESSION['ConsultaGeneralIndividual'] = $consulta;
                header('Location: ../Vista/html/ModificarVigilante.php');
            }else{
                header('Location: ../Vista/html/ModificarVigilante.php');
            }
            break;
        case 'BuscarXapellidoVigilante':
            session_start();
            $apellido = $_POST['BusquedaXapellido'];
            $consulta = CRUD::ConsultaXapellidoV($apellido);
            if($consulta !== null){
            $_SESSION['ConsultaGeneralIndividual'] = $consulta;
                header('Location: ../Vista/html/ModificarVigilante.php');
            }else{
                header('Location: ../Vista/html/ModificarVigilante.php');
            }
            break;
        case 'modificarVigilanteView':
            session_start();
            $matricula = $_GET['matriculaVeModificar'];
            $consulta = CRUD::ConsultaModificarV($matricula);
            if($consulta !== null){
                $_SESSION['modificarVigilate'] = $consulta;
                header('Location: ../Vista/html/ModificarVigilante.php');
            }else{
                header('Location: ../Vista/html/EliminarVigilante.php');
            }
            break;
        case 'modificarVigilante':
            $matriculaVold = $_POST['txtMatriculaVOld'];
            $matriculaVnew = $_POST['txtMatriculaVNew'];
            $nombreV = $_POST['txtNombreV'];
            $apellidosV = $_POST['txtApellidosV'];
            $genero = $_POST['rolG'];
            $fechaNacV = $_POST['txtFechaNacimientoV'];
            $contraV = $_POST['txtPasswordV'];
            $rol = $_POST['rol'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas modificar este Vigilante?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=modificarVigilante2&MatriculaVOld=" . urlencode($matriculaVold) . "&MatriculaVNew=" . urlencode($matriculaVnew) . "&NombreV=" . urlencode($nombreV) . "&ApellidosV=" . urlencode($apellidosV) ."&rolG=" . urlencode($genero) ."&FechaNacimientoV=" . urlencode($fechaNacV) ."&PasswordV=" . urlencode($contraV) ."&rol=" . urlencode($rol) . "';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se modifico el Vigilate');
                    window.location.href = '../Vista/html/EliminarVigilante.php';
                }
            </script>";
            break;
        case 'modificarVigilante2':
            $matriculaVold = $_GET['MatriculaVOld'];
            $matriculaVnew = $_GET['MatriculaVNew'];
            $nombreV = $_GET['NombreV'];
            $apellidosV = $_GET['ApellidosV'];
            $genero = $_GET['rolG'];
            $fechaNacV = $_GET['FechaNacimientoV'];
            $contraV = $_GET['PasswordV'];
            $rol = $_GET['rol'];

            if(strlen($matriculaVnew) != 10){//valida el tamaño de la matricula 
                echo "<script>alert('La matricula debe de tener 10 caracteres!');
                window.location.href = '../Vista/html/ModificarVigilante.php';
                </script>";
                exit();
            }
            if(empty($nombreV) || empty($apellidosV) || empty($genero) || empty($fechaNacV) || empty($matriculaVold) || empty($matriculaVnew) || empty($contraV) || empty($rol)){//valida que ningun campo este vacio
                echo "<script>alert('Todos los campos son obligatorios.');
                window.location.href = '../Vista/html/ModificarVigilante.php';
                </script>";
                exit();
            }
            $minEdad = 18; // Edad mínima
            $birthDate = new DateTime($fechaNacV);
            $fechaactualTime = new DateTime($fechaAcual);
            $Edad = $birthDate->diff($fechaactualTime)->y;

            if($Edad < $minEdad){
                echo "<script>alert('El alumno debe tener al menos $minEdad años.');
                window.location.href = '../Vista/html/ModificarVigilante.php';
                </script>";
                exit();
            }
            $resultado = CRUD::ModificarV($matriculaVold,$matriculaVnew,$nombreV,$apellidosV,$genero,$fechaNacV,$contraV,$rol);
                if($resultado === true){
                    echo "<script>alert('Modificacion exitosa.');
                    window.location.href = '../Vista/html/ModificarVigilante.php';
                    </script>";
                    exit(); 
                }else{
                    echo "<script>alert('Modificacion fallido.');
                    window.location.href = '../Vista/html/ModificarVigilante.php';
                    </script>";
                    exit();
                }
            break;
        case "registrarVigilante":
            /*SE RECUPERAN LAS VARIABLES DEL FORMULARIO HTML LOS DATOS */
            $matriculaV = $_POST['txtMatriculaV'];
            $nombreV = $_POST['txtNombreV'];
            $apellidosV = $_POST['txtApellidosV'];
            $genero = $_POST['rolG'];
            $fechaNacV = $_POST['txtFechaNacimientoV'];
            $contraV = $_POST['txtPasswordV'];
            $rol = $_POST['rol'];
            
            /*VALIDACIONES*/
            if(strlen($matriculaV) != 10){//valida el tamaño de la matricula 
                echo "<script>alert('La matricula debe de tener 10 caracteres!');
                window.location.href = '../Vista/html/RegistrarVigilante.php';
                </script>";
                exit();
            }
            if(empty($nombreV) || empty($apellidosV) || empty($genero) || empty($fechaNacV) || empty($matriculaV) || empty($contraV) || empty($rol)){//valida que ningun campo este vacio
                echo "<script>alert('Todos los campos son obligatorios.');
                window.location.href = '../Vista/html/RegistrarVigilante.php';
                </script>";
                exit();
            }
            $minEdad = 18; // Edad mínima
            $birthDate = new DateTime($fechaNacV);
            $fechaactualTime = new DateTime($fechaAcual);
            $Edad = $birthDate->diff($fechaactualTime)->y;

            if($Edad < $minEdad){
                echo "<script>alert('El alumno debe tener al menos $minEdad años.');
                window.location.href = '../Vista/html/RegistrarVigilante.php';
                </script>";
                exit();
            }
            $matriculaVerificacion = CRUD::VerificarMatricula($matriculaV);
            if(!$matriculaVerificacion){
                $resultado = CRUD::RegistroV($matriculaV,$nombreV,$apellidosV,$genero,$fechaNacV,$contraV,$rol);
                if($resultado === true){
                    echo "<script>alert('Registro exitoso.');
                    window.location.href = '../Vista/html/RegistrarVigilante.php';
                    </script>";
                    exit(); 
                }else{
                    echo "<script>alert('Registro fallido.');
                    window.location.href = '../Vista/html/RegistrarVigilante.php';
                    </script>";
                    exit();
                }
            }else{
                echo "<script>alert('Esta matricula ya fue registrada con anterioridad');
                    window.location.href = '../Vista/html/RegistrarVigilante.php';
                    </script>";
                    exit();
            }
            
            break;
        case "registrarAdministrador"://CONSULTAR SI ESTE ES NECESARIO
            /*SE RECUPERAN LAS VARIABLES DEL FORMULARIO HTML LOS DATOS */
            $matricula = $_POST['txtMatriculaA'];
            $nombreA = $_POST['txtNombreA'];
            $apellidoA = $_POST['txtApellidosA'];
            $contraA = $_POST['txtPasswordA'];
            $fechaNac = $_POST['FechaNacAdmin'];
            $genero = $_POST['genero'];
            if(empty($matricula) || empty($nombreA) || empty($apellidoA) || empty($contraA) || empty($fechaNac) || empty($genero)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/RegistrarAdministrador.php';
                    </script>";
            }
            
            
            $matriculaVerificacion = CRUD::VerificarMatricula($matricula);

            if(!$matriculaVerificacion){
                $resultado = CRUD::RegistroA($matricula,$nombreA,$apellidoA,$contraA,$fechaNac,$genero);
                if($resultado === true){
                    session_start();
                    // Inicializa el array si no existe
                    if (!isset($_SESSION['registrosAdministradores'])) {
                        $_SESSION['registrosAdministradores'] = [];
                    }
                    // Agrega el nuevo registro al array de sesión
                    $_SESSION['registrosAdministradores'][] = [
                        'matricula' => $matricula,
                        'nombreA' => $nombreA,
                        'apellidoA' => $apellidoA,
                        'fechaNac' => $fechaNac,
                        'genero' => $genero
                    ];
                    echo "<script> 
                    alert('Registro exitoso.');
                    window.location.href = '../Vista/html/RegistrarAdministrador.php';
                    </script>";
                    exit();
                }else{
                    echo "<script>alert('Registro fallido.');
                    window.location.href = '../Vista/html/RegistrarAdministrador.php';
                    </script>";
                    exit();
                }
            }else{
                echo "<script>alert('Esta matricula ya fue registrada con anterioridad');
                    window.location.href = '../Vista/html/RegistrarAdministrador.php';
                    </script>";
                    exit();
            }
            break;
        case 'registrarProEdu':
            $nombreProEdu = $_POST['nombreCarrera'];
            $claveProEdu = $_POST['ClaveCarrera'];
            if(empty($nombreProEdu) || empty($claveProEdu)){
                echo "<script>
                    alert('Todos los datos deben estar llenos!');
                    window.location.href = '../Vista/html/RegistrarProgEdu.php';
                    </script>";
            }
            $resultado = CRUDProEdu::RegistrarProEdu($nombreProEdu,$claveProEdu);
            if($resultado === true){
                echo "<script>
                    alert('Registro exitoso!');
                    window.location.href = '../Vista/html/RegistrarProgEdu.php';
                    </script>";
            }
                break;
        case "iniciarS":
            session_start();//se inicia una sesion
            /*SE RECUPERAN LAS VARIABLES PARA LA CONSULTA*/
            $usuario = $_POST['txtUsuario'];
            $contraIS = $_POST['txtPassword'];
            /*VALIDACIONES*/

            if(strlen($usuario) != 10){
                echo "<script>alert('La matricula debe de tener 10 caracteres.');
                window.location.href = '../Vista/html/InicioS.html';
                </script>";
                exit();
            }
            if(empty($usuario) || empty($contraIS)){
                echo "<script>alert('Todos los campos son obligatorios.');
                window.location.href = '../Vista/html/InicioS.html';
                </script>";
                exit();
            }

            $resultado = CRUD::IniciarSA($usuario,$contraIS);

            if($resultado !== false){

                //Las credenciales de la sesion del usuario 
                $_SESSION['usuario'] = $usuario;//Guarda la matricula de la sesion actual
                $_SESSION['loggedin'] = true;//Indica que el usuario esta logeado
                $_SESSION['datosUsuario'] = $resultado;
                
                //Redireciona a la pagina adecuada de acuerdo al rol ya una vez verificado los datos
                if($resultado['tipoUsuario'] === 'Alumno'){//CHECAR COMO HACER PARA REDIRIGIR A ESTAS PAGINAS
                    
                    $consulta = SancionCRUD::ConsultarXavisos($usuario);
                    if($consulta !== null){
                        $_SESSION['SancionesNoRead'] = $consulta;
                    }
                
                    $consultaAvisos = AvisosCRUD::AvisosGeneral();
                    if($consultaAvisos !== null){
                        $_SESSION['Avisos'] = $consultaAvisos;
                        header("Location: ../Vista/html/PaginaInicioU.php");
                    }else{
                        header("Location: ../Vista/html/PaginaInicioU.php");
                    }
                    
                }else{
                    if($resultado['tipoUsuario'] === 'Vigilante'){
                        header("Location: ../Vista/html/PaginaInicioV.php");
                    }else{
                        if($resultado['tipoUsuario'] === 'Administrador'){
                            header("Location: ../Vista/html/PaginaInicioA.php");
                        }
                    }
                }
            }else{
                echo "<script>alert('Usuario o contraceña incorrectos.');
                window.location.href = '../Vista/html/InicioS.html';
                </script>";
                exit();
            }
            break;
        
        case "logout":
            $_SESSION = array(); // Limpia todas las variables de sesión le asigna un valor de null o 0 para asegurar que se borran las variables de session
            if (ini_get("session.use_cookies")) {//Aqui se verifica que la sesion esta siendo gestionada por cookies
                $params = session_get_cookie_params();//Aqui se optienen los parametros actuales de la cookie de la sesion vaya 
                setcookie(session_name(), '', time() - 42000,//Aqui se elimina el la cookie de la sesion asignandole un valor vacio y se le da un valor negativo para eliminarlo por asi decirlo
                    $params["path"], $params["domain"],//se asegura que la cookie fue eliminada correctamente
                    $params["secure"], $params["httponly"]
                );
            }
            session_destroy();//se destruye la sesion por completo 
            header("Cache-Control: no-cache, no-store, must-revalidate");//esto le dice al navegador que la pagina no debe de ser almacenada en el cache 
            header("Expires: 0");//le indica a la pagina que expire inmediatamente por eso el 0 
            header("Pragma: no-cache");//tambien indica que no se debe de almacenar la pagina en el cache
            header("Location: ../Vista/html/index.html");//redirecciona al index
            exit();
            break;
        
        case "GenerarPDF":
            header('Location: ../Modelo/GenerarPDF.php');/*TERMINAR LA GENERACION DE LOS PDF */
            break;
        case 'BusquedaGeneralProEdu':
            session_start();
            $consulta = CRUDProEdu::BusquedaGeneral();
            if(empty($consulta)){
                echo "<script>
                    alert('No se encontro nada');
                    window.location.href = '../Vista/html/ModificarProEdu.php';
                    </script>";
            }
            if($consulta !== null ){
                $_SESSION['DatosConsultaGeneral'] = $consulta;
                header('Location: ../Vista/html/ModificarProEdu.php');
            }else{
                header('Location: ../Vista/html/ModificarProEdu.php');
            }
            break;
        case 'BusquedaGeneralProEduE':
            session_start();
            $consulta = CRUDProEdu::BusquedaGeneral();
            if(empty($consulta)){
                echo "<script>
                    alert('No se encontro nada');
                    window.location.href = '../Vista/html/EliminarProEdu.php';
                    </script>";
            }
            if($consulta !== null ){
                $_SESSION['DatosConsultaGeneral'] = $consulta;
                header('Location: ../Vista/html/EliminarProEdu.php');
            }else{
                header('Location: ../Vista/html/EliminarProEdu.php');
            }
            break;
        case 'BuscarXnombre':
            session_start();
            $nombrePE = $_POST['nombreProEdu'];
            $consulta = CRUDProEdu::BusquedaXnombre($nombrePE);
            if(empty($consulta)){
                echo "<script>
                    alert('No se encontro nada');
                    window.location.href = '../Vista/html/ModificarProEdu.php';
                    </script>";
            }
            if($consulta !== null){
                $_SESSION['DatosConsultaXnombre'] = $consulta;
                header('Location: ../Vista/html/ModificarProEdu.php');
            }else{
                header('Location: ../Vista/html/ModificarProEdu.php');
            }
            break;
        case 'BuscarXnombreE':
                session_start();
                $nombrePE = $_POST['nombreProEdu'];
                $consulta = CRUDProEdu::BusquedaXnombre($nombrePE);
                if(empty($consulta)){
                    echo "<script>
                        alert('No se encontro nada!');
                        window.location.href = '../Vista/html/EliminarProEdu.php';
                        </script>";
                }
                if($consulta !== null){
                    $_SESSION['DatosConsultaXnombre'] = $consulta;
                    header('Location: ../Vista/html/EliminarProEdu.php');
                }else{
                    header('Location: ../Vista/html/EliminarProEdu.php');
                }
                break;
        case 'BuscarXclave':
            session_start();
            $clavePE = $_POST['claveProEdu'];
            $consulta = CRUDProEdu::BusquedaXclave($clavePE);
            if(empty($consulta)){
                echo "<script>
                    alert('No se encontro nada');
                    window.location.href = '../Vista/html/ModificarProEdu.php';
                    </script>";
            }
            if($consulta !== null){
                $_SESSION['DatosConsultaXclave'] = $consulta;
                header('Location: ../Vista/html/ModificarProEdu.php');
            }else{
                header('Location: ../Vista/html/ModificarProEdu.php');
            }
            break;
            case 'BuscarXclaveE':
                session_start();
                $clavePE = $_POST['claveProEdu'];
                $consulta = CRUDProEdu::BusquedaXclave($clavePE);
                if(empty($consulta)){
                    echo "<script>
                        alert('No se encontro nada');
                        window.location.href = '../Vista/html/EliminarProEdu.php';
                        </script>";
                }
                if($consulta !== null){
                    $_SESSION['DatosConsultaXclave'] = $consulta;
                    header('Location: ../Vista/html/EliminarProEdu.php');
                }else{
                    header('Location: ../Vista/html/EliminarProEdu.php');
                }
                break;
        case 'ModificarProEduPreVista':
            session_start();
            $idProEdu = $_GET['idModificacion'];

            $consulta = CRUDProEdu::BusquedaPorID($idProEdu);

            $_SESSION['DatosProEdu'] = $consulta;

            header("Location: ../Vista/html/ModificarProEdu.php");
            break;
        case 'ModificarProEdu':
            $idMod = $_POST['idModificacion'];
            $newNombre = $_POST['newNombrePE'];
            $newClave = $_POST['newClave'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas eliminar este Programa Educativo?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=ModificarProEdu2&idMod=" . urlencode($idMod) . "&nombre=" . urlencode($newNombre) . "&clave=" . urlencode($newClave) . "';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se modifico el Programa Educativo');
                    window.location.href = '../Vista/html/EliminarProEdu.php';
                }
            </script>";
            break;
        case 'ModificarProEdu2':
            $idMod = $_GET['idMod'];
            $newNombre = $_GET['nombre'];
            $newClave = $_GET['clave'];
            if(empty($idMod)){
                echo "<script>
                    alert('No se puede dejar el id en blanco!');
                    window.location.href = '../Vista/html/ModificarProEdu.php';
                    </script>";
            }else if(empty($newNombre) || empty($newClave)){
                echo "<script>
                    alert('No hay datos a modificar, no se modificara nada');
                    window.location.href = '../Vista/html/ModificarProEdu.php';
                    </script>";
            }
            $modificacion = CRUDProEdu::ModificarTodo($idMod,$newNombre,$newClave);
                if($modificacion === true){
                    echo "<script>
                    alert('Modificado con éxito');
                    window.location.href = '../Vista/html/EliminarProEdu.php';
                    </script>";
                }else{
                    echo "<script>
                    alert('No se puedo modificar');
                    window.location.href = '../Vista/html/EliminarProEdu.php';
                    </script>";
                }
            break;
        case 'EliminarProEdu2':
            $idE = $_GET['idEliminar'];
            $eliminarcion = CRUDProEdu::EliminarProEdu($idE);
            if($eliminarcion === true){
                echo "<script>
                    alert('Eliminado con éxito');
                    window.location.href = '../Vista/html/EliminarProEdu.php';
                    </script>";
            }else{
                echo "<script>
                    alert('No se encontro este programa educativo');
                    window.location.href = '../Vista/html/EliminarProEdu.php';
                    </script>";
            }
            break;
        case 'EliminarProEdu':
            $idE = $_GET['idEliminar'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas eliminar este Programa Educativo?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=EliminarProEdu2&idEliminar=$idE';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se eliminó el Programa Educativo');
                    window.location.href = '../Vista/html/EliminarProEdu.php';
                }
            </script>";
            break;
        /*CRUD MULTAS*/
        case 'RegistrarMulta': 
            $tipoMulta = $_POST['tipoMulta'];
            $horasMulta = $_POST['horasMulta'];
            if(empty($tipoMulta) || empty($horasMulta)){
                echo "<script>
                    alert('Ningun campo puede quedar vacio!');
                    window.location.href = '../Vista/html/RegistrarMulta.php';
                    </script>";
            }
            $registroMulta = MultaCRUD::RegistroMulta($tipoMulta,$horasMulta);
            if($registroMulta === true){
                echo "<script>
                    alert('Registro exitoso!');
                    window.location.href = '../Vista/html/RegistrarMulta.php';
                    </script>";
            }else{
                echo "<script>
                    alert('Registro no exitoso!');
                    window.location.href = '../Vista/html/RegistrarMulta.php';
                    </script>";
            }
            break;
        case 'EliminarMultaVista':
            session_start();
            $id = $_GET['idMulta'];
            $consulta = MultaCRUD::BusquedaEliminar($id);

            if($consulta !== null){
                $_SESSION['ModificacionMulta'] = $consulta;
                header('Location: ../Vista/html/ModificarMulta.php');
            }else{
                header('Location: ../Vista/html/EliminarMulta.php');
            }
            break;
        case 'ModificarMulta':
            $idMulta = $_POST['idMulta'];
            $tipoMulta = $_POST['newTipoMulta'];
            $horasMulta = $_POST['newHorasMultas'];
            echo "<script>
                if (confirm('¿Estás seguro de que deseas modificar este Programa Educativo?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=ModificarMulta2&idMulta=" . urlencode($idMulta) . "&tipoMulta=" . urlencode($tipoMulta) . "&horasMulta=" . urlencode($horasMulta) . "';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se modifico la Multa');
                    window.location.href = '../Vista/html/EliminarMulta.php';
                }
            </script>";
            break;
        case 'ModificarMulta2':
            $idMulta = $_GET['idMulta'];
            $tipoMulta = $_GET['tipoMulta'];
            $horasMulta = $_GET['horasMulta'];

            if(empty($idMulta)){
                echo "<script>
                    alert('$idMulta');
                    window.location.href = '../Vista/html/EliminarMulta.php';
                    </script>";
            }else if(empty($tipoMulta) || empty($horasMulta)){
                echo "<script>
                    alert('No hay datos para modificar');
                    window.location.href = '../Vista/html/EliminarMulta.php';
                    </script>";
            }
            $mod = MultaCRUD::ModificacionCompleta($tipoMulta,$horasMulta,$idMulta);

                if($mod === true){
                    echo "<script>
                    alert('Modificado con éxito');
                    window.location.href = '../Vista/html/EliminarMulta.php';
                    </script>";
                }else{
                    echo "<script>
                    alert('No se pudo modificar');
                    window.location.href = '../Vista/html/EliminarMulta.php';
                    </script>";
                }
                
            
            break;
        case 'BusquedaGeneralMulta':
            session_start();
            $consulta = MultaCRUD::ConsultaGeneral();
            if($consulta !== null ){
                $_SESSION['DatosConsultaGeneral'] = $consulta;
                header('Location: ../Vista/html/ModificarMulta.php');
            }else{
                header('Location: ../Vista/html/ModificarMulta.php');
            }
            break;
        case 'BusquedaXtipoMulta': 
            session_start();
            $tipoMulta = $_POST['TimpoMbuscar'];
            if(empty($tipoMulta)){
                echo "<script>
                    alert('No dejes campos en blanco');
                    window.location.href = '../Vista/html/ModificarMulta.php';
                    </script>";
            }
            $consulta = MultaCRUD::ConsultaXmulta($tipoMulta);

            if($consulta !== null){
                $_SESSION['DatosConsultaXnombre'] = $consulta;
                header('Location: ../Vista/html/ModificarMulta.php');
            }else{
                header('Location: ../Vista/html/ModificarMulta.php');
            }
            break;
        case 'BusquedaXhoras':
            session_start();
            $horasMulta = $_POST['HorasMBuscar'];
            if(empty($horasMulta)){
                echo "<script>
                    alert('No dejes campos en blanco');
                    window.location.href = '../Vista/html/ModificarMulta.php';
                    </script>";
            }
            $consulta = MultaCRUD::ConsultaXhoras($horasMulta);

            if($consulta !== null){
                $_SESSION['DatosConsultaXhoras'] = $consulta;
                header('Location: ../Vista/html/ModificarMulta.php');
            }else{
                header('Location: ../Vista/html/ModificarMulta.php');
            }
            break;
        case 'BusquedaGeneralMultaXE':
                session_start();
                $consulta = MultaCRUD::ConsultaGeneral();
                if($consulta !== null ){
                    $_SESSION['DatosConsultaGeneral'] = $consulta;
                    header('Location: ../Vista/html/EliminarMulta.php');
                }else{
                    header('Location: ../Vista/html/EliminarMulta.php');
                }
                break;
        case 'BusquedaXtipoMultaXE': 
                session_start();
                $tipoMulta = $_POST['TimpoMbuscar'];
                if(empty($tipoMulta)){
                    echo "<script>
                        alert('No dejes campos en blanco');
                        window.location.href = '../Vista/html/EliminarMulta.php';
                        </script>";
                }
                $consulta = MultaCRUD::ConsultaXmulta($tipoMulta);
    
                if($consulta !== null){
                    $_SESSION['DatosConsultaXnombre'] = $consulta;
                    header('Location: ../Vista/html/EliminarMulta.php');
                }else{
                    header('Location: ../Vista/html/EliminarMulta.php');
                }
                break;
        case 'BusquedaXhorasXE':
                session_start();
                $horasMulta = $_POST['HorasMBuscar'];
                if(empty($horasMulta)){
                    echo "<script>
                        alert('No dejes campos en blanco');
                        window.location.href = '../Vista/html/EliminarMulta.php';
                        </script>";
                }
                $consulta = MultaCRUD::ConsultaXhoras($horasMulta);
    
                if($consulta !== null){
                    $_SESSION['DatosConsultaXhoras'] = $consulta;
                    header('Location: ../Vista/html/EliminarMulta.php');
                }else{
                    header('Location: ../Vista/html/EliminarMulta.php');
                }
                break;
            case 'EliminarMulta2':
                $idMulta = $_GET['idEliminarM'];
                
                $Eliminacion = MultaCRUD::EliminarMulta($idMulta);

                if($Eliminacion === true){
                    echo "<script>
                        alert('Eliminado con éxito');
                        window.location.href = '../Vista/html/EliminarMulta.php';
                        </script>";
                }else{
                    echo "<script>
                        alert('$idMulta');
                        window.location.href = '../Vista/html/EliminarMulta.php';
                        </script>";
                }
                break;
            case 'EliminarMulta':
                $idMulta = $_GET['idEliminarM'];
                echo "<script>
                if (confirm('¿Estás seguro de que deseas eliminar este Multa?')) {
                    // Si el usuario confirma, redirige a un script PHP que realiza la eliminación
                    window.location.href = '../Controlador/Controlador.php?accion=EliminarMulta2&idEliminarM=$idMulta';
                } else {
                    // Si el usuario cancela, muestra un mensaje y redirige de nuevo
                    alert('No se eliminó el Multa');
                    window.location.href = '../Vista/html/EliminarMulta.php';
                }
                </script>";
                break;
        
    }

?>