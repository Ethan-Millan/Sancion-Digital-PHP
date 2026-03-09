<?php
    require '../../Config/sesionCheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/CrudUsuarios.css">
    <script>
        function redirigir(destino){
            if(destino === 'GAlumno'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudAlumnos';
            }else if(destino === 'GVigilantes'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudVigilante';
            }else if(destino === 'GAdministrador'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudAdmin';
            }
        }
    </script>
</head>
<body>
    <header>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
                <nav class="navbar">
                    <ul>
                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=RegresarPagAdmin"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>

    </header> 
    <div class="UsuariosCrud">
        <input type="button" value="Gestión Alumnos" onclick="redirigir('GAlumno')">
        <input type="button" value="Gestión Vigilantes" onclick="redirigir('GVigilantes')">
        <input type="button" value="Gestión Administradores" onclick="redirigir('GAdministrador')">
    </div>
</body>
</html>