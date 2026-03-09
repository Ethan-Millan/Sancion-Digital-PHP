<?php
    require '../../Config/sesionCheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/CrudSansion.css">
    <script>
        function redirigir(destino){
            if(destino === 'RegistrarSanción'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=RegistrarSancion';
            }else if(destino === 'EliminarSanción'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=BuscarSancion';
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

        </div>
    </header>
    <div class="CrudSancion">
        <input type="button" value="Registrar Sanción" onclick = "redirigir('RegistrarSanción')">
        <input type="button" value="Buscar Sanción" onclick = "redirigir('EliminarSanción')">
    </div>
</body>
</html>