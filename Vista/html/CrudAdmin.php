<?php
    require '../../Config/sesionCheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/CrudAdmin.css">
    <script>
        function redirigir(destino){
            if(destino === 'RegistrarVAdmin'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=RegistrarVAdmin';
            }else if(destino === 'EliminarAdmin'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarAdmin'; 
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
        <input type="button" value="Registrar Administrador" onclick = "redirigir('RegistrarVAdmin')">
        <input type="button" value="Buscar Administrador" onclick = "redirigir('EliminarAdmin')">
    </div>
</body>
</html>