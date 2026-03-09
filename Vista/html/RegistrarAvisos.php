<?php
require '../../Config/sesionCheck.php';

if (isset($_SESSION['MatriculaVigilantes'])) {
    $consulta = $_SESSION['MatriculaVigilantes'];
} else {
    $consulta = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/RegistrarAvisos.css">
</head>
<body>
    <header>
        <h1>Registrar Avisos</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudAvisos"><img src="../img/Regresar.png" alt="Regresar"></a></li>
            </ul>
        </nav>
    </header> 
    <div class="Formulario">
        <form action="../../Controlador/Controlador.php" method="post">
            <input type="hidden" name="accion" value="RegistrarAviso">
            <div class="Titulo">
                <label for="txtTitulo">Título</label>
                <input type="text" name="txtTitulo" id="txtTitulo" required>
            </div>
            <div class="Fecha">
                <label for="txtFechaP">Fecha de publicación</label>
                <input type="date" name="txtFechaP" id="txtFechaP" required>
            </div>
            <div class="Importancia">
                <label for="Importancia">Importancia</label>
                <select name="Importancia" id="Importancia" required>
                    <option value="">Ninguno</option>
                    <option value="Baja">Baja</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                    <option value="Obligatoria">Obligatoria</option>
                </select>
            </div>
            <div class="Descripcion">
                <label for="txtDescripcion">Descripción</label>
                <textarea name="txtDescripcion" id="txtDescripcion" rows="6" cols="58" required></textarea>
            </div>
            <div class="vigilante">
                <label for="MatriculaVigilante">Matrícula Vigilante</label>
                <select name="MatriculaVigilante" id="MatriculaVigilante">
                    <option value="">Ninguno</option>
                    <?php
                    if (!empty($consulta)) {
                        foreach ($consulta as $consulta) {
                            echo "<option value='" . htmlspecialchars($consulta['matriculaV']) . "'>" . htmlspecialchars($consulta['matriculaV']) . "</option>";
                        }
                    } else {
                        echo "<option>No hay vigilantes registrados</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="enviar">
                <input type="submit" value="Registrar">
            </div>
        </form>
    </div>
</body>
</html>
