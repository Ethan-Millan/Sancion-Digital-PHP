<?php
require '../../Config/sesionCheck.php';

if (isset($_SESSION['AvisoMod'])) {
    $aviso = $_SESSION['AvisoMod'];
} else {
    $aviso = [];
    header('Location: ../../Controlador/Controlador.php?accion=Redireccion&accion2=BuscarAvisos');
    exit();
}

if (isset($_SESSION['MatriculaVigilantes'])) {
    $consulta = $_SESSION['MatriculaVigilantes'];
} else {
    $consulta = [];
}

unset($_SESSION['AvisoMod']); // Limpiar la sesión de AvisoMod
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/ModificarAvisos.css">
</head>
<body>
    <header>
        <h1>Modificar Avisos</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=BuscarAvisos"><img src="../img/Regresar.png" alt="Regresar"></a></li>
            </ul>
        </nav>
    </header> 
    <div class="Formulario">
        <form action="../../Controlador/Controlador.php" method="post">
            <input type="hidden" name="accion" value="ModificarAviso">
            <input type="hidden" name="idAviso" value="<?php echo htmlspecialchars($aviso['idAvisos']); ?>">

            <div class="Titulo">
                <label for="txtTitulo">Título</label>
                <input type="text" name="txtTitulo" id="txtTitulo" value="<?php echo htmlspecialchars($aviso['Titulo']); ?>" required>
            </div>
            <div class="Fecha">
                <label for="txtFechaP">Fecha de publicación</label>
                <input type="date" name="txtFechaP" id="txtFechaP" value="<?php echo htmlspecialchars($aviso['Fecha']); ?>" required>
            </div>
            <div class="Importancia">
                <label for="Importancia">Importancia</label>
                <select name="Importancia" id="Importancia" required>
                    <option value="">Ninguno</option>
                    <option value="Baja" <?php echo ($aviso['Categoria'] === 'Baja') ? 'selected' : ''; ?>>Baja</option>
                    <option value="Media" <?php echo ($aviso['Categoria'] === 'Media') ? 'selected' : ''; ?>>Media</option>
                    <option value="Alta" <?php echo ($aviso['Categoria'] === 'Alta') ? 'selected' : ''; ?>>Alta</option>
                    <option value="Obligatoria" <?php echo ($aviso['Categoria'] === 'Obligatoria') ? 'selected' : ''; ?>>Obligatoria</option>
                </select>
            </div>
            <div class="Descripcion">
                <label for="txtDescripcion">Descripción</label>
                <textarea name="txtDescripcion" id="txtDescripcion" rows="6" cols="58" required><?php echo htmlspecialchars($aviso['Descripcion']); ?></textarea>
            </div>
            <div class="vigilante">
                <label for="MatriculaVigilante">Matrícula Vigilante</label>
                <select name="MatriculaVigilante" id="MatriculaVigilante">
                    <option value="">Ninguno</option>
                    <?php
                    if (!empty($consulta)) {
                        foreach ($consulta as $vigilante) {
                            echo "<option value='" . htmlspecialchars($vigilante['matriculaV']) . "' " . 
                                ($aviso['vigilante_matriculaV'] == $vigilante['matriculaV'] ? 'selected' : '') . ">" . 
                                htmlspecialchars($vigilante['matriculaV']) . "</option>";
                        }
                    } else {
                        echo "<option>No hay vigilantes registrados</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="enviar">
                <input type="submit" value="Modificar">
            </div>
        </form>
    </div>
</body>
</html>
