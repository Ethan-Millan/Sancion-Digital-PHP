<?php
    require '../../Config/sesionCheck.php';
?>
<?php

    if(isset($_SESSION['DatosProEdu'])){
        $consultas = $_SESSION['DatosProEdu'];
    }else{
        $consultas = [];
        header('Location: ../../Controlador/Controlador.php?accion=Redireccion&accion2=EliminarProEdu');
    }

    unset($_SESSION['DatosProEdu']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/ModificarProEdu.css">
</head>
<body>
    <header>
        <h2>Modificar Programa Educativo</h2>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=ProgramaEducativo"><img src="../img/Regresar.png" alt=""></a></li>
            </ul>
        </nav>
    </header> 
    
    
    <div class="Formulario">
        <form action="../../Controlador/Controlador.php" method = "post"> 
            <input type="hidden" name="accion" value="ModificarProEdu">
            <div class="formModProEdu">
                <div class="id">
                    <input type="hidden" name="idModificacion" id="idModificacion" value="<?php echo htmlspecialchars($consultas['idProgramaEducativo']); ?>">
                </div>
                <div class="nombrePE">
                    <label>Nuevo nombre</label>
                    <input type="text" name="newNombrePE" id="newNombrePE" value="<?php echo htmlspecialchars($consultas['NombreCarrera']); ?>">
                </div>
                <div class="newClave">
                    <label>Nueva Clave</label>
                    <input type="text" name="newClave" id="newClave" value="<?php echo htmlspecialchars($consultas['ClaveCarrera']); ?>">
                </div>
                <input type="submit" value="Modificar">
            </div>
        </form>
    </div>
</body>
</html>