<?php
    session_start();
    if(isset($_SESSION['DatosConsultaGeneral'])){
        $ProEdu = $_SESSION['DatosConsultaGeneral'];
    } else {
        $ProEdu = [];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estancia II</title>
    <link rel="stylesheet" href="../css/RegistrarUsuario.css">
</head>
<body>
    <header>
        <h1>Registro Alumno</h1>
        <h1>Plataforma Digital para la Gestión de Incidencias en Instituciones de Educación Superior</h1>
        <nav class="navbar">
            <ul>
                <li><a href="../../Controlador/Controlador.php?accion=Redireccion&accion2=RegresarIndex"><img src="../img/Regresar.png" alt="Regresar"></a></li>
            </ul>
        </nav> 
    </header>

    <div class="FormularioFU">
        <form action="../../Controlador/Controlador.php" method="post">
            <input type="hidden" name="accion" value="registrarAlumnoIndex"> 

            <div class="Matricula">
                <label>Matrícula:</label>
                <input type="text" name="txtMatricula" required>
            </div>

            <div class="Nombre">
                <label>Nombre:</label>
                <input type="text" name="txtNombre" required>
            </div>

            <div class="Apellidos">
                <label>Apellidos:</label>
                <input type="text" name="txtApellidos" required>
            </div>

            <div class="Genero">
                <label>Género:</label>
                <select name="Genero">
                    <option value="">Ninguno</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                </select>
            </div>

            <div class="FecNac">
                <label>Fecha de nacimiento:</label>
                <input type="date" name="txtFechaNacimiento" required>
            </div>

            <div class="password">
                <label>Contraseña:</label>
                <input type="password" name="txtPasswordAlu" required>
            </div>

            <div class="Grado">
                <label>Grado:</label>
                <select name="GradoNum">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>

            <div class="Grupo">
                <label>Grupo:</label>
                <select name="Grupo">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                </select>
            </div>

            <div class="Especialidad">
                <label>Carrera:</label>
                <select name="Especialidad">
                    <option value="">Ninguno</option>
                    <?php
                        if(!empty($ProEdu)){
                            foreach($ProEdu as $programa){
                                echo "<option value='".htmlspecialchars($programa['idProgramaEducativo'])."'>" . htmlspecialchars($programa['NombreCarrera']) . "</option>";
                            }
                        } else {
                            echo "<option>No hay programas educativos registrados</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="IniciarS">
                <input type="submit" value="Registrar">
            </div>
        </form>
    </div>
</body>
</html>
