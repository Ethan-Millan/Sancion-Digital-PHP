<?php
    require '../../Config/sesionCheck.php';
    
    
    if(isset($_SESSION['DatosConsultaMulta'])){
        $Multa = $_SESSION['DatosConsultaMulta'];
    }else{
        $Multa = [];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/PDF.css">
    <script>
        function redirigir(destino){
            if(destino === 'ConsultaGeneralPorAlumno'){
                window.location.href = '../../Controlador/Controlador.php?accion=ConsultaGeneralPorAlumnoPDF';
            }
        }
    </script>
</head>
<body>
<header>
    <h1>Creación de PDFs</h1>
    <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
    <nav class="navbar">
        <ul>
            <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=RegresarPagAdmin"><img src="../img/Regresar.png" alt="Regresar"></a></li>
        </ul>
    </nav>
</header> 
<div class="formulariosPDF">
<div class="FormularioAlumno">
    <form action="../../Controlador/Controlador.php" method="post">
        <input type="hidden" name="accion" value="ConsultaGeneralPorAlumnoPDF">
        <label for="txtMatricula">Matrícula</label>
        <input type="text" name="txtMatricula" id="txtMatricula">
        <input type="submit" value="Generar PDF"> 
    </form>
</div>
<div class="TipoMulta">
    <form action="../../Controlador/Controlador.php" method="post">
    <input type="hidden" name="accion" value="ConsultaMultaPDF">
        <label>Multa</label>
        <select name="Multa">
                            
            <option value="">Ninguno</option>
                <?php
                    if(!empty($Multa)){
                        foreach($Multa as $programa){
                            echo "<option value = '".htmlspecialchars($programa['idMulta']) . "'>" . htmlspecialchars($programa['TipoMulta']) . "</option>";
                        }
                    }else{
                        echo "<option>" . "No hay programas educativos registrados" . "</option>";
                    }
                ?>
        </select>
        <input type="submit" value="Generar PDF">
    </form>
</div>
<div class="Genero">
<form action="../../Controlador/Controlador.php" method="post">
    <input type="hidden" name="accion" value="ConsultaGeneroPDF">
        <label>Género</label>
            <select name="Genero">
                <option value="">Ninguno</option>
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
            </select>
        <input type="submit" value="Generar PDF">
    </form>
</div>
<div class="PorFechas">
    <form action="../../Controlador/Controlador.php" method="post">
        <input type="hidden" name="accion" value="ConsultaFechaPDF">
        <div class="fecha1">
            <input type="date" name="fecha1" id="fecha1">
        </div>
        <div class="fecha2">
            <input type="date" name="fecha2" id="fecha2">
        </div>
        <input type="submit" value="Generar PDF">
    </form>
</div>
</div>
</body>
</html>
