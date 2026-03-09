<?php
require '../../Config/sesionCheck.php';
if(isset($_SESSION['DatosAvisos'])){
    $consultas = $_SESSION['DatosAvisos'];
}else{
    $consultas = [];
}
unset($_SESSION['DatosAvisos']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/BuscarAvisos.css">
    <script>
        function redirigir(destino){
            if(destino === 'ConsultaGeneralAvisos'){
                window.location.href = '../../Controlador/Controlador.php?accion=ConsultaGeneralAvisos';
            }
        }
    </script>
</head>
<body>
    <header>
    <h1>Buscar Avisos</h1>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=CrudAvisos"><img src="../img/Regresar.png" alt=""></a></li>
            </ul>
        </nav>
    </header> 

    <div class="formularios">
        <input type="button" value="Búsqueda General" onclick="redirigir('ConsultaGeneralAvisos')">

        <form action="../../Controlador/Controlador.php" method="post">
            <input type="hidden" name="accion" value="BuscarAvisoTitulo">
            <div class="tituloAviso">
                <label>Título</label>
                <input type="text" name="txtTituloB" id="txtTituloB">
            </div>
            <input type="submit" value="Buscar">
        </form>

        <form action="../../Controlador/Controlador.php" method="post">
            <input type="hidden" name="accion" value="BuscarAvisoFecha">
            <div class="buscarFecha">
                <label>Fecha</label>
                <input type="date" name="BuscarDateA" id="BuscarDateA">
            </div>
            <input type="submit" value="Buscar">
        </form>

        
        <form action="../../Controlador/Controlador.php" method="post">
            <input type="hidden" name="accion" value="BuscarAvisoCategoria">
            <label>Categoría</label>
            <div class="categoriaAviso">
                <select name="Categoria" id="Categoria">
                    <option value="">Ninguno</option>
                    <option value="Baja">Baja</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                    <option value="Obligatoria">Obligatoria</option>
                </select>
            </div>
            <input type="submit" value="Buscar">
        </form>
    </div>

    <div class="tabla">
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Fecha de Publicación</th>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th>Autor</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if (!empty($consultas)) {
                    foreach ($consultas as $consulta) { 
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($consulta['Titulo']) . "</td>";
                        echo "<td>" . htmlspecialchars($consulta['Fecha']) . "</td>";
                        echo "<td>" . htmlspecialchars($consulta['Categoria']) . "</td>";
                        echo "<td>" . htmlspecialchars($consulta['Descripcion']) . "</td>";
                        echo "<td>" . htmlspecialchars($consulta['vigilante_matriculaV']) . "</td>";
                        echo "<td><a href='../../Controlador/Controlador.php?accion=ModificarAvisoView&idAviso=" . urlencode(htmlspecialchars($consulta['idAvisos'])) . "'><img src='../img/modificar.png'></a></td>";
                        echo "<td><a href='../../Controlador/Controlador.php?accion=EliminarAviso&idAviso=" . urlencode(htmlspecialchars($consulta['idAvisos'])) . "'><img src='../img/delete.png'></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No se encontraron coincidencias</td></tr>"; 
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
