<?php
    require '../../Config/sesionCheck.php';
?>
<?php
if(isset($_SESSION['MatriculaVigilantes'])){
    $consulta = $_SESSION['MatriculaVigilantes'];
}else{
    $consulta = [];
}
if(isset($_SESSION['DatosConsultaMulta'])){
    $Multa = $_SESSION['DatosConsultaMulta'];
}else{
    $Multa = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>    
    <link rel="stylesheet" href="../css/RegistrarSansion.css">
</head>
<body>
    <header>
        <h1>Registro de sanción</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
            <nav class="navbar">
                <ul>
                    <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudSancion"><img src="../img/Regresar.png" alt=""></a></li> 
                </ul>
            </nav>
    </header>   
    <div class="formularioSancion">
        
        <form action="../../Controlador/Controlador.php" method="post">
        <input type="hidden" name="accion" value="RegistroSancion">
            <div class="MatriculaAlumno">
                <label>Matrícula del sancionado</label>
                <input type="text" name="txtMatriculaSancionado" id="txtMatriculaSancionado">
            </div>
            <div class="matriculaVigilante">
                <label>Matrícula Vigilante</label>
                <select name="txtMatriculaVigilante">
                        
                        <option value="">Ninguno</option>
                        <?php
                            if(!empty($consulta)){
                                foreach($consulta as $consulta){
                                    echo "<option value = '".htmlspecialchars($consulta['matriculaV']) . "'>" . htmlspecialchars($consulta['matriculaV']) . "</option>";
                                }
                            }else{
                                echo "<option>" . "No hay programas educativos registrados" . "</option>";
                            }
                        ?>
                    </select>

            </div>
            <div class="fechaMulta">
                <label>Fecha de multa</label>
                <input type="date" name="txtFechaMulta" id="txtFechaMulta">
            </div>
            <div class="descripcionMulta">
                <label>Descripción</label>
                <input type="text" name="txtDescripcion" id="txtDescripcion">
            </div>
            <div class="pagada">
            <label>¿Pagada?</label>    
                <select name="Pago" id="Pago">
                    
                    <option value="">Ninguno</option>
                    <option value="1">Sí</option>
                    <option value="2">No</option>
                </select>
            </div>
            <div class="Multa">
            <label>Multa</label>
                    <select name="Multa">
                        
                        <option value="">Ninguno</option> 
                        <?php
                            if(!empty($Multa)){
                                foreach($Multa as $programa){
                                    echo "<option value = '".htmlspecialchars($programa['idMulta']) . "'>" . htmlspecialchars($programa['TipoMulta']) . "</option>";
                                }
                            }else{
                                echo "<option>" . "No hay programas educativos registrados" . "</option>";
                            }
                        ?>
                    </select>
            </div>
            <div class="RegistrarSancino">
                    <input type="submit" value="Registrar">
            </div>
        </div>
        </form>
</body>
</html>
