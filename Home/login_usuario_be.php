<?php
session_start();
include 'conexion_be.php';

$Correo = isset($_POST['Correo']) ? $_POST['Correo'] : '';
$Contrasena = isset($_POST['Contrasena']) ? $_POST['Contrasena'] : '';
$Contrasena = hash('sha512', $Contrasena);

$validar_login = mysqli_query($conexion, "SELECT * FROM login_db WHERE correo='$Correo' and Contrasena='$Contrasena'");

if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['usuario'] = $Correo;
    header("Location:http://localhost/Proyecto%20Software/Inventario.html");
    exit;
} else {
    echo '
    <script>
        alert("Correo o contraseña no existe, por favor verifique los datos introducidos");
        window.location = "http://localhost/index/";
    </script>';
    exit;
}
?>