<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/RegistrarMulta.css">
</head>
<body>
    <header>
        <h1>Registrar Multa</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=GestionMulta"><img src="../img/Regresar.png" alt=""></a></li>
            </ul>
        </nav>
    </header>
    <div class="Formulario">
        <form action="../../Controlador/Controlador.php" method="post">
            <input type="hidden" name="accion" value="RegistrarMulta">
            <div class="TipoMulta">
                <label>Tipo de multa</label>
                <input type="text" name="tipoMulta" id="tipoMulta">
            </div>
            <div class="HorasServ">
                <label>Horas asignadas a la multa</label>
                <input type="text" name="horasMulta" id="horasMulta">
            </div>
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
