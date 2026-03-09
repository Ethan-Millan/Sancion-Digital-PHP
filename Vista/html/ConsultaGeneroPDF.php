<?php
    require '../../Config/sesionCheck.php';
    require '../../Config/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;

    if(isset($_SESSION['DatosSancion'])){
        $consultas = $_SESSION['DatosSancion'];
    }else{
        $consultas = [];
        header('Location: ../../Controlador/Controlador.php?accion=Redireccion&accion2=PDF');
    }
    if(isset($_SESSION['GeneroSeleccionado'])){
        $generoSeleccionado = $_SESSION['GeneroSeleccionado'];
    }else{
        $generoSeleccionado = [];
        header('Location: ../../Controlador/Controlador.php?accion=Redireccion&accion2=PDF');
    }
    // Obtener el género seleccionado de la sesión

    unset($_SESSION['DatosSancion']); 
    $fechaActual = date("d-m-Y");

    // Contar el número de multas
    $totalMultas = count($consultas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/PDFAlumno.css"> <!-- Ruta al CSS externo -->
</head>
<body>
<header>
    <nav class="navbar">
        <ul>
            <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=PDF"><img src="../img/Regresar.png" alt="Regresar"></a></li>
        </ul>
    </nav>
</header> 
<div class="acciones">
    <a href="#" onclick="descargarPDF()">
        <img src="../img/descargar-pdf.png" alt="Descargar PDF">
    </a>
</div>

<?php
    ob_start(); 
?>
<style>
/* Fondo y tipografía principal */
body {
    font-family: Arial, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Contenedor de previsualización */
.pdf-preview {
    width: 95%;
    max-width: 1200px;
    margin: 10px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

/* Encabezado del PDF */
.headerPDF {
    text-align: center;
    margin-top: 0px;
}

.headerPDF h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.headerPDF h2 {
    font-size: 18px;
    color: #555;
    margin-bottom: 5px;
}

.headerPDF h3 {
    font-size: 14px;
    color: #777;
}

/* Información sobre el total de multas */
.multa h4 {
    text-align: center;
    font-size: 16px;
    color: #444;
    margin-top: 10px;
}

/* Contenedor de recuadros */
.contenedor-recuadros {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-top: 20px;
}

/* Evitar salto de página dentro de recuadros */
.recuadro {
    border: 1px solid #333;
    padding: 20px;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    gap: 10px;
    page-break-inside: avoid; /* Evita que se divida entre páginas */
}

/* Estructura de las filas de información en el recuadro */
.recuadro .info-row {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #ddd;
    padding: 5px 0;
}

.recuadro .info-row:last-child {
    border-bottom: none;
}

.recuadro .label {
    font-weight: bold;
    color: #555;
    width: 45%;
    text-align: left;
}

.recuadro .value {
    width: 55%;
    text-align: right;
    color: #333;
}

/* Pie de página dentro del contenedor de previsualización */
footer {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #ddd;
    text-align: center;
    page-break-inside: avoid; /* Evita que el pie se divida entre páginas */
}

footer .observaciones h4 {
    font-size: 16px;
    color: #444;
    margin-bottom: 5px;
}

footer .observaciones p {
    font-size: 14px;
    color: #555;
}

footer .firma p {
    font-size: 14px;
    color: #333;
}

footer .firma p:first-child {
    margin-bottom: 5px;
}
</style>

<div class="pdf-preview">
    <div class="headerPDF">
        <h1>Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <h2>Sanción por Género: <?php echo htmlspecialchars($generoSeleccionado); ?></h2>
        <h3>Fecha: <?php echo $fechaActual; ?></h3> 
    </div>
    <div class="multa">
        <h4>Hay un total de <?php echo $totalMultas; ?> multas para el genero <?php echo htmlspecialchars($generoSeleccionado); ?></h4>
    </div>
    <div class="contenedor-recuadros">
        <?php
            if (!empty($consultas)) {
                foreach ($consultas as $consulta) {
                    echo "<div class='recuadro'>";
                    echo "<div class='info-row'><span class='label'>Alumno:</span><span class='value'>" . htmlspecialchars($consulta['matriculaAlumno']) . "</span></div>";
                    echo "<div class='info-row'><span class='label'>Vigilante:</span><span class='value'>" . htmlspecialchars($consulta['matriculaVigilante']) . "</span></div>";
                    echo "<div class='info-row'><span class='label'>Fecha Multa:</span><span class='value'>" . htmlspecialchars($consulta['fecha_multa']) . "</span></div>";
                    echo "<div class='info-row'><span class='label'>Descripción:</span><span class='value'>" . htmlspecialchars($consulta['descripcion']) . "</span></div>";
                    echo "<div class='info-row'><span class='label'>Pagado:</span><span class='value'>" . ($consulta['pagada'] == 1 ? 'Sí' : 'No') . "</span></div>";
                    echo "<div class='info-row'><span class='label'>Tipo de Multa:</span><span class='value'>" . htmlspecialchars($consulta['TipoMulta']) . "</span></div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No se encontraron coincidencias.</p>";
            }
        ?>
    </div>
    <footer>
        <div class="observaciones">
            <h4>Observaciones:</h4>
            <p>Este documento es una constancia de las sanciones impuestas a los alumnos en relación con las normas de la institución.</p>
        </div>
    </footer>
</div>
<?php
    $htmlContenido = ob_get_clean();
    $_SESSION['htmlContenido'] = $htmlContenido;
    echo $htmlContenido;
?>
<script>
function descargarPDF() {
    window.location.href = '../../Controlador/Controlador.php?accion=GenerarPDF';
}
</script>
</body>
</html>
