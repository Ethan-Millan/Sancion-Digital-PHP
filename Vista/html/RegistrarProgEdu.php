<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/RegistrarProEdu.css">
</head>
<body>
    <header>
        <h1>Registrar Programa Educativo</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=ProgramaEducativo"><img src="../img/Regresar.png" alt=""></a></li>
            </ul>
        </nav>
    </header> 
    <div class="formularioProgramaEducativo">
        <form action="../../Controlador/Controlador.php" method="post">
            <input type="hidden" name="accion" value="registrarProEdu"> 
            <div class="nombreCarrera">
                <label>Nombre de la carrera</label>
                <input type="text" name="nombreCarrera" id="nombreCarrera">
            </div>
            <div class="ClaveCarrera">
                <label>Clave de la carrera</label>
                <input type="text" name="ClaveCarrera" id="ClaveCarrera">
            </div>
            <div class="botonEnviar">
                <input type="submit" value="Registrar">
            </div>
        </form>
    </div>
</body>
</html>
