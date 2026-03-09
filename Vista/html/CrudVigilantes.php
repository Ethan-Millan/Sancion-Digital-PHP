<?php
    require '../../Config/sesionCheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/CrudVigilante.css">
    <script>
        function redirigir(destino){
            if(destino === 'RegistrarVigilantes'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=RegistrarVigilante';
            }else if(destino === 'EliminarVigilante'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarVigilante';
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
    <div class="CrudVigilantes">
        <input type="button" value="Registrar Vigilantes" onclick = "redirigir('RegistrarVigilantes')">
        <input type="button" value="Buscar Vigilantes" onclick = "redirigir('EliminarVigilante')">
    </div>
</body>
</html>