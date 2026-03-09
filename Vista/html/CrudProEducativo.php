<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/CrudProEducativo.css">
    <script>
        function redirigir(destino){
            if(destino === 'RegistroProEdu'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=RegistroProEdu';
            }else if(destino === 'EliminarProEdu'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarProEdu';
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
    <div class="crudProEducativo">
        <input type="button" value="Registrar Programa Educativo" onclick="redirigir('RegistroProEdu')">   
        <input type="button" value="Buscar Programa Educativo" onclick = "redirigir('EliminarProEdu')">
    </div>
</body>
</html>