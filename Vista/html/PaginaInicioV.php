<?php
    require '../../Config/sesionCheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/PaginaInV.css">
    <script>
        function redirigir(destino) {
            if(destino === 'CrudSancion') {
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=GestionSancionV'; 
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuButton = document.createElement("div");
            menuButton.classList.add("menu-button");

            const menuIcon = document.createElement("img");
            menuIcon.src = "../img/menu.png";
            menuIcon.alt = "Menú";
            menuIcon.classList.add("menu-icon");

            menuButton.appendChild(menuIcon);
            document.body.appendChild(menuButton);

            menuButton.addEventListener("click", function () {
                document.querySelector(".paginaAdmi").classList.toggle("active");
            });
        });
    </script>
</head>
<body>
    <div class="paginaAdmi">
        <header class="encabezado">
            
            <h1>Perfil General de Vigilante</h1>
            <div class="logo">
                <img src="../img/usuario.png" alt="Perfil">
            </div>
            <div class="datosVigilante">
                <h1>Nombre: <?php echo htmlspecialchars($datosUsuario['nombreV'].' '.$datosUsuario['apellidosV']); ?></h1>
                <h1>Cargo: <?php echo htmlspecialchars($datosUsuario['cargoV']); ?></h1>
                <h1>MatrÍcula: <?php echo htmlspecialchars($datosUsuario['matriculaV']); ?></h1>
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="../../Controlador/Controlador.php?accion=logout">Cerrar sesión</a></li>
                </ul>
            </nav>
        </header>
        
        <main class="formularioVigilante">
            <div class="texto">
                <h1>Panel General del Vigilante</h1>
                <h2>Bienvenido Vigilante. ¡Es hora de trabajar!</h2>
            </div>
            <div class="botones">
                <input type="button" value="Gestión Sanción" onclick="redirigir('CrudSancion')">
            </div>
        </main>
    </div>
</body>
</html>
