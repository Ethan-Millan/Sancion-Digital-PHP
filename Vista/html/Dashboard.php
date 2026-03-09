<?php
require '../../Config/sesionCheck.php';

if (isset($_SESSION['GeneroM'])) {
    $generoM = $_SESSION['GeneroM'];
} else {
    $generoM = ['total' => 0];
}

if (isset($_SESSION['GeneroF'])) {
    $generoF = $_SESSION['GeneroF'];
} else {
    $generoF = ['total' => 0];
}

if (isset($_SESSION['Completadas'])) {
    $completadas = $_SESSION['Completadas'];
} else {
    $completadas = ['total' => 0];
}

if (isset($_SESSION['NoCompletadas'])) {
    $noCompletadas = $_SESSION['NoCompletadas'];
} else {
    $noCompletadas = ['total' => 0];
}

if (isset($_SESSION['Todas'])) {
    $todas = $_SESSION['Todas'];
} else {
    $todas = ['fechas' => [], 'totales' => []]; 
}

if (isset($_SESSION['TodasFecha'])) {
    $todasFecha = $_SESSION['TodasFecha'];
} else {
    $todasFecha = ['fechas' => [], 'totales' => []];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/DashBoard.css">
</head>
<body>
<header>
    <h1>Dashboard</h1>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
    <div class="navbar">
        <a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=RegresarPagAdmin">
            <img src="../img/Regresar.png" alt="Regresar">
        </a>
    </div>
</header>

<div class="fecha">
    <form action="../../Controlador/Controlador.php" method="post">
        <input type="hidden" name="accion" value="dashboard2">
        <label for="fechaConsulta">Fecha:</label>
        <input type="date" name="fechaConsulta" id="fechaConsulta">
        <input type="submit" value="Buscar">
    </form>
</div>

<div class="graficas">
    <div class="grafica-container">
        <canvas id="chartGenero"></canvas>
    </div>
    <div class="grafica-container">
        <canvas id="chartCompletadas"></canvas>
    </div>
    <div class="grafica-container">
        <canvas id="chartTodas"></canvas>
    </div>
    <div class="grafica-container">
        <canvas id="chartMultasAntiguas"></canvas>
    </div>
</div>

<script>
// Datos desde PHP
const generoM = <?php echo json_encode($generoM['total']); ?> || 0;
const generoF = <?php echo json_encode($generoF['total']); ?> || 0;
const completadas = <?php echo json_encode($completadas['total']); ?> || 0;
const noCompletadas = <?php echo json_encode($noCompletadas['total']); ?> || 0;
const multasAntiguas = <?php echo json_encode($todas); ?> || { fechas: [], totales: [] };
const multasFecha = <?php echo json_encode($todasFecha); ?> || { fechas: [], totales: [] };

// Depuración de datos
console.log("Multas Antiguas:", multasAntiguas);
console.log("Multas Fecha:", multasFecha);

// Gráfica General
const ctxGeneral = document.getElementById('chartGenero').getContext('2d');
new Chart(ctxGeneral, {
    type: 'bar',
    data: {
        labels: ['Masculino', 'Femenino'],
        datasets: [{
            label: 'Cantidad',
            data: [generoM, generoF],
            backgroundColor: ['#4CAF50', '#FFC107']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true },
            title: { display: true, text: 'Distribución por Género' }
        }
    }
});

// Gráfica de Completadas y No Completadas
const ctxCompletadas = document.getElementById('chartCompletadas').getContext('2d');
new Chart(ctxCompletadas, {
    type: 'pie',
    data: {
        labels: ['Completadas', 'No Completadas'],
        datasets: [{
            data: [completadas, noCompletadas],
            backgroundColor: ['#2196F3', '#F44336']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true },
            title: { display: true, text: 'Estado de Tareas' }
        }
    }
});

// Gráfica Todas
const ctxTodas = document.getElementById('chartTodas').getContext('2d');
new Chart(ctxTodas, {
    type: 'line',
    data: {
        labels: multasAntiguas.fechas,
        datasets: [{
            label: 'Todas',
            data: multasAntiguas.totales,
            borderColor: '#673AB7',
            backgroundColor: 'rgba(103, 58, 183, 0.5)',
            fill: true
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true },
            title: { display: true, text: 'Todas las Tareas en el Tiempo' }
        },
        scales: {
            x: { title: { display: true, text: 'Fecha' } },
            y: { title: { display: true, text: 'Cantidad' } }
        }
    }
});

// Gráfica Multas Antiguas
const ctxMultasAntiguas = document.getElementById('chartMultasAntiguas').getContext('2d');
new Chart(ctxMultasAntiguas, {
    type: 'line',
    data: {
        labels: multasFecha.fechas, // Etiquetas (fechas)
        datasets: [{
            label: 'Multas por Fecha',
            data: multasFecha.totales, // Datos (totales)
            borderColor: '#FF5722',
            backgroundColor: 'rgba(255, 87, 34, 0.5)',
            fill: true
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true },
            title: { display: true, text: 'Multas por Fecha' }
        },
        scales: {
            x: { title: { display: true, text: 'Fecha' } },
            y: { title: { display: true, text: 'Cantidad' } }
        }
    }
});

</script>
</body>
</html>
