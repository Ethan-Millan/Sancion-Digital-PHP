<?php
    require '../../Config/sesionCheck.php';
?>

<?php

    if(isset($_SESSION['DatosConsultaGeneral'])){
        $consultas = $_SESSION['DatosConsultaGeneral'];
    }else if(isset($_SESSION['DatosConsultaXnombre'])){
        $consultas = $_SESSION['DatosConsultaXnombre'];
    }else if(isset($_SESSION['DatosConsultaXclave'])){
        $consultas = $_SESSION['DatosConsultaXclave'];
    }else{
        $consultas = [];
    }
    

    unset($_SESSION['DatosConsultaGeneral']);
    unset($_SESSION['DatosConsultaXnombre']);
    unset($_SESSION['DatosConsultaXclave']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/BuscarProEdu.css">
    <script>
        function redirigir(destino){
            if(destino === 'BusquedaGeneral'){
                window.location.href = '../../Controlador/Controlador.php?accion=BusquedaGeneralProEduE';
            }
        }
    </script>
</head>
<body>
    <header>
        <h1>Buscar Programa Educativo</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=ProgramaEducativo"><img src="../img/Regresar.png" alt=""></a></li>
            </ul>
        </nav>
    </header> 
    <div class="formularios">
        
    <input type="button" value="Búsqueda general" onclick="redirigir('BusquedaGeneral')">
    <form action="../../Controlador/Controlador.php" method = "post">
        <input type="hidden" name="accion" value = "BuscarXnombreE">
        <div class="consultaNombre">
            <label>Nombre del programa educativo</label>
            <input type="text" name="nombreProEdu" id="nombreProEdu">
        </div>
        <input type="submit" value="Buscar">
    </form>
    <form action="../../Controlador/Controlador.php" method = "post">
    <input type="hidden" name="accion" value = "BuscarXclaveE">
    <div class="consultaClave">
        <label>Clave del programa educativo</label>
        <input type="text" name="claveProEdu" id="claveProEdu">
    </div>
    <input type="submit" value="Buscar">
    </form>
    </div>
    <div class="Tabla">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del programa educativo</th>
                <th>Clave del programa educativo</th> 
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (!empty($consultas)) {
                    foreach ($consultas as $consulta) { // Itera sobre el array de consultas
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($consulta['idProgramaEducativo']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['NombreCarrera']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['ClaveCarrera']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . "<a href='../../Controlador/Controlador.php?accion=ModificarProEduPreVista&idModificacion=" . urlencode(htmlspecialchars($consulta['idProgramaEducativo'])) . "'>" . "<img src='../img/modificar.png'>" . "</a>" . "</td>";
                        echo "<td>" . "<a href='../../Controlador/Controlador.php?accion=EliminarProEdu&idEliminar=" . urlencode(htmlspecialchars($consulta['idProgramaEducativo'])) . "'>" . "<img src='../img/delete.png'>" . "</a>" . "</td>";
                        echo "</tr>";
                    }
                    
                } else {
                    echo "<tr><td colspan='2'>No se encontraron coincidencias</td></tr>"; 
                }
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>