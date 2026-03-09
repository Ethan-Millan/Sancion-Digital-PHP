<?php
require '../../Config/sesionCheck.php';
?>
<?php
    if(isset($_SESSION['ModificarAdmin'])){
        $consultas = $_SESSION['ModificarAdmin'];
    }else{
        $consultas = [];
        header('Location: ../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarAdmin');
    }
    unset($_SESSION['ModificarAdmin']);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/ModificarAdmin.css">
</head>
<body>
    <header>
    <h1>Modificar Administrador</h1>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
                <nav class="navbar">
                    <ul>
                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarAdmin"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>

    </header> 
    
    <div class="formularioA">
        <form method="post" action="../../Controlador/Controlador.php">
            <input type="hidden" name="accion" value="ModificarAdmin"> 
            <div class="MatriculaAOld">
                <input type="hidden" name="txtMatriculaAOld"  value="<?php echo htmlspecialchars($consultas['matriculaA']); ?>" required>
            </div>
            <div class="MatriculaANew">
                <label>Matricula nueva</label>
                <input type="text" name="txtMatriculaANew" value="<?php echo htmlspecialchars($consultas['matriculaA']); ?>" required>
            </div>
            <div class="NombreA">
                <label>Nombre</label>
                <input type="text" name="txtNombreA" value="<?php echo htmlspecialchars($consultas['nombreA']); ?>" required>  
            </div>
            <div class="ApellidosA">
                <label>Apellidos</label>
                <input type="text" name="txtApellidosA" value="<?php echo htmlspecialchars($consultas['apellidosA']); ?>" required>
            </div>
            <div class="PassowrdA">
                <label>Contraseña</label>
                <input type="password" name="txtPasswordA" value="<?php echo htmlspecialchars($consultas['contraA']); ?>" required>
            </div>
            <div class="fechaNac">
                <label>Fecha de nacimiento</label>
                <input type="date" name="FechaNacAdmin" id="FechaNacAdmin" value="<?php echo htmlspecialchars($consultas['fechaNac']); ?>" required>
            </div>
            <div class="genero">
                <label>Género</label>
                <select name="genero" id="genero" required>
                    <option value="">Ninguno</option>
                    <option value="Mujer" <?php echo ($consultas['generoA'] === 'Mujer') ? 'selected' : ''; ?>>Mujer</option>
                    <option value="Hombre" <?php echo ($consultas['generoA'] === 'Hombre') ? 'selected' : ''; ?>>Hombre</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Modificar">
            </div>
        </form>
    </div>
</body>
</html>