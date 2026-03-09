<?php
    require '../../Config/sesionCheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/CrudAvisos.css">
    <script>
        function redirigir(destino){
            if(destino === 'RegistrarAvisos'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=RegistrarAvisos';
            }else if(destino === 'BuscarAvisos'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=BuscarAvisos';
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
    <div class="CrudAvisos">
        <input type="button" value="Registrar Avisos" onclick = "redirigir('RegistrarAvisos')">
        <input type="button" value="Buscar Avisos" onclick = "redirigir('BuscarAvisos')">
    </div>
</body>
</html>