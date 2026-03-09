<?php
    require '../../Config/sesionCheck.php';
?>

<?php
    if(isset($_SESSION['ConsultaGeneralVigilante'])){
        $consultas = $_SESSION['ConsultaGeneralVigilante'];
    }else if(isset($_SESSION['ConsultaGeneralIndividual'])){
        $consultas = $_SESSION['ConsultaGeneralIndividual'];
    }else{
        $consulta = [];
    }
    unset($_SESSION['ConsultaGeneralVigilante']);
    unset($_SESSION['ConsultaGeneralIndividual']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/BuscarVigilantes.css">
    <script>
        function redirigir(destino){
            if(destino === 'BusquedaGeneralVigilante'){
                window.location.href = "../../Controlador/Controlador.php?accion=consultaGeneralVigilanteE";
            }
        }
    </script>
</head>
<body>

    <header>
        <h1>Busca Vigilantes</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
                <nav class="navbar">
                    <ul>
                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudVigilante"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>
    </header>
    <div class="formularios">
        
    <input type="button" value="Búsqueda General" onclick="redirigir('BusquedaGeneralVigilante')">
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name = 'accion' value="BuscarXmatriculaVigilanteEliminar">
        <div class="BusquedaMatricula">
            <label>Matrícula</label>
            <input type="text" name="BusquedaXmatricula" id="BusquedaXmatricula">
        </div>
        <input type="submit" value="Buscar">
    </form>
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name = 'accion' value="BuscarXnombreVigilanteEliminar">
        <div class="BuscarXnombre">
            <label>Nombre</label>
            <input type="text" name="BusquedaXnombre" id="BusquedaXnombre">
        </div>
        <input type="submit" value="Buscar">
    </form>
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name = 'accion' value="BuscarXapellidoVigilanteEliminar">
        <div class="BuscarXnombre">
            <label>Apellido</label>
            <input type="text" name="BusquedaXapellido" id="BusquedaXapellido">
        </div>
        <input type="submit" value="Buscar">
    </form>
    </div>
    <div class="tabla">
    <table>
        
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Cargo</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (!empty($consultas)) {
                    foreach ($consultas as $consulta) { // Itera sobre el array de consultas
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($consulta['matriculaV']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['nombreV']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['apellidosV']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['cargoV']) . "</td>";
                        echo "<td>" . "<a href='../../Controlador/Controlador.php?accion=modificarVigilanteView&matriculaVeModificar=" . urlencode(htmlspecialchars($consulta['matriculaV'])) . "'>" . "<img src='../img/modificar.png'>" . "</a>" . "</td>";
                        echo "<td>" . "<a href='../../Controlador/Controlador.php?accion=EliminarVigilante&matriculaVeliminar=" . urlencode(htmlspecialchars($consulta['matriculaV'])) . "'>" . "<img src='../img/delete.png'>" . "</a>" . "</td>";
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