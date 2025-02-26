<?php
//verificamos si los campos usuario y contraseña enviados en el formulario por el usuario estan vacios.
if (empty($_POST["usuario"]) || empty($_POST["password"])) {
    //si se encuentran vacios muestra un mensaje en una nueva pagina error.php
    $_SESSION["error"] = "Todos los campos son obligatorios.";
    header("Location: error.php");
    exit();
}
// si la cantidad de caracteres es menor a 6 redirige a la pagina de error con un mensaje
if (strlen($_POST["password"]) < 6) {
    $_SESSION["error"] = "La contraseña debe tener al menos 6 caracteres.";
    header("Location: error.php");
    exit();
}
// si cumple todos los requisitos redirige a la pagina de bienvenida
header("Location: paginaBienvenida.php");
exit();
?>
