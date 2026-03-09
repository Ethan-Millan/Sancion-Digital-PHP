<?php
    session_start();
    if(isset($_SESSION['ModificacionMulta'])){
        $consultas = $_SESSION['ModificacionMulta'];
    }else{
        $consultas = [];
        header('Location: ../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarMulta');
    }

    unset($_SESSION['ModificacionMulta']);
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/ModificarMulta.css">
    <script>
        function redirigir(direccion){
            if(direccion === 'BusquedaGeneralMulta'){
                window.location.href = '../../Controlador/Controlador.php?accion=BusquedaGeneralMulta';
            }
        }
    </script>
</head>
<body>
    <header>
        <h1>Modificaciones</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarMulta"><img src="../img/Regresar.png" alt=""></a></li>
            </ul>
        </nav>
    </header>
    
    <div class="formulario">
        <form action="../../Controlador/Controlador.php" method="post">
            <input type="hidden" name="accion" value="ModificarMulta">
            <input type="hidden" name="idMulta" id="idMulta" value="<?php echo htmlspecialchars($consultas['idMulta']); ?>">

            <div class="nuevoTipoM">
                <label>Tipo multa</label>
                <input type="text" name="newTipoMulta" id="newTipoMulta" value="<?php echo htmlspecialchars($consultas['TipoMulta']); ?>">
            </div>

            <div class="newHorasM">
                <label>Horas de la multa</label>
                <input type="text" name="newHorasMultas" id="newHorasMultas" value="<?php echo htmlspecialchars($consultas['HorasServicio']); ?>">
            </div>

            <input type="submit" value="Modificar">
        </form>
    </div>
</body>
</html>
