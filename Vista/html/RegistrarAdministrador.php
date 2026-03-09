<?php
require '../../Config/sesionCheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/RegistrarAdmin.css">
</head>
<body>
    <header>
        <h1>Registrar Administrador</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
                <nav class="navbar">
                    <ul>
                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudAldmin"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>
    </header> 
    <div class="formularioA">
        <form method="post" action="../../Controlador/Controlador.php">
            <input type="hidden" name="accion" value="registrarAdministrador"> 
            <div class="MatriculaA">
                <label>Matrícula</label>
                <input type="text" name="txtMatriculaA" required>
            </div>
            <div class="NombreA">
                <label>Nombre</label>
                <input type="text" name="txtNombreA" required>
            </div>
            <div class="ApellidosA">
                <label>Apellidos</label>
                <input type="text" name="txtApellidosA" required>
            </div>
            <div class="PassowrdA">
                <label>Contraseña</label>
                <input type="password" name="txtPasswordA" required>
            </div>
            <div class="fechaNac">
                <label>Fecha de nacimiento</label>
                <input type="date" name="FechaNacAdmin" id="FechaNacAdmin" required> 
            </div>
            <div class="genero">
                <label>Género</label>
                <select name="genero" id="genero" required>
                    <option value="">Ninguno</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Registrar">
            </div>
        </form>
    </div>
</body>
</html>
