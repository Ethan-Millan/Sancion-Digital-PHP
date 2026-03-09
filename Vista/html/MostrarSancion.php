<?php
session_start();
if(isset($_SESSION['sanciones'])){
    $sanciones = $_SESSION['sanciones'];
    unset($_SESSION['sanciones']); // Limpiar la variable de sesión después de usarla
} else {
    echo "No se encontraron sanciones.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Sanciones</title>
</head>
<body>
    <h2>Sanciones Registradas</h2>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
    <?php if(!empty($sanciones)): ?>
        <table border="1">
            <tr>
                <th>Matrícula Alumno</th>
                <th>Matrícula Vigilante</th>
                <th>Fecha Multa</th>
                <th>Tipo Sanción</th>
                <th>Monto</th>
                <th>Horas Servicio</th>
                <th>Descripción</th>
            </tr>
            <?php foreach($sanciones as $sancion): ?>
            <tr>
                <td><?php echo $sancion['matriculaAlumno']; ?></td>
                <td><?php echo $sancion['matriculaVigilante']; ?></td>
                <td><?php echo $sancion['fecha_multa']; ?></td>
                <td><?php echo $sancion['tipo_sancion']; ?></td>
                <td><?php echo $sancion['monto']; ?></td>
                <td><?php echo $sancion['horas_servicio']; ?></td>
                <td><?php echo $sancion['descripcion']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No se encontraron sanciones.</p>
    <?php endif; ?>
</body>
</html>
