<?php
    require '../../Config/sesionCheck.php';
?>

<?php
    
    if(isset($_SESSION['DatosConsultaGeneral'])){
        $consultas = $_SESSION['DatosConsultaGeneral'];
    }else if(isset($_SESSION['DatosConsultaXnombre'])){
        $consultas = $_SESSION['DatosConsultaXnombre'];
    }else if(isset($_SESSION['DatosConsultaXhoras'])){
        $consultas = $_SESSION['DatosConsultaXhoras'];
    }else{
        $consultas = [];
    }

        unset($_SESSION['DatosConsultaGeneral']);
        unset($_SESSION['DatosConsultaXnombre']);
        unset($_SESSION['DatosConsultaXhoras']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/BuscarMulta.css">
    <script>
        function redirigir(direccion){
            if(direccion === 'BusquedaGeneralMulta'){
                window.location.href = '../../Controlador/Controlador.php?accion=BusquedaGeneralMultaXE';
            }
        }
    </script>
</head>
<body>
<header>
        <h1>Buscar Multa</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=GestionMulta"><img src="../img/Regresar.png" alt="Regresar"></a></li>
            </ul>
        </nav>
    </header>
    <div class="formularios">
    <input type="button" value="Búsqueda general" onclick="redirigir('BusquedaGeneralMulta')" class="boton-general">

    <form action="../../Controlador/Controlador.php" method="post" class="formulario-buscar">
        <input type="hidden" name="accion" value="BusquedaXtipoMultaXE">
        <div class="TipoMultaB">
            <label>Nombre a Buscar</label>
            <input type="text" name="TimpoMbuscar" id="TimpoMbuscar">
        </div>
        <input type="submit" value="Buscar">
    </form>

    <form action="../../Controlador/Controlador.php" method="post" class="formulario-buscar">
        <input type="hidden" name="accion" value="BusquedaXhorasXE">
        <div class="HorasMultaB">
            <label>Horas de servicio</label>
            <input type="text" name="HorasMBuscar" id="HorasMBuscar">
        </div>
        <input type="submit" value="Buscar">
    </form>
</div>

    <div class="tabla">
    <table>
        
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de multa</th>
                <th>Horas por Multa</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (!empty($consultas)) {
                    foreach ($consultas as $consulta) { // Itera sobre el array de consultas
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($consulta['idMulta']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['TipoMulta']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['HorasServicio']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td><a href='../../Controlador/Controlador.php?accion=EliminarMultaVista&idMulta=" . urlencode(htmlspecialchars($consulta['idMulta'])) . "'><img src='../img/modificar.png' alt='Modificar'></a></td>";
                        echo "<td><a href='../../Controlador/Controlador.php?accion=EliminarMulta&idEliminarM=" . urlencode(htmlspecialchars($consulta['idMulta'])) . "'><img src='../img/delete.png' alt='Eliminar'></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No se encontraron coincidencias</td></tr>";
                }
            ?>
        </tbody>

    </table>
    </div>
</body>
</html>