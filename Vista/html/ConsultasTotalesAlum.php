<?php
    require '../../Config/sesionCheck.php';
    
    if (isset($_SESSION['DatosConsultaMulta'])) {
        $Multa = $_SESSION['DatosConsultaMulta'];
    } else {
        $Multa = [];
    }

    if (isset($_SESSION['DatosSancion'])) {
        $consultas = $_SESSION['DatosSancion'];
    } else {
        $consultas = [];
    }

    //unset($_SESSION['DatosSancion']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/ConsultaSanAlum.css">
</head>
<body>
    <header>
        <h1>Sanciones Recientes</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=RegresarAlumno"><img src="../img/Regresar.png" alt="Regresar"></a></li>
            </ul>
        </nav>
    </header> 
    
    <div class="reporte">
        <h1>Sanciones Totales</h1>
        <h2>Tienes un total de <?php echo count($consultas); ?> sanciones</h2>
        
        <?php
            if (!empty($consultas)) {
                foreach ($consultas as $consulta) {
                    echo "<div class='sancion'>";
                    echo "<h3>Matrícula Alumno: <span>" . htmlspecialchars($consulta['matriculaAlumno']) . "</span></h3>";
                    echo "<p><strong>Matrícula Vigilante:</strong> " . htmlspecialchars($consulta['matriculaVigilante']) . "</p>";
                    echo "<p><strong>Fecha Multa:</strong> " . htmlspecialchars($consulta['fecha_multa']) . "</p>";
                    echo "<p><strong>Descripción:</strong> " . htmlspecialchars($consulta['descripcion']) . "</p>";
                    echo "<p><strong>Pagado:</strong> " . ($consulta['pagada'] == 1 ? 'Sí' : 'No') . "</p>";
                    echo "<p><strong>Multa:</strong> " . htmlspecialchars($consulta['TipoMulta']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No se encontraron coincidencias</p>";
            }
        ?>
    </div>
</body>
</html>
