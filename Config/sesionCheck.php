<?php
session_start();//inicia la sesion 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    //Si el usuario no ha iniciado sesion lo manda a el loggin 
    echo "<script>
        alert('Tu sesión ha caducado. Por favor, inicia sesión nuevamente.');
        window.location.href = './InicioS.html';
    </script>";//Muestra un mensaje de que la sesion ya caduco y lo manda al login
    exit(); // Detiene la ejecución del script
    
}
// Asigna los datos del usuario a la variable después de verificar la sesión
if (isset($_SESSION['datosUsuario'])) {
    $datosUsuario = $_SESSION['datosUsuario'];
} else {
    // En caso de que no haya datos de usuario en la sesión, redirige al login
    echo "<script>
        alert('No se encontraron los datos del usuario. Por favor, inicia sesión nuevamente.');
        window.location.href = './InicioS.html';
    </script>";
    exit();
}
?>

