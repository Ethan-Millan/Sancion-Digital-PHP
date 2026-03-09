<?php
    require '../../Config/sesionCheck.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/PaginaInA.css">
    <script>
        function redirigir(destino){
            if(destino === 'GestionCrud'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=GestionCrud';
            }else if(destino === 'ProgramaEducativo'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=ProgramaEducativo';
            }else if(destino === 'GestionMulta'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=GestionMulta';
            }else if(destino === 'GestionSansion'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=GestionSancion';
            }else if(destino === 'RestaurarBD'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=BasedeDatos';
            }else if(destino === 'PDF'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=PDF';
            }else if(destino === 'Dashboard'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=Dashboard';
            }else if(destino === 'Avisos'){
                window.location.href = '../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudAvisos';
            }
        }
    </script>
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

</head>
<body>
    <div class="paginaAdmi">
        
        <div class="encabezado">
            <h1>Perfil de Administrador</h1>
        
            <div class="logo">
                <img src="../img/usuario.png" alt="Perfil">
            </div>
            <h1>Nombre: <?php echo htmlspecialchars($datosUsuario['nombreA'].' '.$datosUsuario['apellidosA']); ?></h1>
            <h1>Matrícula: <?php echo htmlspecialchars($datosUsuario['matriculaA']); ?></h1>
            <nav class="navbar">
                <ul>
                    <li><a href="../../Controlador/Controlador.php?accion=logout">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="formulario">
            <div class="texto">
                <h1>PANEL GENERAL DEL ADMINISTRADOR</h1>
                <h2>¡Bienvenido, Administrador!</h2>
                <h2>Todo listo para que tome el control ¡Adelante!</h2>
            </div>
            <div class="botones">
                <div class="CrudUsuarios">
                    <input type="button" value = "Gestión Usuarios" onclick="redirigir('GestionCrud')">
                </div>
                <div class="CrudMulta">
                    <input type="button" value = "Gestión Multa" onclick="redirigir('GestionMulta')">
                </div>
                <div class="CrudSancion">
                    <input type="button" value = "Gestión Sanción" onclick="redirigir('GestionSansion')">
                </div>
                <div class="CrudProgramaEducativo">
                    <input type="button" value = "Gestión Programa Educativo" onclick="redirigir('ProgramaEducativo')">
                </div>
                <div class="CrudAvisos">
                    <input type="button" value = "Gestión Avisos" onclick="redirigir('Avisos')">
                </div>
                <div class="GenerarPDF">
                    <input type="button" value = "Generar PDF" onclick="redirigir('PDF')">
                </div>
                <div class="RespaldoBD">
                    <input type="button" value = "Dashboard" onclick="redirigir('Dashboard')">
                </div>
                <div class="RespaldoBD">
                    <input type="button" value = "Base de datos" onclick="redirigir('RestaurarBD')">
                </div>
            
            </div>
        </div>
    </div>
</body>
</html>
