<?php
require '../../Config/sesionCheck.php'; 
?>
<?php

if(isset($_SESSION['DatosConsultaMulta'])){
    $Multa = $_SESSION['DatosConsultaMulta'];
}else{
    $Multa = [];
}
if(isset($_SESSION['DatosSancion'])){
    $consultas = $_SESSION['DatosSancion'];
}else{
    $consultas = [];
}
unset($_SESSION['DatosSancion']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/BuscarSancion.css">
    <script>
        function redirigir(destino){
            if(destino === 'ConsultaGeneralSancion'){
                window.location.href = '../../Controlador/Controlador.php?accion=ConsultaGeneralSancionV';
            }
        }
    </script>
</head>
<body>
    <header>
    <h1>Buscar Sanción</h1>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
                <nav class="navbar">
                    <ul>
                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=GestionSancionV"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>
    </header> 
    
    <div class="formularios">
    <input type="button" value="Búsqueda General" onclick="redirigir('ConsultaGeneralSancion')">
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name="accion" value = "BuscarSancioMatriculaV" >
        <div class="matriculaAlumno">
            <label>Matrícula</label>
            <input type="text" name="txtMatriculaB" id="txtMatriculaB">
        </div>
        <input type="submit" value="Buscar">
    </form>
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name = 'accion' value = "BuscarSacionFechaV">
        <div class="BuscarFecha">
            <label>Fecha</label>
            <input type="date" name="BuscarDateS" id="BuscarDateS">
        </div>
        <input type="submit" value="Buscar">
    </form>
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name="accion" value = 'BuscarPorPagoV'>
        <label>Pagado</label>
        <div class="Pagado">
            <select name="Pagada" id="Pagada">
                <option value="">Ninguno</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </div>
        <input type="submit" value="Buscar">
    </form>
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name="accion" value = 'BuscarTipoMultaV'>
        <div class="BuscarMulta">
            <label>Tipo Multa</label>
            <select name="Multa">
                        
                        <option value="">Ninguno</option>
                        <?php
                            if(!empty($Multa)){
                                foreach($Multa as $programa){
                                    echo "<option value = '".htmlspecialchars($programa['idMulta']) . "'>" . htmlspecialchars($programa['TipoMulta']) . "</option>";
                                }
                            }else{
                                echo "<option>" . "No hay programas educativos registrados" . "</option>";
                            }
                        ?>
            </select>
        </div>
        <input type="submit" value="Buscar">
    </form>
    </div>
    <div class="tabla">
    <table>
        
        <thead>
            <tr>
                <th>Matrícula Alumno</th>
                <th>Matrícula Vigilante</th>
                <th>Fecha Multa</th>
                <th>Descripción</th>
                <th>Pagado</th>
                <th>Multa</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php
                if (!empty($consultas)) {
                    foreach ($consultas as $consulta) { // Itera sobre el array de consultas
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($consulta['matriculaAlumno']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['matriculaVigilante']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['fecha_multa']) . "</td>";
                        echo "<td>" . htmlspecialchars($consulta['descripcion']) . "</td>";
                         // Condición para mostrar "Sí" o "No" en lugar de 1 o 0
                        echo "<td>" . ($consulta['pagada'] == 1 ? 'Sí' : 'No') . "</td>";
                        echo "<td>" . htmlspecialchars($consulta['TipoMulta']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . "<a href='../../Controlador/Controlador.php?accion=ModificarSancionViewV&idM=" . urlencode(htmlspecialchars($consulta['idM'])) . "'>" . "<img src='../img/modificar.png'>" . "</a>" . "</td>";
                        echo "<td>" . "<a href='../../Controlador/Controlador.php?accion=EliminarSancionV&idM=" . urlencode(htmlspecialchars($consulta['idM'])) . "'>" . "<img src='../img/delete.png'>" . "</a>" . "</td>";
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