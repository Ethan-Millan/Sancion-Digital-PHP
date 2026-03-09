<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estanncia II</title>
    <link rel="stylesheet" href="../css/CrudMultas.css">
    <script>
        function redirigir(destino){
            if(destino === 'RegistrarMulta'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=RegistrarMulta';
            }else if(destino === 'EliminarMulta'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarMulta';
            }
        }
    </script>
</head>
<body>
    <header>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <div class = "back">
            <div class="menu container">
                <nav class="navbar">
                    <ul>
                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=RegresarPagAdmin"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="CrudMultas">
        <input type="button" value="Registrar Multa" onclick = "redirigir('RegistrarMulta')">
        <input type="button" value="Buscar Multas" onclick = "redirigir('EliminarMulta')">
    </div>

</body>
</html>