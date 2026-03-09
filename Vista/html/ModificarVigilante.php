<?php
    require '../../Config/sesionCheck.php';
?>
<?php
    if(isset($_SESSION['modificarVigilate'])){
        $consultas = $_SESSION['modificarVigilate'];
    }else{
        $consulta = [];
        header('Location: ../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarVigilante');
    }
    unset($_SESSION['modificarVigilate']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/ModificarVigilante.css">
</head>
<body>
    <header>
    <h1>Modificar Vigilante</h1>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
                <nav class="navbar">
                    <ul>

                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarVigilante"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>
    </header>

    <div class="RegistrarV">
        
        <form action="../../Controlador/Controlador.php" method="POST">
            <input type="hidden" name="accion" value="modificarVigilante"> 
            <div class="MatriculaVOld">
                <input type="hidden" name="txtMatriculaVOld" value="<?php echo htmlspecialchars($consultas['matriculaV']); ?>" required>
            </div>
            <div class="MatriculaVnew">
                <label>Matricula</label>
                <input type="text" name="txtMatriculaVNew" value="<?php echo htmlspecialchars($consultas['matriculaV']); ?>" required>
            </div> 
            <div class="NombreV">
                <label>Nombre</label>
                <input type="text" name="txtNombreV" value="<?php echo htmlspecialchars($consultas['nombreV']); ?>" required>
            </div>
            <div class="ApellidosV">
                <label>Apellidos</label>
                <input type="text" name="txtApellidosV" value="<?php echo htmlspecialchars($consultas['apellidosV']); ?>" required>
            </div>
            <div class="Genero">
                <label>Genero</label>
                <select name="rolG" required>
                <option value="">Ninguno</option>
                    <option value="Mujer" <?php echo ($consultas['generoV'] === 'Mujer') ? 'selected' : ''; ?>>Mujer</option>
                    <option value="Hombre" <?php echo ($consultas['generoV'] === 'Hombre') ? 'selected' : ''; ?>>Hombre</option>
                </select>
            </div>
            <div class="fechaNac">
                <label>Fecha de nacimiento</label>
                <input type="date" name="txtFechaNacimientoV" value="<?php echo htmlspecialchars($consultas['fecha_nacV']); ?>" required>
            </div>
            <div class="PasswordV">
                <label>Contraseña</label>
                <input type="password" name="txtPasswordV" value="<?php echo htmlspecialchars($consultas['contraV']); ?>" required>
            </div>
            <div class="cajaVigilanteCargo">
                <label>Cargo</label>
                <select name="rol" required>    
                    <option value="">Ninguno</option>
                    <option value="Profesor" <?php echo ($consultas['cargoV'] === 'Profesor') ? 'selected' : ''; ?>>Profesor</option>
                    <option value="Miembro de Seguridad" <?php echo ($consultas['cargoV'] === 'Miembro de Seguridad') ? 'selected' : ''; ?>>Miembro de Seguridad</option>
                    <option value="Administrador Administrativo" <?php echo ($consultas['cargoV'] === 'Administrador Administrativo') ? 'selected' : ''; ?>>Administrador Administrativo</option>
                </select>
            </div>
            <div class="Enviar">
                <input type="submit" value="Modificar">
            </div>
        </form>
    </div>
</body>
</html>