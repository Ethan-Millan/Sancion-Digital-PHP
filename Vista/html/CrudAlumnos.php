<?php
    require '../../Config/sesionCheck.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/CrudAlumnos.css">
    <script>
        function redirigir(destino){
            if(destino === 'RegistrarAlumno'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=RegistroAlumno';
            }else if(destino === 'EliminarAlumno'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarAlumno';
            }
        }
    </script>
</head>
<body>
    <header>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
                <nav class="navbar">
                    <ul>
                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudUsuarios"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>
    </header> 
    <div class="CrudAlumno">
        <input type="button" value="Registrar Alumno" onclick = "redirigir('RegistrarAlumno')">
        <input type="button" value="Buscar Alumno" onclick = "redirigir('EliminarAlumno')">
    </div>
</body>
</html>