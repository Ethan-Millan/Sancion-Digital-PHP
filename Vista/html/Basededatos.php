<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/BasedeDatos.css">
</head>
<body>
    <header>
        <h1>Base de datos</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=RegresarPagAdmin"><img src="../img/Regresar.png" alt="Regresar"></a></li>
            </ul>
        </nav>
    </header> 
    <div class="Botones">
        <div class="Restauracion">
        <h3>Restauración</h3>
        <form action="../../Controlador/Controlador.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="accion" value="RestauracionBD">
            <label for="archivo" style="cursor: pointer;">
                <img src="../img/respaldoBD.png" alt="Restauracion base de datos" class="img-restauracion">
            </label>
            <input type="file" name="archivo" id="archivo" accept=".sql" style="display: none;" onchange="this.form.submit()">
        </form>
        </div>
        
        <div class="Respaldo">
            <h3>Respaldo</h3>
            <a href="../../Controlador/Controlador.php?accion=RespaldoBD">
            <img src="../img/descargaBD.png" alt="Respaldo base de datos" class="img-respaldo"></a>
        </div>
        
    </div>
</body>
</html>
