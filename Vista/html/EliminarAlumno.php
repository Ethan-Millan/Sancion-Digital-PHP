<?php
    require '../../Config/sesionCheck.php';
?>
<?php
    if(isset($_SESSION['ConsultaGeneralAlumnos'])){
        $consultas = $_SESSION['ConsultaGeneralAlumnos'];
    }else{
        $consulta = [];
    }
    unset($_SESSION['ConsultaGeneralAlumnos']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/BuscarAlumno.css">
    <script>
        function redirigir(destino){
            if(destino === 'BusquedaGeneralAlumno'){
                window.location.href = '../../Controlador/Controlador.php?accion=ConsultaGeneralAlumoE';
            }
        }
    </script>
</head>
<body>
    <header>
    <h2>Buscar Alumno</h2>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
                <nav class="navbar">
                    <ul>
                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudAlumnos"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>
    </header>   
    
    <div class="Formulario">
    <input type="button" value="Búsqueda general" onclick="redirigir('BusquedaGeneralAlumno')">
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name = 'accion' value="BuscarXmatriculaAlumoE">
        <div class="BusquedaMatricula">
            <label>Matrícula</label>
            <input type="text" name="BusquedaXmatricula" id="BusquedaXmatricula">
        </div>
        <input type="submit" value="Buscar">
    </form>
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name = 'accion' value="BuscarXnombreAlumoE">
        <div class="BuscarXnombre">
            <label>Nombre</label>
            <input type="text" name="BusquedaXnombre" id="BusquedaXnombre">
        </div>
        <input type="submit" value="Buscar">
    </form>
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name = 'accion' value="BuscarXapellidoAlumoE">
        <div class="BuscarXnombre">
            <label>Apellido</label>
            <input type="text" name="BusquedaXapellido" id="BusquedaXapellido">
        </div>
        <input type="submit" value="Buscar">
    </form>

    </div>
    <div class="Tabla">
    <table>

        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Género</th>
                <th>Grado</th>
                <th>Grupo</th>
                <th>Programa educativo</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (!empty($consultas)) {
                    foreach ($consultas as $consulta) { // Itera sobre el array de consultas 
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($consulta['matricula']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['nombre']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['apellidos']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['genero']) . "</td>";
                        echo "<td>" . htmlspecialchars($consulta['grado']) . "</td>";
                        echo "<td>" . htmlspecialchars($consulta['grupo']) . "</td>";
                        echo "<td>" . htmlspecialchars($consulta['NombreCarrera']) . "</td>";
                        echo "<td>" . "<a href='../../Controlador/Controlador.php?accion=ModificarAlumnoVista&matricula=" . urlencode(htmlspecialchars($consulta['matricula'])) . "'>" . "<img src='../img/modificar.png'>" . "</a>" . "</td>"; 
                        echo "<td>" . "<a href='../../Controlador/Controlador.php?accion=EliminarAlumno&matricula=" . urlencode(htmlspecialchars($consulta['matricula'])) . "'>" . "<img src='../img/delete.png'>" . "</a>" . "</td>"; 
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