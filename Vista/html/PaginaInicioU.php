<?php
    require '../../Config/sesionCheck.php';
    if (isset($_SESSION['SancionesNoRead'])) {
        $alerta = $_SESSION['SancionesNoRead'];
    }
    if (isset($_SESSION['Avisos'])) {
        $avisos = $_SESSION['Avisos'];
    } else {
        $avisos = [];
    }
    unset($_SESSION['SancionesNoRead']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/PaginaInAlum.css">
    <style>
        .notificacion {
            background-color: #ff4141 !important;
            color: white;
            font-weight: bold;
            border: 2px solid #ff4444;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            animation: parpadeo 1s infinite;
        }

        @keyframes parpadeo {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        // Crear el botón de menú
        const menuButton = document.createElement("div");
        menuButton.classList.add("menu-button");

        // Crear la imagen del icono
        const menuIcon = document.createElement("img");
        menuIcon.src = "../img/menu.png"; // Ruta a tu imagen
        menuIcon.alt = "Menú"; // Texto alternativo para accesibilidad
        menuIcon.classList.add("menu-icon"); // Añadir una clase para el icono

        // Añadir la imagen al botón de menú
        menuButton.appendChild(menuIcon);
        document.body.appendChild(menuButton);

        // Agregar el evento de clic para el menú desplegable
        menuButton.addEventListener("click", function () {
            document.querySelector(".paginaAdmi").classList.toggle("active");
        });
    });
</script>
    <script>
        let currentSlide = 0;

        function showSlide(index) {
            const slides = document.querySelectorAll('.carousel-item');
            const totalSlides = slides.length;

            // Asegurarse de que el índice sea circular
            currentSlide = (index + totalSlides) % totalSlides;

            const offset = -currentSlide * 100;
            document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
        }

        function moveSlide(direction) {
            showSlide(currentSlide + direction);
        }

        function redirigir(destino) {
            <?php 
                $matriculaEncoded = urlencode(htmlspecialchars($datosUsuario['matricula']));
            ?>
            if (destino === 'ConsultasRecientesAlum') {
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=ConsultasRecientesAlum&matricula=<?php echo $matriculaEncoded; ?>';
            } else if (destino === 'ConsultaTotalAlum') {
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=ConsultasRecientesAlumT&matricula=<?php echo $matriculaEncoded; ?>';
            }
        }
    </script>
</head>
<body>
    <div class="paginaAdmi">
        <div class="encabezado">
            <h1>Perfil del Alumno</h1>
            <div class="logo">
                <img src="../img/usuario.png" alt="Perfil">
            </div>
            <h1>Nombre: <?php echo htmlspecialchars($datosUsuario['nombre'] . ' ' . $datosUsuario['apellidos']); ?></h1>
            <h1>MatrÍcula: <?php echo htmlspecialchars($datosUsuario['matricula']); ?></h1>
            <h1>Grado: <?php echo htmlspecialchars($datosUsuario['grado']); ?>° Cuatrimestre</h1>
            <h1>Grupo: <?php echo htmlspecialchars($datosUsuario['grupo']); ?></h1>
            <h1>Carrera: <?php echo htmlspecialchars($datosUsuario['NombreCarrera']); ?></h1>
            <nav class="navbar">
                <ul>
                    <li><a href="../../Controlador/Controlador.php?accion=logout">Cerrar sesión</a></li> 
                </ul>
            </nav>
        </div>
        
        <div class="formulario">
            <div class="texto">
                <h1>PANEL GENERAL DEL ALUMNO</h1>
                <h2>¡Bienvenido!</h2>
            </div>
            <div class="Avisos">
                <h2>Últimos Avisos</h2>
                <div class="carousel">
                    <div class="carousel-inner">
                        <?php
                        if (empty($avisos)) {
                            echo "<div class='no-avisos'><p>No hay avisos disponibles.</p></div>";
                        } else {
                            foreach ($avisos as $aviso) {
                                echo "<div class='carousel-item'>
                                        <div class='carousel-placeholder'>
                                            <p><strong>Avisos</strong></p>
                                        </div>
                                        <div class='carousel-caption'>
                                            <h3>" . htmlspecialchars($aviso['Titulo']) . "</h3>
                                            <p><strong>Fecha:</strong> " . htmlspecialchars($aviso['Fecha']) . "</p>
                                            <p><strong>Categoría:</strong> " . htmlspecialchars($aviso['Categoria']) . "</p>
                                            <p><strong>Descripción:</strong> " . htmlspecialchars($aviso['Descripcion']) . "</p>
                                        </div>
                                    </div>";
                            }
                        }
                        ?>
                    </div>
                    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                    <button class="next" onclick="moveSlide(1)">&#10095;</button>
                </div>
            </div>

            <div class="botones">
                <div class="CrudUsuarios">
                    <?php $notificacionClase = isset($alerta) && !empty($alerta) ? 'notificacion' : ''; ?>
                    <input type="button" 
                        value="Consultar Sanciones Recientes" 
                        class="<?php echo $notificacionClase; ?>" 
                        onclick="redirigir('ConsultasRecientesAlum')">
                </div>
                <div class="CrudMulta">
                    <input type="button" 
                        value="Consultar Sanciones Totales" 
                        onclick="redirigir('ConsultaTotalAlum')">
                </div>
            </div>
        </div>
    </div>

    <script>
        let autoSlideInterval;

        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                moveSlide(1); // Mueve a la siguiente diapositiva
            }, 5000);
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        document.addEventListener('DOMContentLoaded', function () {
            showSlide(0); 
            startAutoSlide(); 
            document.querySelector('.prev').addEventListener('click', stopAutoSlide);
            document.querySelector('.next').addEventListener('click', stopAutoSlide);
        });
    </script>
</body>
</html>
