<?php
require '../../Config/sesionCheck.php'; 
?>
<?php
    if(isset($_SESSION['SancionMod'])){
        $sancion = $_SESSION['SancionMod'];
    } else {
        $sancion = [];
        header('Location: ../../Controlador/Controlador.php?accion=Redireccion&accion2=BuscarSancion');
    }

    if(isset($_SESSION['DatosConsultaMulta'])){
        $multa = $_SESSION['DatosConsultaMulta'];
    } else {
        $multa = [];
    }

    unset($_SESSION['SancionMod']); // Limpiar la sesión de SancionMod
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/ModificarSancion.css">
</head>
<body>
    <header>
        <h1>Modificar Sanción</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
            <nav class="navbar">
                <ul>
                    <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=BuscarSancionV"><img src="../img/Regresar.png" alt=""></a></li> 
                </ul>
            </nav>
    </header>
    <div class="formularioSancion">
        
        <form action="../../Controlador/Controlador.php"  method = "post">
        <input type="hidden" name="accion" value="ModificarSancionV">
        <input type="hidden" name="idSancion" value="<?php echo htmlspecialchars($sancion['idM']); ?>">
        <div class="MatriculaAlumno">
            <label>Matricula del sancionado</label>
            <input type="text" name="txtMatriculaSancionado" id="txtMatriculaSancionado" value="<?php echo htmlspecialchars($sancion['matriculaAlumno']); ?>">
        </div>
        <div class="matriculaVigilante">
            <label>Matricula Vigilante</label>
            <input type="text" name="txtMatriculaVigilante" id="txtMatriculaVigilante" value="<?php echo htmlspecialchars($sancion['matriculaVigilante']); ?>">
        </div>
        <div class="fechaMulta">
            <label>Fecha Multa</label>
            <input type="date" name="txtFechaMulta" id="txtFechaMulta" value="<?php echo htmlspecialchars($sancion['fecha_multa']); ?>">
        </div>
        <div class="descripcionMulta">
            <label>Descripcion</label>
            <input type="text" name="txtDescripcion" id="txtDescripcion" value="<?php echo htmlspecialchars($sancion['descripcion']); ?>">
        </div>
        <div class="pagada">
            <label>Pagada</label>    
            <select name="Pago" id="Pago">
                <option value="">Ninguno</option>
                <option value="1" <?php echo ($sancion['pagada'] === 1) ? 'selected' : ''; ?>>Si</option>
                <option value="2" <?php echo ($sancion['pagada'] === 0) ? 'selected' : ''; ?>>No</option>
            </select>
        </div>
        <div class="Multa">
            <label>Multa:</label>
            <select name="Multa" id="Multa">
            <option value="">Ninguno</option>
                <?php
                if (!empty($multa)) {
                    foreach ($multa as $programa) {
                        // Usamos un operador ternario para seleccionar la multa adecuada
                        echo "<option value='" . htmlspecialchars($programa['idMulta']) . "' " . 
                            ($sancion['Multa_idMulta'] == $programa['idMulta'] ? 'selected' : '') . ">" . 
                            htmlspecialchars($programa['TipoMulta']) . 
                            "</option>";
                    }
                } else {
                    echo "<option>No hay multas registradas</option>";
                }
                ?>
            </select>
        </div>
            <div class="RegistrarSancino">
                    <input type="submit" value="Modificar">
            </div>
        </div>
        </form>
</body>
</html>