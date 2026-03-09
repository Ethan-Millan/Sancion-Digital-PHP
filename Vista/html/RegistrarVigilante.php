<?php
    require '../../Config/sesionCheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/RegistrarVigilantes.css">
</head>
<body>
    <header>
                <h1>Registro Vigilantes</h1>
                <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
                <nav class="navbar">
                    <ul>
                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudVigilante"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>
    </header>
    <div class="RegistrarV">
        <form action="../../Controlador/Controlador.php" method="POST">
            <input type="hidden" name="accion" value="registrarVigilante"> 
            <div class="MatriculaV">
                <label>Matrícula</label>
                <input type="text" name="txtMatriculaV" required>
            </div> 
            <div class="NombreV">
                <label>Nombre</label>
                <input type="text" name="txtNombreV" required>
            </div>
            <div class="ApellidosV">
                <label>Apellidos</label>
                <input type="text" name="txtApellidosV" required>
            </div>
            <div class="Genero">
                <label>Género</label>
                <select name="rolG" required>
                    <option value="">Ninguno</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </div>
            <div class="fechaNac">
                <label>Fecha de nacimiento</label>
                <input type="date" name="txtFechaNacimientoV" required>
            </div>
            <div class="PasswordV">
                <label>Contraseña</label>
                <input type="password" name="txtPasswordV" required>
            </div>
            <div class="cajaVigilanteCargo">
                <label>Cargo</label>
                <select name="rol" required>    
                    <option value="">Ninguno</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Miembro de Seguridad">Miembro de Seguridad</option>
                    <option value="Administrador general">Administrador general</option>
                </select>
            </div>
            <div class="Enviar">
                <input type="submit" value="Registrar">
            </div>
        </form>
    </div>
</body>
</html>
