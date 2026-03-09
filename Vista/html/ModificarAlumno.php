<?php
    require '../../Config/sesionCheck.php';
?>
<?php
    if(isset($_SESSION['DatosConsultaGeneral'])){
        $ProEdu = $_SESSION['DatosConsultaGeneral'];
    }else{
        $consulta = [];
    }
    if(isset($_SESSION['modificarAlumno'])){
        $consultas = $_SESSION['modificarAlumno'];
    }else{
        $consultas = [];
        header('Location: ../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarAlumno');
    }
    unset($_SESSION['modificarAlumno']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/ModificarAlumno.css">
</head>
<body>
    <header>
    <h1>Modificar Alumno</h1>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
                <nav class="navbar">
                    <ul>
                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarAlumno"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>
    </header>   
    

    <div class="FormularioFU">
        <form action="../../Controlador/Controlador.php" method="post">
            <input type="hidden" name="accion" value="modificarAlumno"> 
            
            <div class="MatriculaOld">
                <input type="hidden" name="txtMatriculaOld" value="<?php echo htmlspecialchars($consultas['matricula']); ?>" required>
            </div>
            
            <div class="MatriculaNew">
                <label>Matricula</label>
                <input type="text" name="txtMatriculaNew" value="<?php echo htmlspecialchars($consultas['matricula']); ?>" required>
            </div>

            <div class="Nombre">
                <label>Nombre:</label>
                <input type="text" name="txtNombre" value="<?php echo htmlspecialchars($consultas['nombre']); ?>" required>
            </div>
            <div class="Apellidos">
                <label>Apellidos:</label>
                <input type="text" name="txtApellidos" value="<?php echo htmlspecialchars($consultas['apellidos']); ?>" required>
            </div>
            <div class="Genero">
                <label>Genero</label>
                <select name="Genero">
                    <option value="">Ninguno</option>
                    <option value="Mujer" <?php echo ($consultas['genero'] === 'Mujer') ? 'selected' : ''; ?>>Mujer</option>
                    <option value="Hombre" <?php echo ($consultas['genero'] === 'Hombre') ? 'selected' : ''; ?>>Hombre</option>
                </select>
            </div>
            <div class="FecNac">
                <label>Fecha nacimiento:</label>
                <input type="date" name="txtFechaNacimiento" value="<?php echo htmlspecialchars($consultas['fecha_nac']); ?>" required>
            </div>
            <div class="password">
                <label>Contraceña:</label>
                <input type = "password" name = 'txtPasswordAlu' value="<?php echo htmlspecialchars($consultas['contra']); ?>" required>
            </div>
            <div class="Grado">
                <label>Grado:</label>
                <select name="GradoNum">
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<option value='$i' " . ($consultas['grado'] == $i ? 'selected' : '') . ">$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="Grupo">
                <label>Grupo:</label>
                <select name="Grupo">
                    <?php
                    $grupos = ['A', 'B', 'C', 'D', 'E', 'F'];
                    foreach ($grupos as $grupo) {
                        echo "<option value='$grupo' " . ($consultas['grupo'] == $grupo ? 'selected' : '') . ">$grupo</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="Especialidad">
                <label>Especialidad:</label>
                <select name="Especialidad">
                    <?php
                    if (!empty($ProEdu)) {
                        foreach ($ProEdu as $programa) {
                            echo "<option value='" . htmlspecialchars($programa['idProgramaEducativo']) . "' " . ($consultas['idProgramaEducativo'] == $programa['idProgramaEducativo'] ? 'selected' : '') . ">" . htmlspecialchars($programa['NombreCarrera']) . "</option>";
                        }
                    } else {
                        echo "<option>No hay programas educativos registrados</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="IniciarS">
                <input type="submit" value="Modificar">
            </div>
        </form>
    </div>
</body>
</html>