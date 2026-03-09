<?php
require '../../Config/sesionCheck.php'; 
?>
<?php
    if(isset($_SESSION['ConsultaGeneralAdmin'])){
        $consultas = $_SESSION['ConsultaGeneralAdmin'];
    }else{
        $consultas = [];
    }
    unset($_SESSION['ConsultaGeneralAdmin']);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/BuscarAdmin.css">
    <script>
        function redirigir(destino){
            if(destino === 'ConsultaGeneralAdmin'){
                window.location.href = '../../Controlador/Controlador.php?accion=ConsultaGeneralAdminE'; 
            }
        }
    </script>
</head>
<body>
    <header>
    <h1>Buscar Administrador</h1>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
                <nav class="navbar">
                    <ul>
                        <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudAldmin"><img src="../img/Regresar.png" alt=""></a></li>
                    </ul>
                </nav>
    </header> 
    
    <div class="formularios">
    <input type="button" value="Búsqueda general" onclick="redirigir('ConsultaGeneralAdmin')">
    <form action="../../Controlador/Controlador.php" method = 'post'>
        
        <input type="hidden" name='accion' value = "CosultaXmatriculaAdminE">
        <div class="ConsultaMatriculaA">
            <label>Matrícula</label>
            <input type="text" name="txtMatriculaA" id="txtMatriculaA"> 
        </div>
        <input type="submit" value="Buscar">
    </form>
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name='accion' value = "CosultaXnonmbreAdminE">
        <div class="BuscarXnombreAdmin">
            <label>Nombre</label>
            <input type="text" name="txtNombreA" id="txtNombreA">
        </div>
        <input type="submit" value="Buscar">
    </form>
    <form action="../../Controlador/Controlador.php" method = 'post'>
        <input type="hidden" name='accion' value = "CosultaXapellidoAdminE">
        <div class="BuscarXapellidoAdmin">
            <label>Apellido</label>
            <input type="text" name="txtApellidoA" id="txtApellidoA">
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
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php
                if (!empty($consultas)) {
                    foreach ($consultas as $consulta) { // Itera sobre el array de consultas
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($consulta['matriculaA']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['nombreA']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . htmlspecialchars($consulta['apellidosA']) . "</td>"; // Acceso a cada elemento del array
                        echo "<td>" . "<a href='../../Controlador/Controlador.php?accion=ModificarAdminView&matriculaA=" . urlencode(htmlspecialchars($consulta['matriculaA'])) . "'>" . "<img src='../img/modificar.png'>" . "</a>" . "</td>";
                        echo "<td>" . "<a href='../../Controlador/Controlador.php?accion=EliminarAdmin&matriculaA=" . urlencode(htmlspecialchars($consulta['matriculaA'])) . "'>" . "<img src='../img/delete.png'>" . "</a>" . "</td>";
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